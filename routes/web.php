<?php
use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/','IndexController@anasayfa_index')->name("anasayfa");
Route::get('/urun','IndexController@urun_index')->name("ürün.index");
Route::get('/urun/{url}','IndexController@urun_detay')->name("ürün.detay");

Route::get('/sepet','IndexController@sepet')->name("sepet");
Route::post('/sepet','IndexController@sepete_ekle')->name("sepet.ekle");
Route::delete('/sepet/{urun}','IndexController@sepet_urunsil')->name("sepet.urunsil");
Route::patch('/sepet/{urun}','IndexController@sepet_urun_adet_guncelle')->name("sepet.urun_adet_guncelle");
Route::post('/sepet/kaydet/{urun}','IndexController@sepet_kaydet')->name("sepet.kaydet");

Route::delete('/kaydet/{urun}','IndexController@kaydet_urunsil')->name("kaydet.urunsil");
Route::post('/kaydet/{urun}','IndexController@sepete_tasi')->name("kaydet.sepete_tasi");

Route::get("/odeme","IndexController@odeme")->name("odeme")->middleware('auth');
Route::post("/odeme","IndexController@odemeyap")->name("odemeyap")->middleware('auth');
Route::get("/tamamlandi","IndexController@tamamlandi")->name("tamamlandi")->middleware('auth');

Route::get('/sifirla',function (){
    Cart::destroy();
});

Route::post('/kupon','IndexController@kupon')->name("kupon")->middleware('auth');
Route::delete('/kupon','IndexController@kupon_sil')->name("kupon.sil")->middleware('auth');

Auth::routes();
Route::get('/profil', 'IndexController@profil')->name('profil')->middleware('auth');
Route::post('/profil/{user}', 'IndexController@profil_guncelle')->name('profil.update')->middleware('auth');

Route::get('/siparis', 'IndexController@siparis')->name('siparis')->middleware('auth');
//Tanımlı Değil

Route::get("/cikis","IndexController@cikis")->name("cikis")->middleware("auth");

Route::get('/blog','IndexController@blog')->name("blog.index");
Route::get('/blog/{url}','IndexController@blog_post')->name("blog.post");
//Admin Routes
Route::get('/admin','AdminController@index')->name("admin.anasayfa")->middleware('auth');

Route::get("/admin/kategori","AdminController@kategori_index")->name("kategori.index")->middleware("auth");
Route::post("/admin/kategori","AdminController@kategori_sirala")->name("kategori.sirala")->middleware("auth");
Route::post("/admin/kategori/ekle","AdminController@kategori_ekle")->name("kategori.ekle")->middleware("auth");
Route::get("/admin/kategori/{kategori_id}","AdminController@kategori_urun")->name("kategori.urun_index")->middleware("auth");
Route::post("/admin/kategori/{kategori_id}/duzenle","AdminController@kategori_duzenle")->name("kategori.duzenle")->middleware("auth");
Route::get("/admin/kategori/{kategori_id}/sil","AdminController@kategori_sil")->name("kategori.sil")->middleware("auth"); 
Route::get("/admin/kategori/{kategori_id}/urun","AdminController@kategori_urun")->name("kategori.urun")->middleware("auth"); 
Route::get("/admin/kategori/{kategori_id}/urun/ekle","AdminController@kategori_urun_ekle")->name("kategori.urun_ekle")->middleware("auth"); 
Route::post("/admin/kategori/{kategori_id}/urun/ekle","AdminController@kategori_urun_ekle_post")->name("kategori.urun_ekle_post")->middleware("auth"); 
Route::get("/admin/kategori/{kategori_id}/urun/{urun_id}/sil","AdminController@kategori_urun_sil")->name("kategori.urun_sil")->middleware("auth"); 
Route::get("/admin/kategori/{kategori_id}/urun/{urun_id}/duzenle","AdminController@kategori_urun_duzenle")->name("kategori.urun_duzenle")->middleware("auth");
Route::post("/admin/kategori/{kategori_id}/urun/{urun_id}/duzenle","AdminController@kategori_urun_duzenle_post")->name("kategori.urun_duzenle_post")->middleware("auth");
Route::get("/admin/kategori/{kategori_id}/urun/{urun_id}/resimler","AdminController@kategori_urun_resimler")->name("kategori.urun_resimler")->middleware("auth");
Route::post("/admin/kategori/{kategori_id}/urun/{urun_id}/resimler","AdminController@kategori_urun_resimler_post")->name("kategori.urun_resimler_post")->middleware("auth");
Route::get("/admin/kategori/{kategori_id}/urun/{urun_id}/resimler/{resim_id}/sil","AdminController@kategori_urun_resimler_sil")->name("kategori.urun_resimler_sil")->middleware("auth");

Route::get("/admin/kupon","AdminController@kupon")->name("admin.kupon")->middleware("auth");
Route::post("/admin/kupon/ekle","AdminController@kupon_ekle")->name("admin.kupon_ekle")->middleware("auth");
Route::get("/admin/kupon/{kupon_id}/sil","AdminController@kupon_sil")->name("admin.kupon_sil")->middleware("auth");
Route::get("/admin/kupon/{kupon_id}/duzenle","AdminController@kupon_duzenle")->name("admin.kupon_duzenle")->middleware("auth");
Route::post("/admin/kupon/{kupon_id}/duzenle","AdminController@kupon_duzenle_post")->name("admin.kupon_duzenle_post")->middleware("auth");

Route::get("/admin/blog","AdminController@blog")->name("admin.blog")->middleware("auth");
Route::get("/admin/blog/ekle","AdminController@blog_ekle")->name("admin.blog_ekle")->middleware("auth");
Route::post("/admin/blog/ekle","AdminController@blog_ekle_post")->name("admin.blog_ekle_post")->middleware("auth");
Route::get("/admin/blog/{blog_id}/duzenle","AdminController@blog_duzenle")->name("admin.blog_duzenle")->middleware("auth");
Route::post("/admin/blog/{blog_id}/duzenle","AdminController@blog_duzenle_post")->name("admin.blog_duzenle_post")->middleware("auth");
Route::get("/admin/blog/{blog_id}/sil","AdminController@blog_sil")->name("admin.blog_sil")->middleware("auth");

Route::get("/admin/kulanicilar","AdminController@kulanicilar_index")->name("admin.kulanicilar")->middleware("auth");
Route::get("/admin/kulanicilar/{kullanici_id}","AdminController@kulanicilar_admin_yap")->name("admin.admin_yap")->middleware("auth");