@extends("admin.index")
@section("title"," - Tüm Kategoriler")
@section("admin_icerik")  
    @if (Session::has('başarılı'))
        <div class="alert alert-success">{{Session::get('başarılı')}}</div>
    @endif
    @if (Session::has('hata'))
        <div class="alert alert-warning">{{Session::get('hata')}}</div>
    @endif
    <form class="md-form" method="POST" action="{{ route('kategori.ekle') }}">
        {{ csrf_field() }}
        <div class="form-group"> 
            <input type="text" class="form-control" placeholder="Kategori İsmi" name="isim" required>
            <button type="submit" class="form-control button-primary">Ekle</button> 
        </div>
    </form>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">İsim</th> 
                    <th scope="col">Oluşturma Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @forelse($kategoriler as $kategori)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>
                            <form action="{{route("kategori.duzenle",$kategori->id)}}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-4"><input type="text" class="form-control" value="{{$kategori->isim}}" name="isim" required></div>
                                    <div class="col-xs-4"><button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Güncelle</button> </div>
                                    <div class="col-xs-4"><a href="{{route("kategori.sil",$kategori->id)}}" class="btn btn-danger"><i class="fa fa-remove"></i> Sil</a></div>
                                </div>
                            </form>
                        </td> 
                        <td>{{date("d.m.Y H:i",strtotime($kategori->created_at))}}</td>
                        <td>
                            <a href="{{route("kategori.urun",$kategori->id)}}"><button class="btn btn-primary"><i class="fa fa-plus"></i> Ürünler</button></a>
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