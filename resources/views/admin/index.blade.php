@extends("index")
@section("title"," Anasayfa")
@section("içerik")
    @php($kategoriler=DB::table('kategoris')->get())
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="{{route("admin.anasayfa")}}">Anasayfa <span class="sr-only">(current)</span></a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kategoriler
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route("kategori.index")}}">Tüm Kategoriler</a>
                <div class="dropdown-divider"></div>
                @foreach ($kategoriler as $kategori)
                  <a class="dropdown-item" href="{{route("kategori.urun_index",$kategori->id)}}">{{$kategori->isim}}</a>
                @endforeach
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
           
            <input class="form-control my-2 my-sm-0" type="search" placeholder="Search" style="width:150px;">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
           
        </div>
      </nav>
    @yield('admin_icerik')    
@endsection