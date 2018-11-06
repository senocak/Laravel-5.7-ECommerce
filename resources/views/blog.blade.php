@extends("index")
@section("title"," Blog")
@section("içerik")
    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{url("/")}}">Anasayfa</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span>Blog</span>
            </div>
            <div>
                <form action="" method="GET" class="search-form">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" name="query" id="query" value="" class="search-box" placeholder="Ürün Ara" required>
                </form>
            </div>
        </div>
    </div>
    <div class="blog-section">
        <div class="blog-posts">
            @foreach ($blog as $blog_post)
                @php($kelime=400)
                @php($icerik=strip_tags($blog_post->icerik))
                @if(strlen($icerik)>=$kelime)
                    @if(preg_match('/(.*?)\s/i',substr($icerik,$kelime),$dizi))
                        @php($icerik=substr($icerik,0,$kelime+strlen($dizi[0]))."...")
                    @endif
                @else
                    @php($icerik.="")
                @endif
                <div class="blog-post">
                    <a href="{{route("blog.post",$blog_post->url)}}"><img src="{{url("/")}}/img/blog/{{ $blog_post->resim }}" alt="Blog Image"></a>
                    <a href="{{route("blog.post",$blog_post->url)}}"><h2 class="blog-title">{{$blog_post->baslik}}</h2></a>
                    <div class="blog-description">{{$icerik}}</div>
                </div>
            @endforeach
        </div>
        <div class="text-center button-container">
            {{$blog->links()}}
        </div>
    </div>
@endsection