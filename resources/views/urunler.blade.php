@extends("index")
@section("title"," Ürünler")
@section("içerik")
    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{url("/")}}">Anasayfa</a>
                <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span>Ürünler</span>
            </div>
            <div>
                <form action="https://laravelecommerceexample.ca/search" method="GET" class="search-form">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" name="query" id="query" value="" class="search-box" placeholder="Ürün Ara" required>
                </form>
            </div>
        </div>
    </div>
    <div class="products-section container">
        <div class="sidebar">
            <h3>Kategoriler</h3>
            <ul>
                <li class=""><a href="https://laravelecommerceexample.ca/shop?category=laptops">Laptops</a></li>
                <li class=""><a href="https://laravelecommerceexample.ca/shop?category=desktops">Desktops</a></li>
                <li class=""><a href="https://laravelecommerceexample.ca/shop?category=mobile-phones">Mobile Phones</a></li>
                <li class=""><a href="https://laravelecommerceexample.ca/shop?category=tablets">Tablets</a></li>
                <li class=""><a href="https://laravelecommerceexample.ca/shop?category=tvs">TVs</a></li>
                <li class=""><a href="https://laravelecommerceexample.ca/shop?category=digital-cameras">Digital Cameras</a></li>
                <li class=""><a href="https://laravelecommerceexample.ca/shop?category=appliances">Appliances</a></li>
            </ul>
        </div>
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">Ürünler</h1>
                <div>
                    <strong>Fiyat: </strong>
                    <a href="https://laravelecommerceexample.ca/shop?sort=low_high">Azalan</a> |
                    <a href="https://laravelecommerceexample.ca/shop?sort=high_low">Artan</a>
                </div>
            </div>
            <div class="products text-center">
                @foreach($urunler as $urun)
                    <div class="product">
                        <a href="{{route("ürün.detay",$urun->url)}}"><img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-1.jpg" alt="product"></a>
                        <a href="{{route("ürün.detay",$urun->url)}}"><div class="product-name">{{$urun->isim}}</div></a>
                        <div class="product-price">{{$urun->fiyat}}</div>
                    </div>
                @endforeach
            </div>
            <div class="spacer"></div>
            <ul class="pagination">
                {{$urunler->links()}}
            </ul>
        </div>
    </div>
@endsection
