@extends("admin.index")
@section("title"," Blog Düzenle")
@section("admin_icerik") 
    <br><br>
    <form method="POST" action="{{route("admin.blog_duzenle_post",$blog->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Başlık" name="baslik" required value="{{$blog->baslik}}">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="resim" onchange="showimagepreview(this)" required>
            <img src="{{url('/')}}/img/no-image.png" style="width:200px" id="imgview">
            <img src="{{url('/')}}/img/blog/{{$blog->resim}}" style="width:200px">
        </div>
        <div class="form-group">
            <textarea class="ckeditor" name="icerik" id="editor1">{{$blog->icerik}}</textarea>
        </div> 
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form> 
    <div class="spacer"></div> 
@endsection