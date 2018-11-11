@extends("admin.index")
@section("title"," - Tüm Kategoriler")
@section("admin_icerik")  
    @if (Session::has('başarılı'))
        <div class="alert alert-success">{{Session::get('başarılı')}}</div>
    @endif
    @if (Session::has('hata'))
        <div class="alert alert-warning">{{Session::get('hata')}}</div>
    @endif
    <form class="md-form" method="POST" action="{{ route('kategori.urun_resimler_post',[$kategoriId,$urunId]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group"> 
            <input type="file" class="form-control" placeholder="Kategori İsmi" name="resim" required>
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
                @forelse($resimler as $resim)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td><img src="{{url("/")}}/img/urunler/{{$resim->resim}}" width="150px"></td> 
                        <td>{{date("d.m.Y H:i",strtotime($resim->created_at))}}</td>
                        <td>
                            <a href="{{route("kategori.urun_resimler_sil",[$kategoriId,$urunId,$resim->id])}}"><button class="btn btn-primary"><i class="fa fa-remove"></i>Sil</button></a>
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