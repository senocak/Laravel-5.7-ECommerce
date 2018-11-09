<?php
namespace App\Http\Controllers;
use App\Urun;
use App\User;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if((Auth::user()->admin)==true){
            $user = Auth::user();
            return view("admin.anasayfa")->withUser($user);
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
            $kategoriler=Kategori::all();
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
            return redirect()->route("kategori.index");
        }else{
            return redirect("/");
        }
    }
    public function kategori_sil($id){
        if((Auth::user()->admin)==true){
            $kategori=Kategori::findOrFail($id);
            $kategori->delete();
            $kategoriler=Kategori::all();
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
        return view("admin.kategori_urun_ekle")->withKategoriId($kategori_id);
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
            DB::insert('insert into kategori_urun (urun_id, kategori_id) values (?, ?)', [$urun->id, $kategori_id]);
            $kategori=Kategori::findOrFail($kategori_id);
            $urunler=$kategori->urunler;
            return view("admin.kategori_urunler")->withUrunler($urunler)->withKategori($kategori);
        }else{
            return redirect("/");
        }
    }
    public function kategori_urun_sil($kategori_id,$urun_id){
        $urun=Urun::findOrFail($urun_id);
        $urun->delete();
        DB::table('kategori_urun')->where('urun_id',$urun_id)->where('kategori_id',$kategori_id)->delete();
        return redirect()->route("kategori.urun",$kategori_id);
    }
    public function kategori_urun_duzenle($kategori_id,$urun_id){
        $urun=Urun::findOrFail($urun_id);
        return view("admin.kategori_urun_duzenle")->withKategoriId($kategori_id)->withUrun($urun);
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
            return redirect()->route("kategori.urun",$kategori_id);
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