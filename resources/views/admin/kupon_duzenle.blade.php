@extends("admin.index")
@section("title"," - Tüm Kategoriler")
@section("admin_icerik")  
    @if (Session::has('başarılı'))
        <div class="alert alert-success">{{Session::get('başarılı')}}</div>
    @endif
    @if (Session::has('hata'))
        <div class="alert alert-warning">{{Session::get('hata')}}</div>
    @endif
    <br>
    <form class="md-form" method="POST" action="{{ route('admin.kupon_duzenle_post',$kupon->id) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Kupon İsmi" name="kod" required value="{{$kupon->kod}}"><br>
            <select required class="custom-select mb-3" onchange="showHide()" name="islem" id="islem">
                <option value="sabit" @if($kupon->tip=="sabit")selected @endif>Adet</option>
                <option value="yuzde" @if($kupon->tip=="yuzde")selected @endif>Yüzde</option>
            </select><br>
            <input type="number" class="form-control" placeholder="Kupon Adet" name="sabit" id="sabit" min="1" @if($kupon->tip=="yuzde")hidden @endif value="{{$kupon->adet}}">
            <input type="number" class="form-control" placeholder="Kupon Yüzdesi" name="yuzde" id="yuzde" min="1" max="100" @if($kupon->tip=="sabit")hidden @endif value="{{$kupon->yuzde}}"><br>
            <input type="date" class="form-control" placeholder="Kupon Son Kullanım Tarihi" name="son_kullanım_tarihi" id="son_kullanım_tarihi" value="{{$kupon->son_kullanım_tarihi}}" required><br>
            <label class="container "><input name="aktif" type="checkbox" @if($kupon->aktif) checked="checked" @endif>Aktiflik <span class="checkmark"></span></label> <br>
            <button type="submit" class="form-control button-primary">Güncelle</button> 
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
    <div class="spacer"></div> 
@endsection