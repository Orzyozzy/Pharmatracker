@extends('layouts.app')

@section('section')






<!-- Slider Start -->
<!--
-->
<div class ="container">
    <div class="row">
        <div class ="col-md-8 col-md-offset-2">
            <div class="panel panel-defaulth">
                <div class="panel-heading">User Dashboard</div>

                <div class="panel-body">
                        You are logged in as <strong>user</strong>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')

    <!-- 
        Essential Scripts
        =====================================-->

        
        <!-- Main jQuery -->
        <script src="plugins/jquery/jquery.js"></script>
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