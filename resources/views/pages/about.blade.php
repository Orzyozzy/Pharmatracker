@extends('layouts.app')

@section('section')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">About Us</span>
            <h1 class="text-capitalize mb-5 text-lg">About Us</h1>
  
            <!-- <ul class="list-inline breadcumb-nav">
              <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item"><a href="#" class="text-white-50">About Us</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="section about-page">
      <div class="container">
          <div class="row">
              <div class="col-lg-4">
                  <h2 class="title-color">Personal care for your healthy living</h2>
              </div>
              <div class="col-lg-8">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, quod laborum alias. Vitae dolorum, officia sit! Saepe ullam facere at, consequatur incidunt, quae esse, quis ut reprehenderit dignissimos, libero delectus.</p>
                  <img src="images/about/sign.png" alt="" class="img-fluid">
              </div>
          </div>
      </div>
  </section>
  
  <section class="fetaure-page ">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-6">
                  <div class="about-block-item mb-5 mb-lg-0">
                      <img src="images/about/about-1.jpg" alt="" class="img-fluid w-100">
                      <h4 class="mt-3">Healthcare for Kids</h4>
                      <p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="about-block-item mb-5 mb-lg-0">
                      <img src="images/about/about-2.jpg" alt="" class="img-fluid w-100">
                      <h4 class="mt-3">Medical Counseling</h4>
                      <p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="about-block-item mb-5 mb-lg-0">
                      <img src="images/about/about-3.jpg" alt="" class="img-fluid w-100">
                      <h4 class="mt-3">Modern Equipments</h4>
                      <p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="about-block-item">
                      <img src="images/about/about-4.jpg" alt="" class="img-fluid w-100">
                      <h4 class="mt-3">Qualified Doctors</h4>
                      <p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection

@section('script')

    <<script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

@endsection
