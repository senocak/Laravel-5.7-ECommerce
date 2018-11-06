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
Route::post('/profil/{user}', 'IndexController@profil_guncelle')->name('profil_guncelle')->middleware('auth');

Route::get('/siparis', 'IndexController@siparis')->name('siparis')->middleware('auth');
//Tanımlı Değil

Route::get('/blog','IndexController@blog')->name("blog.index");
Route::get('/blog/{url}','IndexController@blog_post')->name("blog.post");

Route::get('/admin','AdminController@index')->name("admin.index");