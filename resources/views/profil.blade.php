@extends("index")
@section("title"," Profil")
@section("içerik") 
    <div class="products-section container">
        <div class="sidebar">
            <ul>
                <li class="active"><a href="{{route("profil")}}">Profilim</a></li>
                <li><a href="{{route("siparis")}}">Siparişlerim</a></li>
            </ul>
        </div>
        <div class="my-profile">
            <div class="products-header"><h1 class="stylish-heading">Profilim</h1></div>
            <div>
                @if (Session::has('başarılı'))
                    <div class="alert alert-success">{{Session::get('başarılı')}}</div>
                @endif
                @if (Session::has('hata'))
                    <div class="alert alert-warning">{{Session::get('hata')}}</div>
                @endif
                <form action="{{route("profil_guncelle",$user)}}" method="POST">
                    {{ csrf_field() }} 
                    <input id="name" type="text" name="name" value="{{$user->name}}" placeholder="Name" required="">
                    <input id="email" type="email" name="email" value="{{$user->email}}" placeholder="Name" required="">
                    <input id="password" type="password" name="password" placeholder="*****">
                    <input id="password-password" type="password" name="password_confirmation" placeholder="*****">
                    <div><button type="submit" class="my-profile-button">Güncelle</button></div>
                </form>
            </div>
            <div class="spacer"></div>
        </div>
    </div>


    


    
@endsection