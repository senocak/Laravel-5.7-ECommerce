@extends("admin.index")
@section("title"," Kategori'ye Ürün Ekle")
@section("admin_icerik") 
    <script src="{{url("/")}}/editor/ckeditor/ckeditor.js"></script> 
    <br><br>
    <form method="POST" action="{{route("kategori.urun_ekle_post",$kategori->id)}}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" disabled readonly value="{{$kategori->isim}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Ürün Başlığı" name="isim" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="Ürün için özet" name="detay" style="resize:none;" required></textarea>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Ürün Fiyatı" name="fiyat" min="1" required>
        </div>
        <div class="form-group">
            <textarea class="ckeditor" name="aciklama" id="editor1"></textarea>
        </div> 
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="onecikan" name="onecikan">
            <label class="custom-control-label" for="onecikan">Öne çıkan olarak ayarla</label>
        </div>
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