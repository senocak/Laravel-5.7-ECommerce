@extends("index")
@section("title"," Profil")
@section("içerik")
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="{{route("profil")}}">Profilim</a></li>
                <li class="nav-item active"><a class="nav-link" href="{{route("siparis")}}">Siparişlerim</a></li>
            </ul> 
            <div class="form-inline my-2 my-lg-0"> 
                <a class="btn btn-outline-success my-2 my-sm-0" href="{{route("cikis")}}">Çıkış Yap</a>
            </div>
        </div>
    </nav>
    <div class=" my-orders  "> 
        <div class="my-profile"><br>
            <div>
                <div class="order-container"> 
                    <div class="order-products"><hr>
                        @forelse($siparisler as $siparis)
                            <div class="order-product-item">
                                <div>                                
                                    @if(count($siparis->resim)>0)
                                        @php($i=1)
                                        @foreach ($siparis->resim as $resim)
                                            @if($i==1)
                                                <img src="{{url("/")}}/img/urunler/{{$resim->resim}}" alt="ürün" class="active" id="currentImage">
                                            @endif
                                            @php($i++)
                                        @endforeach
                                    @else
                                        <img src="{{url("/")}}/img/urunler/no-image.png" alt="ürün" class="active" id="currentImage" width="180px">
                                    @endif
                                </div>
                                <div>
                                    <div><a href="{{$siparis->urunler->url}}">{{$siparis->urunler->isim}}</a></div>
                                    <div>{{presentPrice($siparis->urunler->fiyat,2)}}₺</div>
                                </div>
                            </div>
                            <hr>
                        @empty
                            <h1>Sipariş Yok</h1>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
        </div>
    </div>
@endsection