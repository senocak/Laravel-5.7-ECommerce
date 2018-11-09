@extends("admin.index")
@section("title"," Kategori'ye ürün Ekle")
@section("admin_icerik") 
    <script src="{{url("/")}}/editor/ckeditor/ckeditor.js"></script> 
    <br><br>
    <form method="POST" action="{{route("kategori.urun_duzenle_post",[$kategoriId,$urun->id])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Ürün Başlığı" name="isim" required value="{{$urun->isim}}">
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="Ürün için özet" name="detay" style="resize:none;" required>{{$urun->detay}}</textarea>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Ürün Fiyatı" name="fiyat" min="1" required value="{{$urun->fiyat}}">
        </div>
        <div class="form-group">
            <textarea class="ckeditor" name="aciklama" id="editor1">{{$urun->aciklama}}</textarea>
        </div>
        @if($urun->onecikan==true)
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="onecikan" name="onecikan" checked="checked">
                <label class="custom-control-label" for="onecikan">Öne çıkan olarak ayarla</label>
            </div>
        @else
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="onecikan" name="onecikan">
                <label class="custom-control-label" for="onecikan">Öne çıkan olarak ayarla</label>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Ekle</button>
    </form> 
    <div class="spacer"></div> 
	<script language="javascript" type="text/javascript">
		CKEDITOR.replace('editor1',{
			filebrowserWindowWidth: '900',
			filebrowserWindowHeight: '400',
			filebrowserBrowseUrl: '{{url("/")}}/editor/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: '{{url("/")}}/editor/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl: '{{url("/")}}/editor/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl: '{{url("/")}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: '{{url("/")}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl: '{{url("/")}}/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		}); 
	</script>
@endsection