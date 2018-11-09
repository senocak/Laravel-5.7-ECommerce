@extends("admin.index")
@section("title"," - ".$kategori->isim." Kategorisi")
@section("admin_icerik")
    <a href="{{route("kategori.urun_ekle",$kategori->id)}}"><button class="full-width btn btn-secondary">{{$kategori->isim}} Kategorisine Ürün Ekle <i class="fa fa-plus"></i></button></a>
    <div>
        <style> 
            .container {display: block;position: relative;padding-left: 35px;margin-bottom: 12px;cursor: pointer;font-size: 22px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
            .container input {position: absolute;opacity: 0;cursor: pointer;height: 0;width: 0;}
            .checkmark {position: absolute;top: 0;left: 0;height: 25px;width: 25px;background-color: #eee;}
            .container:hover input ~ .checkmark {background-color: #ccc;}
            .container input:checked ~ .checkmark {background-color: #2196F3;}
            .checkmark:after {content: "";position: absolute;display: none;}
            .container input:checked ~ .checkmark:after {display: block;}
            .container .checkmark:after {left: 9px;top: 5px;width: 5px;height: 10px;border: solid white;border-width: 0 3px 3px 0;-webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);transform: rotate(45deg);}
        </style>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">İsim</th>
                    <th scope="col">Fiyat</th>
                    <th scope="col">Detay</th>
                    <th scope="col">Öne Çıkan</th>
                    <th scope="col">Oluşturma Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach ($urunler as $urun)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$urun->isim}}</td>
                        <td>{{$urun->fiyat}}</td>
                        <td>{{$urun->detay}}</td>
                        <td>
                            <label class="container">
                                <input type="checkbox" disabled readonly @if($urun->onecikan) checked="checked" @endif>
                                <span class="checkmark"></span>
                            </label> 
                        </td>
                        <td>{{$urun->created_at}}</td>
                        <td>
                            <a href="{{route("kategori.urun_duzenle",[$kategori->id,$urun->id])}}"><i class="fa fa-edit"></i></a>
                            <a href="{{route("kategori.urun_sil",[$kategori->id,$urun->id])}}"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    @php($i++)
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="spacer"></div> 
@endsection