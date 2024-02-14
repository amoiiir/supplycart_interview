<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique | Your One Stop Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="home/vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="home/vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="home/vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="home/vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="home/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="home/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">

    <style>
        .center {
            margin: auto;
            width: 100%;
            max-width: 800px;
            padding: 30px;
            text-align: center;
        }

        table,th,td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .th_deg {
            font-size: 15px;
            background-color: lightblue;
            padding: 5px;
        }

        table img {
            width: 150px;
            height: auto;
        }

        .total_deg {
            font-size: 25px;
            color: red;
            padding: 40px;
            text-align: center;
        }

        .payment_deg {
            text-align: center;
            padding: 40px;
        }

    </style>
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      @include('home.header')
      <!--  Modal -->

      <!-- HERO SECTION-->
      <div class="container">
        <!-- CATEGORIES SECTION-->
        {{-- @include('home.categories') --}}

        {{-- catch the success message --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif


        <div >
            <table class="center">
                <tr>
                    <th class="th_deg">Product Name</th>
                    <th class="th_deg">Product Image</th>
                    <th class="th_deg">Product Price</th>
                    {{-- <th class="th_deg">Product Quantity</th> --}}
                    <th class="th_deg">Action</th>
                </tr>

                {{-- logic to calculate the total price --}}

                <?php $totalprice = 0; ?>

                @foreach ($cart as $cart)

                <tr>
                    <td>{{ $cart->title }}</td>
                    <td> <img src="/product/{{ $cart->image }}" alt=""> </td>
                    <td>{{ $cart->price }}</td>
                    {{-- <td>{{ $cart->quantity }}</td> --}}
                    <td> <a href="{{ url('/remove_cart', $cart->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to remove this product?')" >Remove Item</a> </td>
                </tr>

                <?php $totalprice = $totalprice + $cart->price; ?>

                @endforeach

            </table>

            <div>
                <h1 class="total_deg">Total Price: RM {{ $totalprice }}</h1>
            </div>

        </div>

        <div class="payment_deg">
            <h1 style="font-size: 25px; padding-bottom: 20px;">Proceed to Payment</h1>

            <form action="{{ url('cash_order') }}" method="POST">

            @csrf

            <input class="" type="number" name="inputval" placeholder="Input valid value">

            {{-- <input type="submit" class="btn btn-danger" name="submit" value="Confirm Payment"> --}}

            <a class="btn btn-danger">Confirm Payment</a>

        </form>

        </div>


        <!-- TRENDING PRODUCTS-->
        {{-- @include('home.products') --}}
        <!-- SERVICES-->
        {{-- <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center gy-3">
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Festivaloffers</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> --}}
        <!-- NEWSLETTER-->
        {{-- <section class="py-5">
          <div class="container p-0">
            <div class="row gy-3">
              <div class="col-lg-6">
                <h5 class="text-uppercase">Let's be friends!</h5>
                <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group">
                    <input class="form-control form-control-lg" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                    <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section> --}}
      </div>
      {{-- <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Customer services</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
                <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
                <li><a class="footer-link" href="#!">Online Stores</a></li>
                <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Company</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">What We Do</a></li>
                <li><a class="footer-link" href="#!">Available Services</a></li>
                <li><a class="footer-link" href="#!">Latest Posts</a></li>
                <li><a class="footer-link" href="#!">FAQs</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Twitter</a></li>
                <li><a class="footer-link" href="#!">Instagram</a></li>
                <li><a class="footer-link" href="#!">Tumblr</a></li>
                <li><a class="footer-link" href="#!">Pinterest</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-md-6 text-center text-md-start">
                <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
              </div>
              <div class="col-md-6 text-center text-md-end">
                <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer> --}}
      <!-- JavaScript files-->
      <script src="home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="home/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="home/vendor/nouislider/nouislider.min.js"></script>
      <script src="home/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="home/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
      <script src="home/js/front.js"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite -
        //   see more here
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>

