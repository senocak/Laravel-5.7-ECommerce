@extends("index")
@section("title"," Profil")
@section("içerik")
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="{{route("profil")}}">Profilim</a></li>
            <li class="nav-item active"><a class="nav-link" href="{{route("siparis")}}">Siparişlerim</a></li>
          </ul> 
          <div class="form-inline my-2 my-lg-0"> 
            <a class="btn btn-outline-success my-2 my-sm-0" href="{{route("cikis")}}">Çıkış Yap</a>
          </div>
        </div>
      </nav>
    <div class="products-section container">
            <div class="sidebar">
                <div class="container">
                    <div class="card">
                        <img src="{{url('/')}}/img/user/{{$user->resim}}" alt="{{$user->name}}" style="width:100%">
                        <h1>{{$user->name}}</h1>  
                        <p><button class="button">{{$user->email}}</button></p>
                    </div>
                </div>
            </div>
            <div class="my-profile"> 
                <div>
                    @if (Session::has('başarılı'))
                        <div class="alert alert-success">{{Session::get('başarılı')}}</div>
                    @endif
                    @if (Session::has('hata'))
                        <div class="alert alert-warning">{{Session::get('hata')}}</div>
                    @endif
                    <form action="{{route("profil.update",$user)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} 
                        <input id="name" type="text" name="name" value="{{$user->name}}" placeholder="Name" required="">
                        <input id="email" type="email" name="email" value="{{$user->email}}" placeholder="Name" required="">
                        <input id="password" type="password" name="password" placeholder="*****">
                        <input id="password-password" type="password" name="password_confirmation" placeholder="*****">
                        <input type="file" name="resim">       
                        <div><button type="submit" class="my-profile-button">Güncelle</button></div>
                    </form>
                </div>
                <div class="spacer"></div>
            </div>
        </div>
@endsection