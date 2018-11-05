@extends("index")
@section("title"," Anasayfa")
@section("arkaplan")
    <div class="hero container">
        <div class="hero-copy">
            <h1>Laravel E-ticaret</h1>
            <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration.</p>
            <div class="hero-buttons">
                <a href="https://github.com/senocak" class="button button-white">GitHub</a>
            </div>
        </div>
        <div class="hero-image"><img src="{{url('/')}}/img/macbook-pro-laravel.png" alt="hero image"></div>
    </div>
@endsection
@section("içerik")
    <div class="featured-section">
        <div class="container">
            <div class="products-section container">
                <div class="sidebar">
                    <h3>Kategoriler</h3>
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
                        <h1 class="stylish-heading">Ürünler</h1>
                        <div>
                            <strong>Fiyat: </strong>
                            <a href="https://laravelecommerceexample.ca/shop?sort=low_high">Azalan</a> |
                            <a href="https://laravelecommerceexample.ca/shop?sort=high_low">Artan</a>
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
@endsection