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
            <li class="nav-item"><a class="nav-link" href="{{route("admin.blog")}}">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route("admin.kupon")}}">Kupon</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route("admin.kulanicilar")}}">Müşteri</a></li>
          </ul>
          <input class="form-control my-2 my-sm-0" type="search" placeholder="Search" style="width:150px;">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
        </div>
      </nav>
      
      <style> 
        .container {display: block;position: relative;padding-left: 35px;margin-bottom: 12px;cursor: pointer;font-size: 22px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
        .container input {position: absolute;opacity: 0;cursor: pointer;height: 0;width: 0;}
        .checkmark {position: absolute;top: 0;left: 0;height: 25px;width: 25px;background-color: #eee;}
        .container:hover input ~ .checkmark {background-color: #ccc;}
        .container input:checked ~ .checkmark {background-color: #2196F3;}
        .checkmark:after {content: "";position: absolute;display: none;}
        .container input:checked ~ .checkmark:after {display: block;}
        .container .checkmark:after {left: 9px;top: 5px;width: 5px;height: 10px;border: solid white;border-width: 0 3px 3px 0;-webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);transform: rotate(45deg);}
    </style>
        
    <script src="{{url("/")}}/editor/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      function showimagepreview(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {$('#imgview').attr('src', e.target.result);}
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script> 

    @yield('admin_icerik')  

    <script language="javascript" type="text/javascript">
      CKEDITOR.replace('editor1',{
        filebrowserWindowWidth: '900',
        filebrowserWindowHeight: '400',
        filebrowserBrowseUrl: '{{url("/")}}/editor/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '{{url("/")}}/editor/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl: '{{url("/")}}/editor/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl: '{{url("/")}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '{{url("/")}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '{{url("/")}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
      }); 
    </script> 
@endsection