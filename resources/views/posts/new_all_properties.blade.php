@extends('layouts.new_app')


@section('content')


    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h1 class="mb-2">.</h1>
              <p class="text-white">.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('inc.search_form')

    <div class="site-section bg-black">
      <div class="container">

        <div class="row">


          @foreach($posts as $post)

          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="/ogloszenia/{{ $post->id }}" class="d-block"><img src="storage/cover_images/{{ $post->cover_image }}" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>{{ $post->area_sqm }}m<sup>2</sup></span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>{{ $post->number_of_rooms }}</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>{{ $post->location }}, ul. {{ $post->street }}</span></div>
                </div>
                <h3 class="mb-3"><a href="#">{{ $post->price }} zł</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>{{ $post->market_type }}</span></span>
              </div>
            </div>
          </div>

          @endforeach

          {{$posts->links()}}

{{--
          <div class="col-md-4 mb-5">
            <div class="media-38289">
            <a href="property-single.html" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.html" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$980,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.html" class="d-block"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$570,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
            <a href="property-single.html" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.html" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$980,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.html" class="d-block"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$570,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
            <a href="property-single.html" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.html" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$980,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div>


          <div class="col-12 mt-5 text-center pagination-39291">
            <span class="active">1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
          </div> --}}


        </div>
      </div>
    </div>

@endsection
