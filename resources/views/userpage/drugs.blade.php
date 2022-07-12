@extends('layouts.fdrugs')

@section('section')
<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Pill Finder</h2>
        <form action="enhanced-results.html">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Result Type:</label>
                                <select class="select2" data-placeholder="Any" style="width: 100%;">
                                    <option>All</option>
                                    <option>Tablets</option>
                                    <option>Capsules</option>
                                    <option>Drops</option>
                                    
                                </select>
                            </div> 
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Sort Order:</label>
                                <select class="select2" style="width: 100%;">
                                    <option selected>ASC</option>
                                    <option>DESC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Order By:</label>
                                <select class="select2" style="width: 100%;">
                                    <option selected>Title</option>
                                    <option>Date</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg" placeholder="Search here...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Drugs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                   
                  </tr>
                  </thead>
                  <tbody>             
                  <tr>
                    <td>1</td>
                    <td>Medicine Name</td>
                    <td>Tablet/Drops/Capsules</td>
                    <td>Drug Information/td>            
                  </tr>                  
                  <tr>
                    <td>1</td>
                    <td>Medicine Name</td>
                    <td>Tablet/Drops/Capsules</td>
                    <td>Drug Information/td>
                  </tr>
                  
               
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
          




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

        <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
    $(function () {
      $('.select2').select2()
    });
</script>


<script src="{{ asset('dist/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('dist/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('dist/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('dist/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('dist/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('dist/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('dist/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('dist/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('dist/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('dist/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist//js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection