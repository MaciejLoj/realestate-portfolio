<!doctype html>
<html lang="pl">

  <head>
    <title>Realtors &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/template/bootstrap.min.css">
    <link rel="stylesheet" href="css/template/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/template/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/template/owl.carousel.min.css">
    <link rel="stylesheet" href="css/template/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/template/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/template/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
              <span class="icon-close2 js-menu-toggle"></span>
            </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                  {{-- logo --}}
                <a href="index.html"></a>
              </div>
            </div>

            <div class="col-9  text-right">


             <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>


             @if(!Auth::check())
                  <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                       <li class="active"><a href="/" class="nav-link">Strona główna</a></li>
                       <li><a href="/ogloszenia" class="nav-link">Ogłoszenia</a></li>
                       <li><a href="/kontakt" class="nav-link">Kontakt</a></li>
                       <li><a href="{{ route('login') }}" class="nav-link">Logowanie</a></li>
                       <li><a href="{{ route('register') }}" class="nav-link">Rejestracja</a></li>
                    </ul>
                  </nav>

              @elseif(Auth::user()->roles()->where('name','Admin'))
                  <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                       <li class="active"><a href="/" class="nav-link">Strona główna</a></li>
                       <li><a href="/ogloszenia" class="nav-link">Ogłoszenia</a></li>
                       <li><a href="/kontakt" class="nav-link">Kontakt</a></li>
                       <li><a href="/uzytkownicy" class="nav-link">Użytkownicy</a></li>
                    </ul>
                  </nav>
              @else

              @endif
            </div>


          </div>
        </div>

        </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              {{-- <span class="h4 text-primary mb-4 d-block">$1,570,000</span> --}}
              <h1 class="mb-2">.</h1>
              <p class="text-center mb-5"><span class="small address d-flex align-items-center justify-content-center"> <span class="icon-room mr-3 text-primary"></span> <span>.</span></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>



    <form action="">
      <div class="realestate-filter">
        <div class="container">
          <div class="realestate-filter-wrap nav">
            <a href="#for-rent" class="active" data-toggle="tab" id="rent-tab" aria-controls="rent" aria-selected="true">Wynajem</a>
            <a href="#for-sale" class="" data-toggle="tab" id="sale-tab" aria-controls="sale" aria-selected="false">Sprzedaż</a>
          </div>
        </div>
      </div>

      <div class="realestate-tabpane pb-5">
        <div class="container tab-content">
           <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">

             <div class="row">
               <div class="col-md-4 form-group">
                 <select name="" id="" class="form-control w-100">
                   {{-- <option value="" disabled selected>Dzielnica</option> --}}
                   <option value="">Cała Warszawa</option>
                   <option value="">Bemowo</option>
                   <option value="">Białołęka</option>
                   <option value="">Bielany</option>
                   <option value="">Mokotów</option>
                   <option value="">Ochota</option>
                   <option value="">Praga Południe</option>
                   <option value="">Praga Północ</option>
                   <option value="">Śródmieście</option>
                   <option value="">Targówek</option>
                   <option value="">Ursynów</option>
                   <option value="">Żoliborz</option>
                 </select>
               </div>
               <div class="col-md-4 form-group">
                   <select name="" id="" class="form-control w-100">
                     <option value="" disabled selected>Powierzchnia</option>
                     <option value="">0-20m2</option>
                     <option value="">20-30m2</option>
                     <option value="">30-40m2</option>
                     <option value="">40-60m2</option>
                     <option value="">60m2+</option>
                   </select>
               </div>
               <div class="col-md-4 form-group">
                 <select name="" id="" class="form-control w-100">
                     {{-- <option value="" disabled selected>Rynek</option> --}}
                     <option value="">Rynek wtórny</option>
                     <option value="">Rynek pierwotny</option>
                 </select>
               </div>
             </div>

             <div class="row">
               <div class="col-md-4 form-group">
                 <select name="" id="" class="form-control w-100">
                   <option value="" disabled selected>Ilość pokoi</option>
                   <option value="">0</option>
                   <option value="">1</option>
                   <option value="">2</option>
                   <option value="">3</option>
                   <option value="">3+</option>
                 </select>
               </div>
               <div class="col-md-4 form-group">
                 <select name="" id="" class="form-control w-100">
                   <option value="">Mieszkanie</option>
                   <option value="">Dom</option>
                 </select>
               </div>
               <div class="col-md-4 form-group">
                 <div class="row">
                   <div class="col-md-6 form-group">
                     <select name="" id="" class="form-control w-100">
                       <option value="">Cena minimalna</option>
                       <option value="">0</option>
                       <option value="">100</option>
                       <option value="">200</option>
                       <option value="">300</option>
                       <option value="">400</option>
                     </select>
                   </div>
                   <div class="col-md-6">
                     <select name="" id="" class="form-control w-100">
                       <option value="">Cena maksymalna</option>
                       <option value="">25,000</option>
                       <option value="">50,000</option>
                       <option value="">75,000</option>
                       <option value="">100,000</option>
                       <option value="">100,000</option>
                     </select>
                   </div>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <input type="submit" class="btn btn-black py-3 btn-block" value="Submit">
               </div>
             </div>

           </div>
           <div class="tab-pane" id="for-sale" role="tabpanel" aria-labelledby="sale-tab">
             <div class="row">
               <div class="col-md-4 form-group">
                 <select name="" id="" class="form-control w-100">
                   <option value="">All Types</option>
                   <option value="">Townhouses</option>
                   <option value="">Duplexes</option>
                   <option value="">Quadplexes</option>
                   <option value="">Condominiums</option>
                 </select>
               </div>
               <div class="col-md-4 form-group">
                 <input type="text" class="form-control" placeholder="Title">
               </div>
               <div class="col-md-4 form-group">
                 <input type="text" class="form-control" placeholder="Address">
               </div>
             </div>

             <div class="row">
               <div class="col-md-4 form-group">
                 <select name="" id="" class="form-control w-100">
                   <option value="">Any Bedrooms</option>
                   <option value="">0</option>
                   <option value="">1</option>
                   <option value="">2</option>
                   <option value="">3+</option>
                 </select>
               </div>
               <div class="col-md-4 form-group">
                 <select name="" id="" class="form-control w-100">
                   <option value="">Any Bathrooms</option>
                   <option value="">0</option>
                   <option value="">1</option>
                   <option value="">2</option>
                   <option value="">3+</option>
                 </select>
               </div>
               <div class="col-md-4 form-group">
                 <div class="row">
                   <div class="col-md-6 form-group">
                     <select name="" id="" class="form-control w-100">
                       <option value="">Min Price</option>
                       <option value="">$100</option>
                       <option value="">$200</option>
                       <option value="">$300</option>
                       <option value="">$400</option>
                     </select>
                   </div>
                   <div class="col-md-6">
                     <select name="" id="" class="form-control w-100">
                       <option value="">Max Price</option>
                       <option value="">$25,000</option>
                       <option value="">$50,000</option>
                       <option value="">$75,000</option>
                       <option value="">$100,000</option>
                       <option value="">$100,000,000</option>
                     </select>
                   </div>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <input type="submit" class="btn btn-black py-3 btn-block" value="Submit">
               </div>
             </div>

           </div>
        </div>
      </div>
    </form>

    <div class="site-section bg-black block-14">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="heading-29201 text-center text-white">Latest Properties</h3>

            <p class="mb-5 text-white">Perspiciatis quidem, harum provident, repellat sint officia quos fugit tempora id deleniti.</p>
          </div>
        </div>


        <div class="owl-carousel nonloop-block-14">
          <div class="media-38289">
            <a href="property-single.html" class="d-block"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>

          <div class="media-38289">
            <a href="property-single.html" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>

          <div class="media-38289">
              <a href="property-single.html" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$980,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>


          <div class="media-38289">
            <a href="property-single.html" class="d-block"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>

          <div class="media-38289">
            <a href="property-single.html" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>

          <div class="media-38289">
              <a href="property-single.html" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$980,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>

        </div>


      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-6 text-center">
            <h3 class="heading-29201 text-center">Our Agents</h3>

            <p class="mb-5">Perspiciatis quidem, harum provident, repellat sint officia quos fugit tempora id deleniti.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="person-29381">
              <div class="media-39912">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid">
              </div>
              <h3><a href="#">Josh Long</a></h3>
              <span class="meta d-block mb-4">4 Properties</span>
              <div class="social-32913">
                <a href="#"><span class="icon-facebook"></span></a>
                <a href="#"><span class="icon-twitter"></span></a>
                <a href="#"><span class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="person-29381">
              <div class="media-39912">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid">
              </div>
              <h3><a href="#">Melinda David</a></h3>
              <span class="meta d-block mb-4">10 Properties</span>
              <div class="social-32913">
                <a href="#"><span class="icon-facebook"></span></a>
                <a href="#"><span class="icon-twitter"></span></a>
                <a href="#"><span class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="person-29381">
              <div class="media-39912">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid">
              </div>
              <h3><a href="#">Jessica Soft</a></h3>
              <span class="meta d-block mb-4">18 Properties</span>
              <div class="social-32913">
                <a href="#"><span class="icon-facebook"></span></a>
                <a href="#"><span class="icon-twitter"></span></a>
                <a href="#"><span class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-primary">
      <div class="container block-13">
        <div class="nonloop-block-13 owl-carousel">
          <div class="testimonial-38920 d-flex align-items-start">
            <div class="pic mr-4"><img src="images/person_1.jpg" alt=""></div>
            <div>
              <span class="meta">Business Man</span>
              <h3 class="mb-4">Josh Long</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
              <div class="mt-4">
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
              </div>
            </div>
          </div>

          <div class="testimonial-38920 d-flex align-items-start">
            <div class="pic mr-4"><img src="images/person_2.jpg" alt=""></div>
            <div>
              <span class="meta">Business Woman</span>
              <h3 class="mb-4">Jean Doe</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
              <div class="mt-4">
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
              </div>
            </div>
          </div>

          <div class="testimonial-38920 d-flex align-items-start">
            <div class="pic mr-4"><img src="images/person_3.jpg" alt=""></div>
            <div>
              <span class="meta">Business Woman</span>
              <h3 class="mb-4">Jean Doe</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
              <div class="mt-4">
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('inc.footer')

    </div>

    <script src="js/template/jquery-3.3.1.min.js"></script>
    <script src="js/template/jquery-migrate-3.0.0.js"></script>
    <script src="js/template/popper.min.js"></script>
    <script src="js/template/bootstrap.min.js"></script>
    <script src="js/template/owl.carousel.min.js"></script>
    <script src="js/template/jquery.sticky.js"></script>
    <script src="js/template/jquery.waypoints.min.js"></script>
    <script src="js/template/jquery.animateNumber.min.js"></script>
    <script src="js/template/jquery.fancybox.min.js"></script>
    <script src="js/template/jquery.stellar.min.js"></script>
    <script src="js/template/jquery.easing.1.3.js"></script>
    <script src="js/template/bootstrap-datepicker.min.js"></script>
    <script src="js/template/aos.js"></script>
    <script src="js/template/main.js"></script>

  </body>

</html>