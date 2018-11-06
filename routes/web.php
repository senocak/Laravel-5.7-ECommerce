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

Route::get("/odeme","IndexController@odeme")->name("odeme");
Route::post("/odeme","IndexController@odemeyap")->name("odemeyap");
Route::get("/tamamlandi","IndexController@tamamlandi")->name("tamamlandi");

Route::get('/sifirla',function (){
    Cart::destroy();
});

Route::post('/kupon','IndexController@kupon')->name("kupon");
Route::delete('/kupon','IndexController@kupon_sil')->name("kupon.sil");


Auth::routes();
Route::get('/profil', 'IndexController@profil')->name('profil');