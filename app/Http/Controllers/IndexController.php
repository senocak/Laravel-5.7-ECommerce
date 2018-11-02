<?php

namespace App\Http\Controllers;

use App\Urun;
use Illuminate\Http\Request;


class IndexController extends Controller{
    public function index(){
        $urunler=Urun::paginate(6);
        return view("index")->withUrunler($urunler);
    }
    public function urun_detay($url){
        $urunler=Urun::where("url","=",$url)->first();
        return $urunler;
    }
    public function store(Request $request){
        //
    }
    public function show($id){
        //
    }
    public function edit($id){
        //
    }
    public function update(Request $request, $id){
        //
    }
    public function destroy($id){
        //
    }
}
