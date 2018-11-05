@extends("index")
@section("title"," Ödeme")
@section("css")
    <script src="https://js.stripe.com/v3/"></script>
@endsection
@section("içerik")
    <div class="breadcrumbs">
        <div class="breadcrumbs-container container">
            <div>
                <a href="{{url("/")}}">Anasayfa</a> <i class="fa fa-chevron-right breadcrumb-separator"></i>
                <span>Ödeme</span>
            </div>
            <div>
                <form action="https://laravelecommerceexample.ca/search" method="GET" class="search-form">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" name="query" id="query" value="" class="search-box" placeholder="Ürün Ara" required>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="checkout-heading stylish-heading">Ödeme</h1>
        @if (Session::has('başarılı'))
            <div class="alert alert-success">
                <h3>Başarılı!</h3> {{Session::get('başarılı')}}
            </div>
        @endif
        @if (Session::has('hata'))
            <div class="alert alert-warning">
                <h3>Hata!</h3> {{Session::get('hata')}}
            </div>
        @endif

        <div class="checkout-section">
            <div>
                <form action="{{route("odemeyap")}}" method="POST" id="payment-form">
                    {{csrf_field()}}
                    <h2>Fatura Bilgileri</h2>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Adresiniz" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="isim" name="isim" placeholder="İsminiz" required="">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="adres" required="" placeholder="Adres" style="resize: none"></textarea>
                    </div>
                    <div class="half-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="sehir" name="sehir" value="" required="" placeholder="Şehir">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ulke" name="ulke" value="" required="" placeholder="Ülke">
                        </div>
                    </div>
                    <div class="half-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="posta_kodu" name="posta_kodu" value="" required="" placeholder="Posta Kodu">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="telefon" name="telefon" value="" required="" placeholder="Telefon">
                        </div>
                    </div>
                    <div class="spacer"></div>
                    <h2>Kart Bilgileri</h2>
                    <div class="form-group">
                        <label for="name_on_card">Kartın üzerindeki isim</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                    </div>
                    <style>
                        .StripeElement {
                            background-color: white;
                            padding: 16px 16px;
                            border: 1px solid #ccc;
                        }
                        .StripeElement--invalid {
                            border-color: #fa755a;
                        }
                        .StripeElement--webkit-autofill {
                            background-color: #fefde5 !important;
                        }
                        #card-errors{
                            color:#fa755a;
                        }
                    </style>
                    <div class="form-group">
                        <label for="card-element">Kredi Kartı Bilgileri</label>
                        <div id="card-element" class="StripeElement StripeElement--empty">
                        </div>
                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="spacer"></div>
                    <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>
                </form>
            </div>

            <div class="checkout-table-container">
                <h2>Siparişleriniz</h2>
                @foreach(Cart::content() as $urun)
                    <div class="checkout-table">
                        <div class="checkout-table-row">
                            <div class="checkout-table-row-left">
                                <img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-12.jpg" alt="item" class="checkout-table-img">
                                <div class="checkout-item-details">
                                    <div class="checkout-table-item">{{$urun->model->isim}}</div>
                                    <div class="checkout-table-description">{{$urun->model->detay}}</div>
                                    <div class="checkout-table-price">{{$urun->model->fiyat}}</div>
                                </div>
                            </div>
                            <div class="checkout-table-row-right">
                                <div class="checkout-table-quantity">{{$urun->qty}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        AraToplam <br>
                        Vergi (13%)<br>
                        <span class="checkout-totals-total">Toplam</span>
                    </div>
                    <div class="checkout-totals-right">
                        {{Cart::subtotal()}}<br>
                        {{Cart::tax()}}<br>
                        <span class="checkout-totals-total">{{Cart::total()}}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>
@endsection


@section("js")
    <script>
        (function(){
            // Create a Stripe client.
            var stripe = Stripe('pk_test_9V90Mp8cqRJAgaC4soyRRB98');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Roboto","Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode:true
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                document.getElementById('complete-order').disabled=true;

                var options={
                    name:document.getElementById('name_on_card').value,
                    address_line1:$('#adres').val(),
                    address_city:document.getElementById('sehir').value,
                    address_state:document.getElementById('ulke').value,
                    address_zip:document.getElementById('posta_kodu').value
                }

                stripe.createToken(card,options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        document.getElementById('complete-order').disabled=false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        })();
    </script>
@endsection