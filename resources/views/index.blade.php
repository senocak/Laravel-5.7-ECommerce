<!doctype html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel @yield("title")</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{url("/")}}/css/app.css">
        <link rel="stylesheet" href="{{url("/")}}/css/responsive.css">
        @yield("css")
    </head>
    <body>
        <header class="with-background">
            <div class="top-nav container">
                <div class="top-nav-left">
                    <div class="logo"><a href="/">E-Ticaret</a></div>
                    <ul>
                        <li><a href="{{url('/')}}/urun">Ürünler</a></li>
                        <li><a href="{{url('/')}}/hakkimda">Hakkımda</a></li>
                        <li><a href="{{url('/')}}">Blog</a></li>
                    </ul>
                </div>
                <div class="top-nav-right">
                    <ul>
                        <li><a href="{{url('/')}}/login">Giriş Yap</a></li>
                        <li>
                            <a href="{{url('/')}}/sepet">Sepet
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

        <div class="blog-section">
            <div class="container"><h1 class="text-center">From Our Blog</h1></div>
            <div class="blog-posts">
                <div class="blog-post">
                    <a href="https://blog.laravelecommerceexample.ca/testing/"><img src="https://blog.laravelecommerceexample.ca/wp-content/uploads/2018/07/blog4-768x432.jpg" alt="Blog Image"></a>
                    <a href="https://blog.laravelecommerceexample.ca/testing/"><h2 class="blog-title">Testing</h2></a>
                    <div class="blog-description">Testing content here&nbsp;&nbsp;Welcome to WordPress. This is your first post. Edit or delete it, then start writing!&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut nisl ultricies ex mollis congue. Mauris tempor justo nec lacus dignissim facilisis. Quisque in tortor justo. Pellentesque iaculis tempus venenatis. Etiam sit amet elit volutpat, egestas ipsum vel, aliquet …</div>
                </div>
                <div class="blog-post">
                    <a href="https://blog.laravelecommerceexample.ca/testing/"><img src="https://blog.laravelecommerceexample.ca/wp-content/uploads/2018/07/blog4-768x432.jpg" alt="Blog Image"></a>
                    <a href="https://blog.laravelecommerceexample.ca/testing/"><h2 class="blog-title">Testing</h2></a>
                    <div class="blog-description">Testing content here&nbsp;&nbsp;Welcome to WordPress. This is your first post. Edit or delete it, then start writing!&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut nisl ultricies ex mollis congue. Mauris tempor justo nec lacus dignissim facilisis. Quisque in tortor justo. Pellentesque iaculis tempus venenatis. Etiam sit amet elit volutpat, egestas ipsum vel, aliquet …</div>
                </div>
                <div class="blog-post">
                    <a href="https://blog.laravelecommerceexample.ca/testing/"><img src="https://blog.laravelecommerceexample.ca/wp-content/uploads/2018/07/blog4-768x432.jpg" alt="Blog Image"></a>
                    <a href="https://blog.laravelecommerceexample.ca/testing/"><h2 class="blog-title">Testing</h2></a>
                    <div class="blog-description">Testing content here&nbsp;&nbsp;Welcome to WordPress. This is your first post. Edit or delete it, then start writing!&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut nisl ultricies ex mollis congue. Mauris tempor justo nec lacus dignissim facilisis. Quisque in tortor justo. Pellentesque iaculis tempus venenatis. Etiam sit amet elit volutpat, egestas ipsum vel, aliquet …</div>
                </div>
            </div>
        </div>
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