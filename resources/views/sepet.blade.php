@extends("index")
@section("title"," Sepetim")
@section("içerik")
    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{url("/")}}">Anasayfa</a> <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span>Sepetim</span>
            </div>
            <div>
                <form action="" method="GET" class="search-form">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" name="query" id="query" value="" class="search-box" placeholder="Ürün Ara" required>
                </form>
            </div>
        </div>
    </div>
    <div class="cart-section container" style="width: 100%">
        <div>
            @if (Session::has('başarılı'))
                <div class="alert alert-success">{{Session::get('başarılı')}}</div>
            @endif
            @if (Session::has('hata'))
                <div class="alert alert-warning">{{Session::get('hata')}}</div>
            @endif

            @if(Cart::count()>0)
                <h2>Sepetinizde {{Cart::count()}} ürün var</h2>
                <div class="cart-table" >
                    @foreach(Cart::content() as $urun)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{route("ürün.detay",$urun->model->url)}}">
                                    @if(count($urun->model->resim)>0)
                                        @php($i=1)
                                        @foreach($urun->model->resim as $resim)
                                            @if($i==1)
                                                <img src="{{url("/")}}/img/urunler/{{$resim->resim}}" class="img-fluid">
                                            @endif
                                            @php($i++)
                                        @endforeach
                                    @else
                                        <img src="{{url("/")}}/img/urunler/no-image.png" class="img-fluid" width="180px">
                                    @endif
                                </a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a href="{{route("ürün.detay",$urun->model->url)}}">{{$urun->name}}</a></div>
                                    <div class="cart-table-description">{{$urun->model->detay}}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    <form action="{{route("sepet.urunsil",$urun->rowId)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="cart-options">Sil</button>
                                    </form>
                                    <form action="{{route("sepet.kaydet",$urun->rowId)}}" method="POST">
                                        {{csrf_field()}}
                                        <button type="submit" class="cart-options">Ürünü Kaydet</button>
                                    </form>
                                </div>
                                <div>
                                    <select class="quantity" data-id="{{$urun->rowId}}">
                                        @for($i=1;$i<=5;$i++)
                                            <option {{$urun->qty==$i?'selected':''}}>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div>{{sprintf('%01.2f', $urun->subtotal())}}₺</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="cart-totals">
                    <div class="cart-totals-left"></div>
                    <div class="cart-totals-right">
                        <div>
                            Toplam <br>
                            Vergi (13%)<br>
                        </div>
                        <div class="cart-totals-subtotal">
                            {{presentPrice(Cart::subtotal())}}₺<br>
                            {{presentPrice(Cart::tax())}}₺<br>
                            <span class="cart-totals-total">{{Cart::total()}}₺</span>
                        </div>
                    </div>
                </div>
                <div class="cart-buttons" style="float: right">
                    <a href="{{route("odeme")}}" class="button-primary" >Ödeme Yap</a>
                </div>
            @else
                <h3>Sepetinizde Ürün Yoktur.</h3>
            @endif
                <br><a href="{{route("ürün.index")}}" class="button-primary" >Alışverişe Devam Et</a>
        </div>
    </div>
    <div class="cart-section container" style="width: 100%">
        <div>
            <h2>{{count($kaydets)}} ürün kayıtlı</h2>
            @forelse ($kaydets as $kaydet)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{route("ürün.detay",$kaydet->urunler["url"])}}">
                            @if(count($kaydet->urunler->resim)>0)
                                @php($i=1)
                                @foreach($kaydet->urunler->resim as $resim)
                                    @if($i==1)
                                        <img src="{{url("/")}}/img/urunler/{{$resim->resim}}" class="img-fluid">
                                    @endif
                                    @php($i++)
                                @endforeach
                            @else
                                <img src="{{url("/")}}/img/urunler/no-image.png" class="img-fluid" width="180px">
                            @endif
                        </a>
                        
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{route("ürün.detay",$kaydet->urunler["url"])}}">{{$kaydet->urunler["isim"]}}</a></div>
                            <div class="cart-table-description">{{$kaydet->urunler["detay"]}}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{route("kaydet.urunsil",$kaydet->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="cart-options">Sil</button>
                            </form>
                            <form action="{{route("kaydet.sepete_tasi",$kaydet->urunler["id"])}}" method="POST">
                                {{csrf_field()}}
                                <button type="submit" class="cart-options">Sepete Ekle</button>
                            </form>
                        </div>
                        <div>{{$kaydet->urunler["fiyat"]}}₺</div>
                    </div>
                </div>
            @empty
                Kayıtlı Ürün Bulunamadı
            @endforelse
        </div>
    </div>
@endsection

@section("js")
    <script>
        (function () {
            const classname=document.querySelectorAll('.quantity');
            Array.from(classname).forEach(function (element) {
                element.addEventListener('change',function () {
                    const  id = element.getAttribute("data-id");
                    axios.patch('/sepet/'+id, {
                        quantity: this.value,
                    })
                    .then(function (response) {
                        console.log(response);
                        window.location.href='{{route('sepet')}}';
                    })
                    .catch(function (error) {
                        console.log(error);
                        window.location.href='{{route('sepet')}}';
                    });
                })
            })
        })();
    </script>
@endsection
