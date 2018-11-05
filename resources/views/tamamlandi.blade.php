@extends("index")
@section("title"," Ödeme Tamamlandı")
@section("içerik")
    <div class="thank-you-section">
        <h1>Siparişiniz için<br> Teşekkür ediyoruz!</h1>
        <p>Onay emaili adresinize gönderildi</p>
        <div class="spacer"></div>
        <div><a href="{{route("anasayfa")}}" class="button">Anasayfa</a></div>
    </div>
    <br><br>
@endsection