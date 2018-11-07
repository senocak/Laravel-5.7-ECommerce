@extends("index")
@section("title"," Anasayfa")
@section("arkaplan")
    <div class="hero container">
        <div class="hero-copy">
            <h1>Laravel E-ticaret</h1>
            <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration.</p>
            <div class="hero-buttons">
                <a href="https://github.com/senocak" class="button button-white">GitHub</a>
            </div>
        </div>
        <div class="hero-image"><img src="{{url('/')}}/img/macbook-pro-laravel.png" alt="hero image"></div>
    </div>
@endsection
@section("içerik")

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="featured-section">
        <div class="container">
            <h1 class="text-center">Laravel Eticaret</h1>
            <div class="products text-center">
                @foreach($urunler as $urun)
                    <div class="product">
                        <a href="{{url("/")}}/urun/{{$urun->url}}">
                            @if(count($urun->resim)>0)
                                @php($i=1)
                                @foreach($urun->resim as $resim)
                                    @if($i==1)
                                        <img src="{{url("/")}}/img/urunler/{{$resim->resim}}" class="img-fluid">
                                    @endif
                                    @php($i++)
                                @endforeach
                            @else
                                <img src="{{url("/")}}/img/urunler/no-image.png" class="img-fluid" width="180px">
                            @endif
                        </a>
                        <a href="{{url("/")}}/urun/{{$urun->url}}"><div class="product-name">{{$urun->isim}}</div></a>
                        <div class="product-price">{{sprintf('%01.2f', $urun->fiyat)}}₺</div>
                    </div>
                @endforeach
            </div>
            <div class="text-center button-container">
                <a href="{{route("ürün.index")}}" class="button">Tüm Ürünleri İncele</a>
            </div>
        </div>
    </div>
    <div class="blog-section">
        <div class="container"><h1 class="text-center">Blog</h1></div>
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
                @php($i++)
                <div class="blog-post">
                    <a href="{{route("blog.post",$blog_post->url)}}"><img src="{{url("/")}}/img/blog/{{ $blog_post->resim }}" alt="Blog Image"></a>
                    <a href="{{route("blog.post",$blog_post->url)}}"><h2 class="blog-title">{{$blog_post->baslik}}</h2></a>
                    <div class="blog-description" style="text-align: justify;">{{$icerik}}</div>
                </div>
            @endforeach
        </div>
        <div class="text-center button-container">
            <a href="{{route("blog.index")}}" class="button">Tüm Yazıları İncele</a>
        </div>
    </div>
@endsection