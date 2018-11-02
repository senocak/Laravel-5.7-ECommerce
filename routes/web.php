<?php
Route::get('/', ['as'=>'index','uses'=>'IndexController@index']);
Route::get('/urun',['as'=>'index','uses'=>'IndexController@index']);
Route::get('/urun/{url}',['as'=>'urun.detay','uses'=>'IndexController@urun_detay'])->where('url','[\w\d\-\_]+');
