<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ecommerce Example</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{url("/")}}/css/app.css">
        <link rel="stylesheet" href="{{url("/")}}/css/responsive.css">

    </head>
    <body>
        <header class="with-background">
            <div class="top-nav container">
                <div class="top-nav-left">
                    <div class="logo">Ecommerce</div>
                    <ul>
                        <li><a href="/shop">Shop</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="https://blog.laravelecommerceexample.ca">Blog</a></li>
                    </ul>
                </div>
                <div class="top-nav-right">
                    <ul>
                        <li><a href="https://laravelecommerceexample.ca/register">Sign Up</a></li>
                        <li><a href="https://laravelecommerceexample.ca/login">Login</a></li>
                        <li><a href="https://laravelecommerceexample.ca/cart">Cart</a></li>
                    </ul>
                </div>
            </div>
            <div class="hero container">
                <div class="hero-copy">
                    <h1>Laravel Ecommerce Demo</h1>
                    <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration.</p>
                    <div class="hero-buttons">
                        <a href="https://www.youtube.com/playlist?list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR" class="button button-white">Screencasts</a>
                        <a href="https://github.com/drehimself/laravel-ecommerce-example" class="button button-white">GitHub</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="img/macbook-pro-laravel.png" alt="hero image">
                </div>
            </div>
        </header>
        <div class="featured-section">
            <div class="container">
                <div class="products-section container">
                    <div class="sidebar">
                        <h3>By Category</h3>
                        <ul>
                            <li class=""><a href="https://laravelecommerceexample.ca/shop?category=laptops">Laptops</a></li>
                            <li class=""><a href="https://laravelecommerceexample.ca/shop?category=desktops">Desktops</a></li>
                            <li class=""><a href="https://laravelecommerceexample.ca/shop?category=mobile-phones">Mobile Phones</a></li>
                            <li class=""><a href="https://laravelecommerceexample.ca/shop?category=tablets">Tablets</a></li>
                            <li class=""><a href="https://laravelecommerceexample.ca/shop?category=tvs">TVs</a></li>
                            <li class=""><a href="https://laravelecommerceexample.ca/shop?category=digital-cameras">Digital Cameras</a></li>
                            <li class=""><a href="https://laravelecommerceexample.ca/shop?category=appliances">Appliances</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="products-header">
                            <h1 class="stylish-heading">Featured</h1>
                            <div>
                                <strong>Price: </strong>
                                <a href="https://laravelecommerceexample.ca/shop?sort=low_high">Low to High</a> |
                                <a href="https://laravelecommerceexample.ca/shop?sort=high_low">High to Low</a>
                            </div>
                        </div>
                        <div class="products text-center">
                            @foreach($urunler as $urun)
                                <div class="product">
                                    <a href="{{url("/")}}/urun/{{$urun->url}}"><img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-1.jpg" alt="product"></a>
                                    <a href="{{url("/")}}/urun/{{$urun->url}}"><div class="product-name">{{$urun->isim}}</div></a>
                                    <div class="product-price">{{$urun->fiyat}}</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="spacer"></div>
                        <ul class="pagination">
                            {{$urunler->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
                <div class="made-with">Made with <i class="fa fa-heart heart"></i> by Andre Madarang</div>
                <ul>
                    <li>Follow Me:</li>
                    <li><a href=""><i class="fa Follow Me:"></i></a></li>
                    <li><a href="http://andremadarang.com"><i class="fa fa-globe"></i></a></li>
                    <li><a href="http://youtube.com/drehimself"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="http://github.com/drehimself"><i class="fa fa-github"></i></a></li>
                    <li><a href="http://twitter.com/drehimself"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </footer>
        <script src="js/app.js"></script>
    </body>
</html>