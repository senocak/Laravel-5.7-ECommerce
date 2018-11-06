@extends("index")
@section("title",$urun->isim)
@section("içerik")
    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{route("anasayfa")}}">Anasayfa</a> <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <a href="{{route("ürün.index")}}">Ürünler</a> <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span>{{$urun->isim}}</span>
            </div>
            <div>
                <form action="" method="GET" class="search-form">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" name="query" id="query" value="" class="search-box" placeholder="Ürün Ara" required>
                </form>
            </div>
        </div>
    </div>
    <div class="product-section container">
        <div>
            <div class="product-section-image">
                @if(count($urun->resim)>0)
                    @php($i=1)
                    @foreach ($urun->resim as $resim)
                        @if($i==1)
                            <img src="{{url("/")}}/img/urunler/{{$resim->resim}}" alt="ürün" class="active" id="currentImage">
                        @endif
                        @php($i++)
                    @endforeach
                @else
                    <img src="{{url("/")}}/img/urunler/no-image.png" alt="ürün" class="active" id="currentImage" width="180px">
                @endif

                
                
            </div>
            <div class="product-section-images">
                @foreach ($urun->resim as $resim)
                    <div class="product-section-thumbnail selected">
                        <img src="{{url("/")}}/img/urunler/{{$resim->resim}}" alt="ürün">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{$urun->isim}}</h1>
            <div class="product-section-subtitle">{{$urun->detay}}</div>
            <div>
                @foreach ($urun->kategoriler as $kategori)
                    <a href="{{route("ürün.index",['kategori'=>$kategori->url])}}"><div class="badge badge-success">{{$kategori->isim}}</div></a>
                @endforeach
            </div>
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