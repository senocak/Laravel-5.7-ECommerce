@extends("admin.index")
@section("title"," Kategori'ye Ürün Ekle")
@section('css')
    <script src="{{url("/")}}/editor/ckeditor/ckeditor.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

    <link href="{{url("/")}}/css/select2.min.css" rel="stylesheet" />
    <script src="{{url("/")}}/js/select2.min.js"></script>
@endsection
@section("admin_icerik") 
    <br>
    <form method="POST" action="{{route("kategori.urun_ekle_post",$kategoriOnly->id)}}">
        {{ csrf_field() }}
        <div class="form-group">
            <select class="js-example-basic-multiple form-control" name="kategoriler[]" multiple="multiple">
                @forelse ($kategoriler as $kategori)
                    <option value="{{$kategori->id}}" @if($kategori->isim==$kategoriOnly->isim) selected @endif>{{$kategori->isim}}</option>
                @empty
                    <option>Kategori Yok</option>
                @endforelse
            </select>
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
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
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