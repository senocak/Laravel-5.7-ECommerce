@extends("index")
@section("title"," Blog")
@section("arkaplan")
    <div class="hero container">
        <div class="hero-copy">
            <h1>{{$blog->baslik}}</h1>
            <p>{{date("d.m.Y h:ia",strtotime($blog->created_at))}} <br>Tarihinde oluşturuldu</p>
            
        </div>
        <div class="hero-image"><img src="{{url("/")}}/img/blog/{{ $blog->resim }}" alt="hero image"></div>
    </div>
@endsection
@section("içerik")
    <div class="blog-section">
        <div class="blog-description" style="text-align: justify;">
            {{$blog->icerik}}
        </div>    
    </div>
@endsection