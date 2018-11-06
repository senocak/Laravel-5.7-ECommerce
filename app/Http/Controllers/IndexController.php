<?php

namespace App\Http\Controllers;

use App\Urun;
use App\Kupon;
use App\Kategori;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class IndexController extends Controller{
    public function anasayfa_index(){
        $urunler=Urun::where("onecikan",true)->take(8)->get();
        return view("anasayfa")->withUrunler($urunler);
    }
    public function urun_index(){
        $sayfa=6;
        $kategoriler=Kategori::all();
        if(\request()->kategori){
            $urunler=Urun::with("kategoriler")->whereHas('kategoriler',function ($query){
                $query->where('url',\request()->kategori);
            });
            $kategoriİsmi=optional($kategoriler->where('url',\request()->kategori)->first())->isim;
        }else{
            $urunler=Urun::take($sayfa);
            $kategoriİsmi="Ürünler";
        }
        if (\request()->fiyat=="azalan"){
            $urunler=$urunler->orderBy("fiyat",'asc')->paginate($sayfa);
        }else if (\request()->fiyat=="artan"){
            $urunler=$urunler->orderBy("fiyat",'desc')->paginate($sayfa);
        }else{
            $urunler=$urunler->paginate($sayfa);
        }
        return view("urunler")->with(['kategoriler'=>$kategoriler,'urunler'=>$urunler,'kategoriismi'=>$kategoriİsmi]);
    }
    public function urun_detay($url){
        $urun=Urun::where("url",$url)->firstOrFail();
        return view("urun")->withUrun($urun);
    }
    public function sepet(){
        return view("sepet");
    }
    public function sepete_ekle(Request $request){
        $aynisi=Cart::search(function ($cartItem,$rowId)use($request){
            return $cartItem->id===$request->id;
        });
        if ($aynisi->isNotEmpty()){
            Session::flash('başarılı',"Ürün Zaten Sepette.");
            return redirect()->route("sepet");
        }
        Cart::add($request->id, $request->isim, 1, $request->fiyat)->associate('App\Urun');
        Session::flash('başarılı',"Ürün Sepete Eklendi.");
        return redirect()->route("sepet");
    }
    public function sepet_bosalt(){
        Cart::destroy();
    }
    public function sepet_urunsil($id){
        Cart::remove($id);
        Session::flash('başarılı',"Ürün Sepetten Silindi.");
        return redirect()->route("sepet");
    }
    public function sepet_kaydet($id){
        $item=Cart::get($id);
        Cart::remove($id);

        $aynisi=Cart::instance("kaydet")->search(function ($cartItem,$rowId)use($id){
            return $rowId===$id;
        });
        if ($aynisi->isNotEmpty()){
            Session::flash('başarılı',"Ürün Zaten Kaydedilmiş.");
            return redirect()->route("sepet");
        }

        Cart::instance("kaydet")->add($item->id, $item->name, 1, $item->price)->associate('App\Urun');
        Session::flash('başarılı',"Ürün Sonrası için Kaydedildi.");
        return redirect()->route("sepet");
    }
    public function kaydet_urunsil($id){
        Cart::instance("kaydet")->remove($id);
        Session::flash('başarılı',"Ürün Silindi.");
        return redirect()->route("sepet");
    }
    public function sepete_tasi($id){
        $item=Cart::instance("kaydet")->get($id);
        Cart::instance("kaydet")->remove($id);

        $aynisi=Cart::instance("default")->search(function ($cartItem,$rowId)use($id){
            return $rowId===$id;
        });
        if ($aynisi->isNotEmpty()){
            Session::flash('başarılı',"Ürün Zaten Sepette.");
            return redirect()->route("sepet");
        }

        Cart::instance("default")->add($item->id, $item->name, 1, $item->price)->associate('App\Urun');
        Session::flash('başarılı',"Ürün Sepete Gönderildi.");
        return redirect()->route("sepet");
    }
    public function sepet_urun_adet_guncelle(Request $request,$id){
        if ($request->quantity<0 or $request->quantity>5){
            Session::flash('hata',"Ürün Adedi 1 ile 5 arasında olmalıdır.");
            return response()->json(['hata'=>true],400);
        }
        Cart::update($id,$request->quantity);
        Session::flash('başarılı',"Ürün Adedi Güncellendi.");
        return response()->json(['basarili'=>true]);
    }
    public function odeme(){
        return view("odeme")->with([
            'indirim'=>$this->getNumbers()->get('indirim'),
            'yeniSubtotal'=>$this->getNumbers()->get('yeniSubtotal'),
            'yeniTax'=>$this->getNumbers()->get('yeniTax'),
            'yeniTotal'=>$this->getNumbers()->get('yeniTotal'),
        ]);
    }
    public function odemeyap(Request $request){
        $this->validate($request,array(
            'email'       => 'required|email',
            'isim'        => 'required',
            'adres'       => 'required',
            'sehir'       => 'required',
            'ulke'        => 'required',
            'posta_kodu'  => 'required',
            'telefon'     => 'required'
        ));
        
        $contents=Cart::content()->map(function ($item){
            return $item->model->url.", ".$item->qty;
        })->values()->toJson();
        try{
            $odeme=Stripe::charges()->create([
                'amount'=>$this->getNumbers()->get('yeniTotal'),
                'currency'=>'TRY',
                'source'=>$request->stripeToken,
                'description'=>$request->isim." kişinin ödemesi",
                'receipt_email'=>$request->email,
                'metadata'=>[
                    'ürünler'=>$contents,
                    'adet'=>Cart::instance("default")->count(),
                    'indirim'=>collect(session()->get("kupon"))->toJson(),
                ],
            ]);
            Cart::instance("default")->destroy();
            Session::flash('başarılı',"Ödemeniz başarıyla gerçekleşti.");
            return redirect()->route("tamamlandi")->with('başarılı',"Ödemeniz başarıyla gerçekleşti.");
        }catch (CardErrorException $e){
            Session::flash('hata',$e->getMessage());
            return redirect()->route("odeme");
        }
    }
    public function tamamlandi(){
        if (!\session()->has('başarılı')){
            return redirect()->route("anasayfa");
        }else{
            return view("tamamlandi");
        }
    }
    public function kupon(Request $request){
        $kupon=Kupon::where("kod",$request->kod)->first();
        if(!$kupon){
            Session::flash('hata',"Hatalı Kupon Kodu.");
            return redirect()->route("odeme");
        }
        session()->put('kupon',[
            'isim'=>$kupon->kod,
            'indirim'=>$kupon->discount(Cart::subtotal())
        ]);
        Session::flash('başarılı',"Kupon eklendi.");
        return redirect()->route("odeme");
    }
    public function kupon_sil(){
        session()->forget("kupon");
        Session::flash('başarılı',"Kupon Silindi.");
        return redirect()->route("odeme");
    }
    private function getNumbers(){        
        $tax=config("cart.tax")/100;
        $indirim=session()->get("kupon")["indirim"]??0;
        $indirim=sprintf('%01.2f', $indirim);
        //dd(sprintf('%01.2f', (Cart::subtotal())));
        //dd($indirim);
        $yeniSubtotal=sprintf('%01.2f', (Cart::subtotal()-$indirim));
        $yeniTax=sprintf('%01.2f', $yeniSubtotal*$tax);
        $yeniTotal=sprintf('%01.2f', $yeniSubtotal*(1+$tax));
        return collect([
            'tax'=>$tax,
            'indirim'=>$indirim,
            'yeniSubtotal'=>$yeniSubtotal,
            'yeniTax'=>$yeniTax,
            'yeniTotal'=>$yeniTotal,
        ]);
    }
    public function profil(){
        return view("profil");
    }
}
