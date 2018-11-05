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
                <form action="https://laravelecommerceexample.ca/search" method="GET" class="search-form">
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
                                <a href="{{route("ürün.detay",$urun->model->url)}}"><img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-30.jpg" alt="item" class="cart-table-img"></a>
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
                                <div>{{$urun->subtotal()}}</div>
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
                            {{Cart::subtotal()}}<br>
                            {{Cart::tax()}} <br>
                            <span class="cart-totals-total">{{Cart::total()}}</span>
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
            @if(Cart::instance("kaydet")->count()>0)
                <h2>{{Cart::instance("kaydet")->count()}} ürün kayıtlı</h2>
                <div class="cart-table">
                    @foreach(Cart::instance("kaydet")->content() as $urun)
                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{route("ürün.detay",$urun->model->url)}}"><img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-30.jpg" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                    <div class="cart-table-item"><a href="{{route("ürün.detay",$urun->model->url)}}">{{$urun->name}}</a></div>
                                    <div class="cart-table-description">{{$urun->model->detay}}</div>
                                </div>
                            </div>
                            <div class="cart-table-row-right">
                                <div class="cart-table-actions">
                                    <form action="{{route("kaydet.urunsil",$urun->rowId)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="cart-options">Sil</button>
                                    </form>
                                    <form action="{{route("kaydet.sepete_tasi",$urun->rowId)}}" method="POST">
                                        {{csrf_field()}}
                                        <button type="submit" class="cart-options">Sepete Taşı</button>
                                    </form>
                                </div>
                                <div>
                                    <select class="quantity_saved">
                                        <option selected="">1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div>{{$urun->price}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
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
