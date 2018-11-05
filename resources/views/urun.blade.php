@extends("index")
@section("title",$urun->isim)
@section("içerik")
    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{url("/")}}">Anasayfa</a><i class="fa fa-chevron-right breadcrumb-separator"></i>
                <a href="{{url("/")}}/urun">Ürünler</a><i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span>{{$urun->isim}}</span>
            </div>
            <div>
                <form action="https://laravelecommerceexample.ca/search" method="GET" class="search-form">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" name="query" id="query" value="" class="search-box" placeholder="Ürün Ara" required>
                </form>
            </div>
        </div>
    </div>
    <div class="product-section container">
        <div>
            <div class="product-section-image">
                <img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-1.jpg" alt="product" class="active" id="currentImage">
            </div>
            <div class="product-section-images">
                <div class="product-section-thumbnail selected">
                    <img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-1.jpg" alt="product">
                </div>

                <div class="product-section-thumbnail">
                    <img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-2.jpg" alt="product">
                </div>
                <div class="product-section-thumbnail">
                    <img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-3.jpg" alt="product">
                </div>
                <div class="product-section-thumbnail">
                    <img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-4.jpg" alt="product">
                </div>
            </div>
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{$urun->isim}}</h1>
            <div class="product-section-subtitle">{{$urun->detay}}</div>
            <div><div class="badge badge-success">Stokta</div></div>
            <div class="product-section-price">{{presentPrice($urun->fiyat,2)}}₺</div>
            <p>{{$urun->aciklama}}</p>
            <p>&nbsp;</p>
            <form action="{{route("sepet.ekle")}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$urun->id}}">
                <input type="hidden" name="isim" value="{{$urun->isim}}">
                <input type="hidden" name="fiyat" value="{{$urun->fiyat}}">
                <button type="submit" class="button button-plain">Sepete Ekle</button>
            </form>
        </div>
    </div>
@endsection
