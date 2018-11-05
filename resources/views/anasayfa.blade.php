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
    <div class="featured-section">
        <div class="container">
            <h1 class="text-center">Laravel Eticaret</h1>
            <div class="products text-center">
                @foreach($urunler as $urun)
                    <div class="product">
                        <a href="{{url("/")}}/urun/{{$urun->url}}"><img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-1.jpg" alt="product"></a>
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
@endsection