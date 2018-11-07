<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
    public function create(){
        //
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