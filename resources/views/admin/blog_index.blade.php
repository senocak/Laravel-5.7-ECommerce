@extends("admin.index")
@section("title"," - Tüm Blog Yazıları")
@section("admin_icerik")  
    @if (Session::has('başarılı'))
        <div class="alert alert-success">{{Session::get('başarılı')}}</div>
    @endif
    @if (Session::has('hata'))
        <div class="alert alert-warning">{{Session::get('hata')}}</div>
    @endif
    <div>
        <a href="{{route("admin.blog_ekle")}}"><button type="submit" class="form-control button-primary">Ekle</button></a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Resim</th>
                    <th scope="col">Başlık</th>
                    <th scope="col">Oluşturma Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @forelse($blogs as $blog)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td><img src="{{url("/")}}/img/blog/{{$blog->resim}}" width="100px"></td>
                        <td>{{$blog->baslik}}</td>
                        <td>{{date("d.m.Y H:i",strtotime($blog->created_at))}}</td>
                        <td>
                            <a href="{{route("admin.blog_duzenle",$blog->id)}}"><i class="fa fa-edit"></i></a>
                            <a href="{{route("admin.blog_sil",$blog->id)}}"><i class="fa fa-remove"></i></a>
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