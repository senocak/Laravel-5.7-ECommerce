@extends("admin.index")
@section("title"," Blog Yaz")
@section("admin_icerik") 
    <br><br>
    <form method="POST" action="{{route("admin.blog_ekle_post")}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Başlık" name="baslik" required>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="resim" onchange="showimagepreview(this)" required>
            <img src="{{url('/')}}/img/no-image.png" style="width:200px" id="imgview">
        </div>
        <div class="form-group">
            <textarea class="ckeditor" name="icerik" id="editor1"></textarea>
        </div> 
        <button type="submit" class="btn btn-primary">Ekle</button>
    </form> 
    <div class="spacer"></div> 
@endsection