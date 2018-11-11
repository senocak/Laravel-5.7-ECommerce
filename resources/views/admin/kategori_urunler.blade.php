@extends("admin.index")
@section("title"," - ".$kategori->isim." Kategorisi")
@section("admin_icerik")
    @if (Session::has('başarılı'))
        <div class="alert alert-success">{{Session::get('başarılı')}}</div>
    @endif
    @if (Session::has('hata'))
        <div class="alert alert-warning">{{Session::get('hata')}}</div>
    @endif
    <a href="{{route("kategori.urun_ekle",$kategori->id)}}"><button class="full-width btn btn-secondary">{{$kategori->isim}} Kategorisine Ürün Ekle <i class="fa fa-plus"></i></button></a>
    <div>
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
                @forelse($urunler as $urun)
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
                            <a href="{{route("kategori.urun_resimler",[$kategori->id,$urun->id])}}"><i class="fa fa-image"></i></a>
                            <a href="{{route("kategori.urun_duzenle",[$kategori->id,$urun->id])}}"><i class="fa fa-edit"></i></a>
                            <a href="{{route("kategori.urun_sil",[$kategori->id,$urun->id])}}"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    @php($i++)
                @empty
                    <tr><td>Değer Yok</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="spacer"></div> 
@endsection