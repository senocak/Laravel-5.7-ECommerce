<?php
namespace App\Http\Controllers;
use App\Blog;
use App\Urun;
use App\User;
use App\Kupon;
use App\Resim;
use App\Kaydet;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if((Auth::user()->admin)==true){
            
            //$user = Auth::user();
            //return view("admin.anasayfa")->withUser($user);
        }else{
            return redirect("/");
        }
    }
    public function index_update (Request $request){
        if((Auth::user()->admin)==true){ 
            return $request;
        }else{
            return redirect("/");
        }
    }
    public function kategori_index(){
        if((Auth::user()->admin)==true){
            $kategoriler=Kategori::orderBy("sira",'asc')->get();
            return view("admin.kategori_index")->withKategoriler($kategoriler);
        }else{
            return redirect("/");
        }
    }
    public function kategori_ekle(Request $request){
        if((Auth::user()->admin)==true){
            $this->validate($request,array(
                'isim'        => 'required'
            ));
            $kategori=new Kategori;
            $kategori->isim=$request->isim;
            $kategori->url=$this->self_url($request->isim);
            $kategori->save();
            Session::flash('başarılı',"Kategori Eklendi.");
            return redirect()->route("kategori.index");
        }else{
            return redirect("/");
        }
    }
    public function kategori_duzenle(Request $request,$id){
        if((Auth::user()->admin)==true){
            $this->validate($request,array(
                'isim'        => 'required'
            ));
            $kategori=Kategori::findOrFail($id);
            $kategori->isim=$request->isim;
            $kategori->url=$this->self_url($request->isim);
            $kategori->save();
            $kategoriler=Kategori::all();
            Session::flash('başarılı',"Kategori Güncellendi.");
            return redirect()->route("kategori.index");
        }else{
            return redirect("/");
        }
    }
    public function kategori_sil($id){
        if((Auth::user()->admin)==true){
            $kategori=Kategori::findOrFail($id);
            foreach($kategori->urunler as $urunler){
                $this->kategori_urun_sil($id,$urunler->id);
            }
            DB::table('kategori_urun')->where('kategori_id',$id)->delete();
            $kategori->delete();
            $kategoriler=Kategori::all();
            Session::flash('başarılı',"Kategori Silindi.");
            return redirect()->route("kategori.index");
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun($id){
        if((Auth::user()->admin)==true){
            $kategori=Kategori::findOrFail($id);
            $urunler=$kategori->urunler;
            return view("admin.kategori_urunler")->withUrunler($urunler)->withKategori($kategori);
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun_ekle($kategori_id){
        if((Auth::user()->admin)==true){
            $kategori=Kategori::findOrFail($kategori_id);
            $kategoriler=Kategori::all();
            return view("admin.kategori_urun_ekle")->withKategoriOnly($kategori)->withKategoriler($kategoriler);
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun_ekle_post(Request $request,$kategori_id){
        if((Auth::user()->admin)==true){
            $this->validate($request,array(
                'isim'  =>  'required',
                'detay' =>  'required',
                'fiyat' =>  'required|integer',
                'aciklama'=> 'required'
            ));
            $urun=new Urun;
            $urun->isim=$request->isim;
            $urun->url=$this->self_url($request->isim);
            $urun->detay=$request->detay;
            $urun->fiyat=$request->fiyat;
            $urun->aciklama=$request->aciklama;
            if($request->onecikan){
                $urun->onecikan=true;
            }
            $urun->save();
            $urun->kategoriler()->sync($request->kategoriler,false);
            //DB::insert('insert into kategori_urun (urun_id, kategori_id) values (?, ?)', [$urun->id, $kategori_id]);
            $kategori=Kategori::findOrFail($kategori_id);
            $urunler=$kategori->urunler;
            Session::flash('başarılı',"Ürün Eklendi.");
            return view("admin.kategori_urunler")->withUrunler($urunler)->withKategori($kategori);
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun_sil($kategori_id,$urun_id){
        if((Auth::user()->admin)==true){
            $resimler=Resim::where("urun_id",$urun_id)->get();
            foreach($resimler as $resim){
                $resim=Resim::findOrFail($resim->id);
                $resim->delete();
                Storage::delete("urunler/".$resim->resim);                
            }
            $urun=Urun::findOrFail($urun_id);
            $urun->delete();
            DB::table('kategori_urun')->where('urun_id',$urun_id)->where('kategori_id',$kategori_id)->delete();
            Session::flash('başarılı',"Ürün Silindi.");
            return redirect()->route("kategori.urun",$kategori_id);
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun_duzenle($kategori_id,$urun_id){
        if((Auth::user()->admin)==true){
            $urun=Urun::findOrFail($urun_id);
            return view("admin.kategori_urun_duzenle")->withKategoriId($kategori_id)->withUrun($urun);
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun_duzenle_post(Request $request,$kategori_id,$urun_id){
        if((Auth::user()->admin)==true){ 
            $this->validate($request,array(
                'isim'  =>  'required',
                'detay' =>  'required',
                'fiyat' =>  'required|integer',
                'aciklama'=> 'required'
            ));
            $urun=Urun::findOrFail($urun_id);
            $urun->isim=$request->isim;
            $urun->url=$this->self_url($request->isim);
            $urun->detay=$request->detay;
            $urun->fiyat=$request->fiyat;
            $urun->aciklama=$request->aciklama;
            if($request->onecikan){
                $urun->onecikan=true;
            }else{
                $urun->onecikan=false;
            }
            $urun->save();
            Session::flash('başarılı',"Ürün Güncellendi.");
            return redirect()->route("kategori.urun",$kategori_id);
        }else{
            return redirect("/");
        }        
    }
    public function kategori_urun_resimler($kategori_id,$urun_id){
        if((Auth::user()->admin)==true){
            $resimler=Resim::where("urun_id",$urun_id)->get();
            return view("admin.kategori_urun_resimler")->withResimler($resimler)->withKategoriId($kategori_id)->withUrunId($urun_id);
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun_resimler_post(Request $request,$kategori_id,$urun_id){
        if((Auth::user()->admin)==true){
            if ($request->hasFile('resim')) {
                $resim=new Resim;
                $img=$request->file('resim');
                $filename=$this->self_url($urun_id."_".rand(1,10000)).".".$img->getClientOriginalExtension();
                $location=public_path('img/urunler/'.$filename);
                Image::make($img)->resize(500,333)->save($location);
                $resim->resim=$filename;
                $resim->urun_id=$urun_id;
                $resim->save();
                Session::flash('başarılı',"Resim Değiştirildi.");
            }else{
                Session::flash('hata',"Resim Değiştirilmedi.");
            }
            $resimler=Resim::where("urun_id",$urun_id)->get();
            Session::flash('başarılı',"Resim Eklendi.");
            return view("admin.kategori_urun_resimler")->withResimler($resimler)->withKategoriId($kategori_id)->withUrunId($urun_id);
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun_resimler_sil($kategori_id,$urun_id,$resim_id){
        if((Auth::user()->admin)==true){
            $resim=Resim::findOrFail($resim_id);
            $resim->delete();
            Storage::delete("urunler/".$resim->resim);
            Session::flash('başarılı',"Resim Silindi.");
            return redirect()->route("kategori.urun_resimler",[$kategori_id,$urun_id]);
        }else{
            return redirect("/");
        }
    }
    public function kategori_sirala(Request $request){
        if((Auth::user()->admin)==true){
            foreach ( $request->item as $key => $value ){ 
                $category=Kategori::find($value);
                $category->sira=$key;
                $category->save();    
            }
            Session::flash('başarılı','İçeriklerin sırala işlemi güncellendi');
            return array( 'islemSonuc' => true , 'islemMsj' => 'İçeriklerin sırala işlemi güncellendi' );
        }else{
            return redirect("/");
        }
    }
    public function kupon(){
        if((Auth::user()->admin)==true){
            $kupon=Kupon::all();
            return view("admin.kupon_index")->withKupons($kupon);
        }else{
            return redirect("/");
        }
    }
    public function kupon_ekle(Request $request){
        if((Auth::user()->admin)==true){
            $this->validate($request,array(
                'islem'        => 'required'
            ));
            $kupon=new Kupon;
            $kupon->kod=$request->kod;
            $kupon->tip=$request->islem;
            if($request->islem=="sabit"){
                $this->validate($request,array(
                    'sabit'        => 'required'
                ));
                $kupon->adet=$request->sabit;
            }else{
                $this->validate($request,array(
                    'yuzde'        => 'required'
                ));
                $kupon->yuzde=$request->yuzde;
            }
            $kupon->save();
            Session::flash('başarılı',"Kupon Eklendi.");
            return redirect()->route("admin.kupon");
        }else{
            return redirect("/");
        }
    }
    public function kupon_sil($kupon_id){
        if((Auth::user()->admin)==true){
            $kupon=Kupon::findOrFail($kupon_id);
            $kupon->delete();
            Session::flash('başarılı',"Kupon Silindi.");
            return redirect()->route("admin.kupon");
        }else{
            return redirect("/");
        }
    }
    public function kupon_duzenle($kupon_id){
        if((Auth::user()->admin)==true){
            $kupon=Kupon::findOrFail($kupon_id);
            return view("admin.kupon_duzenle")->withKupon($kupon);
        }else{
            return redirect("/");
        }
    }
    public function kupon_duzenle_post(Request $request,$kupon_id){
        if((Auth::user()->admin)==true){
            $this->validate($request,array(
                'islem'        => 'required',
                'son_kullanım_tarihi'=>'required|date'
            ));
            $kupon=Kupon::findOrFail($kupon_id);
            $kupon->kod=$request->kod;
            $kupon->tip=$request->islem;
            $kupon->son_kullanım_tarihi=$request->son_kullanım_tarihi;
            if($request->islem=="sabit"){
                $this->validate($request,array(
                    'sabit'        => 'required'
                ));
                $kupon->adet=$request->sabit;
            }else{
                $this->validate($request,array(
                    'yuzde'        => 'required'
                ));
                $kupon->yuzde=$request->yuzde;
            }
            if($request->aktif){
                $kupon->aktif=1;
            }else{
                $kupon->aktif=0;
            }
            $kupon->save();
            Session::flash('başarılı',"Kupon Güncellendi.");
            return redirect()->route("admin.kupon");
        }else{
            return redirect("/");
        }
    }
    public function blog(){
        if((Auth::user()->admin)==true){
            $blog=Blog::all();
            return view("admin.blog_index")->withBlogs($blog);
        }else{
            return redirect("/");
        }
    }
    public function blog_ekle(){
        if((Auth::user()->admin)==true){
            return view("admin.blog_ekle");
        }else{
            return redirect("/");
        }
    }
    public function blog_ekle_post(Request $request){
        if((Auth::user()->admin)==true){
            $this->validate($request,array(
                'baslik'        =>  'required',
                'resim'         =>  'required',
                'icerik'        =>  'required'
            ));
            $blog=new Blog;
            $blog->baslik=$request->baslik;
            $url=$this->self_url($request->baslik);
            $blog->url=$url;

            $img=$request->file('resim');
            $filename=$url.".".$img->getClientOriginalExtension();
            $location=public_path('img/blog/'.$filename);
            Image::make($img)->resize(1300,900)->save($location);
            $blog->resim=$filename;

            $blog->icerik=$request->icerik;
            //$blog->created_at=date("Y-m-d h:i");
            $blog->save();
            Session::flash('başarılı',"Blog Eklendi.");
            return redirect()->route("admin.blog");
        }else{
            return redirect("/");
        }
    }
    public function blog_duzenle($blog_id){
        if((Auth::user()->admin)==true){
            $blog=Blog::findOrFail($blog_id);
            return view("admin.blog_duzenle")->withBlog($blog);
        }else{
            return redirect("/");
        }
    }
    public function blog_duzenle_post(Request $request,$blog_id){
        if((Auth::user()->admin)==true){
            $this->validate($request,array(
                'baslik'        =>  'required',
                'icerik'        =>  'required'
            ));
            $blog=Blog::findOrFail($blog_id);
            $blog->baslik=$request->baslik;
            $url=$this->self_url($request->baslik);
            $blog->url=$url;
            if ($request->hasFile('resim')) {
                $oldfilename=$blog->resim;
                $img=$request->file('resim');
                $filename=$url.".".$img->getClientOriginalExtension();
                $location=public_path('img/blog/'.$filename);
                Image::make($img)->resize(1300,900)->save($location);
                $blog->resim=$filename;
                Storage::delete("blog/".$oldfilename);    
            }
            $blog->icerik=$request->icerik;
            $blog->save();
            Session::flash('başarılı',"Blog Güncellendi.");
            return redirect()->route("admin.blog");
        }else{
            return redirect("/");
        }
    }
    public function blog_sil($blog_id){
        if((Auth::user()->admin)==true){
            $blog=Blog::findOrFail($blog_id);
            Storage::delete("blog/".$blog->resim);    
            $blog->delete();
            Session::flash('başarılı',"Blog Silindi.");
            return redirect()->route("admin.blog");
        }else{
            return redirect("/");
        }
    }
    public function kulanicilar_index(){
        if((Auth::user()->admin)==true){
            $kullanicilar=User::all();
            $kaydet=Kaydet::all();
            return view("admin.kullanicilar_index")->withKullanicilar($kullanicilar)->withKaydets($kaydet);
        }else{
            return redirect("/");
        }
    }
    public function kulanicilar_admin_yap($kullanici_id){
        if((Auth::user()->admin)==true){
            $kullanicilar=User::findOrFail($kullanici_id);
            $kullanicilar->admin=1;
            $kullanicilar->save();
            return redirect()->route("admin.kulanicilar");
        }else{
            return redirect("/");
        }
    }
    function self_url($title){
        $search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","&","'",",","A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","Q","X");
        $replace = array("-","o","u","i","g","c","s","-","","-","","","a","b","c","c","d","e","f","g","g","h","i","i","j","k","l","m","n","o","o","p","r","s","s","t","u","u","v","y","z","q","x");
        $new_text = str_replace($search,$replace,trim($title));
        return $new_text;
    }
}