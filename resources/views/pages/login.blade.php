@extends('layouts.form')

@section('section')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center text-dark mt-5">Pharma Cure</h2>
      <!--<div class="text-center mb-5 text-dark">Pharma Cure</div>-->
      <div class="card my-5">

        <form class="card-body cardbody-color p-lg-5">

          <div class="text-center">
            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
              width="200px" alt="profile">
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
              placeholder="User Name">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" placeholder="password">
          </div>
          <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
          <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
            Registered? <a href="#" class="text-dark fw-bold"> Create an
              Account</a>
          </div>
        </form>
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
