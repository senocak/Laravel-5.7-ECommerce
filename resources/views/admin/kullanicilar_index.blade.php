@extends("admin.index")
@section("title"," - Tüm Kategoriler")
@section("admin_icerik")  
    @if (Session::has('başarılı'))
        <div class="alert alert-success">{{Session::get('başarılı')}}</div>
    @endif
    @if (Session::has('hata'))
        <div class="alert alert-warning">{{Session::get('hata')}}</div>
    @endif
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Resim</th>
                    <th scope="col">İsim</th>
                    <th scope="col">Email</th>
                    <th scope="col">Kayıtlı Ürünler</th> 
                    <th scope="col">Admin Yap</th> 
                    <th scope="col">Oluşturma Tarihi</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @forelse($kullanicilar as $kullanici)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td><img src="{{url("/")}}/img/user/{{$kullanici->resim}}" width="100px"></td>
                        <td>{{$kullanici->name}}</td>
                        <td>{{$kullanici->email}}</td>
                        <td>
                            @php($a=0)
                            @foreach ($kaydets as $kaydet)
                                @if($kaydet->kullanici_id==$kullanici->id)
                                    @php($a++)
                                @endif
                            @endforeach
                            {{$a}}
                        </td>
                        <td>
                            @if($kullanici->admin!="1" and Auth::user()->id!=$kullanici->id)
                                <a href="{{route("admin.admin_yap",$kullanici->id)}}"><i class="fa fa-plus"></i></a>
                            @else
                                Admin
                            @endif
                        </td>
                        <td>{{date("d.m.Y H:i",strtotime($kullanici->created_at))}}</td>
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