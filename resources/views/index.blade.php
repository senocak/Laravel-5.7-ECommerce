<!doctype html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel @yield("title")</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url("/")}}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url("/")}}/css/bootstrap.min.css" id="bootstrap-css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{url("/")}}/css/app.css">
        <link rel="stylesheet" href="{{url("/")}}/css/responsive.css">
        @yield("css")
    </head>
    <body>
        <header class="with-background">
            <div class="top-nav container">
                <div class="top-nav-left">
                    <div class="logo"><a href="{{route("anasayfa")}}">E-Ticaret</a></div>
                    <ul>
                        <li><a href="{{route("ürün.index")}}">Ürünler</a></li>
                        <li><a href="{{route("blog.index")}}">Blog</a></li>
                    </ul>
                </div>
                <div class="top-nav-right">
                    <ul>
                        @if (Auth::check())
                            <li id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a>{{Auth::user()->name}}</a></li>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color:gray">
                                <a class="dropdown-item" href="{{route("profil")}}">Profil</a>
                                <a class="dropdown-item" href="{{route("siparis")}}">Siparişlerim</a> 
                                <a class="dropdown-item" href="{{route("cikis")}}">Çıkış Yap</a> 
                            </div> 
                        @else
                            <li><a href="{{route("login")}}">Giriş Yap</a></li>
                        @endif
                        <li>
                            <a href="{{route("sepet")}}">Sepet
                                @if(Cart::instance('default')->count()>0)
                                    <span class="cart-count"><span>{{Cart::instance('default')->count()}}</span></span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield("arkaplan")
        </header>
        @yield("içerik")
        <footer>
            <div class="footer-content container">
                <div class="made-with">Made by <i class="fa fa-heart heart"></i> Anıl Şenocak</div>
                <div style="float: right">
                    <a href="http://github.com/senocak"><i class="fa fa-github"></i></a>
                    <a href="http://linkedin.com/in/anilsenocak"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </footer>
        <script src="{{url("/")}}/js/app.js"></script>
        <script>
            (function(){
                const currentImage = document.querySelector('#currentImage');
                const images = document.querySelectorAll('.product-section-thumbnail');
                images.forEach((element) => element.addEventListener('click', thumbnailClick));
                function thumbnailClick(e) {
                    currentImage.classList.remove('active');
                    currentImage.addEventListener('transitionend', () => {
                        currentImage.src = this.querySelector('img').src;
                        currentImage.classList.add('active');
                    })
                    images.forEach((element) => element.classList.remove('selected'));
                    this.classList.add('selected');
                }
            })();
        </script>
        @yield("js")
    </body>
</html>