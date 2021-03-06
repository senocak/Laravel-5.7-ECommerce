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
                <form action="" method="GET" class="search-form">
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
                @foreach($kategoriler as $kategori)
                    <li class="{{request()->kategori == $kategori->url ? "active":""}}"><a href="{{route("ürün.index",['kategori'=>$kategori->url])}}">{{$kategori->isim}}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{$kategoriismi}}</h1>
                <div>
                    <strong>Fiyat: </strong>
                    <a href="{{route("ürün.index",['kategori'=>request()->kategori,'fiyat'=>'azalan'])}}">Azalan</a> |
                    <a href="{{route("ürün.index",['kategori'=>request()->kategori,'fiyat'=>'artan'])}}">Artan</a>
                </div>
            </div>
            <div class="products text-center">
                @forelse($urunler as $urun)
                    <div class="product">
                        <a href="{{route("ürün.detay",$urun->url)}}">
                            @if(count($urun->resim)>0)
                                @php($i=1)
                                @foreach($urun->resim as $resim)
                                    @if($i==1)
                                        <img src="{{url("/")}}/img/urunler/{{$resim->resim}}" class="img-fluid" width="100px">
                                    @endif
                                    @php($i++)
                                @endforeach
                            @else
                                <img src="{{url("/")}}/img/urunler/no-image.png" class="img-fluid" width="180px">
                            @endif
                        </a>
                        <a href="{{route("ürün.detay",$urun->url)}}"><div class="product-name">{{$urun->isim}}</div></a>
                        <div class="product-price">{{presentPrice($urun->fiyat,2)}}₺</div>
                    </div>
                @empty
                    <h3 style="text-align: left">Kategoriye Ürün Eklenmemiş</h3>
                @endforelse
            </div>
            <div class="spacer"></div>
            <ul class="pagination">
                {{$urunler->appends(request()->input())->links()}}
            </ul>
        </div>
    </div>
@endsection
