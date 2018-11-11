@extends("admin.index")
@section("title"," - Tüm Kategoriler")
@section("admin_icerik")  
    @if (Session::has('başarılı'))
        <div class="alert alert-success">{{Session::get('başarılı')}}</div>
    @endif
    @if (Session::has('hata'))
        <div class="alert alert-warning">{{Session::get('hata')}}</div>
    @endif
    <form class="md-form" method="POST" action="{{ route('admin.kupon_ekle') }}">
        {{ csrf_field() }}
        <div class="form-group"> 
                <div class="row" style="width: 100%;">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Kupon İsmi" name="kod" required >
                    </div>
                    <div class="col-md-2">
                        <select required class="custom-select custom-select-lg mb-3" onchange="showHide()" name="islem" id="islem">
                            <option value="sabit" selected>Adet</option>
                            <option value="yuzde">Yüzde</option>
                        </select> 
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" placeholder="Kupon Adet" name="sabit" id="sabit" min="1">
                        <input type="number" class="form-control" placeholder="Kupon Yüzdesi" name="yuzde" id="yuzde" min="1" max="100" hidden>
                    </div>
                </div> 
            <button type="submit" class="form-control button-primary">Ekle</button> 
        </div>
    </form>
    <script>
        function showHide(){
            var islem=document.getElementById("islem").value;
            if(islem=="sabit"){
                document.getElementById("sabit").hidden=false;
                document.getElementById("yuzde").hidden=true;
            }else{
                document.getElementById("sabit").hidden=true;
                document.getElementById("yuzde").hidden=false;
            }
        }
    </script>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kod</th>
                    <th scope="col">#</th>
                    <th scope="col">Durum</th> 
                    <th scope="col">Son Kullanma Tarihi</th>
                    <th scope="col">Oluşturma Tarihi</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @forelse($kupons as $kupon)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$kupon->kod}}</td>
                        @if($kupon->tip=="sabit")
                            <td>{{$kupon->kullanılan}}/{{$kupon->adet}} Adet</td>
                        @else
                            <td>%{{$kupon->yuzde}}</td>
                        @endif
                        <td>
                            <label class="container">
                                <input type="checkbox" disabled readonly @if($kupon->aktif) checked="checked" @endif>
                                <span class="checkmark"></span>
                            </label> 
                        </td>
                        <td>{{date("d.m.Y H:i",strtotime($kupon->son_kullanım_tarihi))}}</td>
                        <td>{{date("d.m.Y H:i",strtotime($kupon->created_at))}}</td>
                        <td>
                            <a href="{{route("admin.kupon_duzenle",$kupon->id)}}"><i class="fa fa-edit"></i></a>
                            <a href="{{route("admin.kupon_sil",$kupon->id)}}"><i class="fa fa-remove"></i></a>
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