@extends('layouts.master')

@section('content')

<main class="col bg-faded py-3 flex-grow-1">
    <h3>Data Report</h3>
    <br>
	

	{{-- <table> --}}
	<div class="container">
        {{-- success --}}
        @if(\Session::has('insert'))
        <div id="insert" class=" alert alert-success">
            {!! \Session::get('insert') !!}
        </div>
        @endif

        {{-- error --}}
        @if(\Session::has('error'))
            <div id="error" class=" alert alert-danger">
                {!! \Session::get('error') !!}
            </div>
        @endif

		{{-- search --}}

		<form action="{{ route('form/report') }}" method ="GET">
			@csrf
			<br>
			<div class="container">
				<div class="row">
					<div class="container-fluid">
						<div class="form-group row">
							<label for="date" class="col-form-label col-sm-2">From</label>
							<div class="col-sm-3">
								<input type="date" class="form-control input-sm" id="fromdate" name="date" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="date" class="col-form-label col-sm-2">To</label>
							<div class="col-sm-3">
								<input type="date" class="form-control input-sm" id="todate" name="todate" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="date" class="col-form-label col-sm-2">Name Full</label>
							<div class="col-sm-3">
								<input type="text" class="form-control input-sm" id="name" name="name"placeholder="Search other..." />
							</div>
							<div class="col-sm-2">
								<button type="submit" class="btn" name="search" title="Search"><img src="https://img.icons8.com/android/24/000000/search.png"/></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</form>

		
		<div class="container-fluid">
			<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
				<thead>
					
					<tr>
						<th>ID</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Date</th>
						<th>Modefy</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $value)
					<tr>
						<td class="id">{{ $value->id }}</td>
						<td class="name">{{ $value->username }}</td>
						<td class="email">{{ $value->email }}</td>
						<td class="phone">{{ $value->phone }}</td>
						<td class="date">{{ date('d-m-Y', strtotime($value->created_at))  }}</td>
						<td class=" text-center">
							<a class="m-r-15 text-muted update" data-toggle="modal" data-id="'.$value->id.'" data-target="#update">
								<i class="fa fa-edit" style="color: #2196f3"></i>
							</a>
							<a href="{{ url('form/delete'.$value->id) }}" onclick="return confirm('Are you sure to want to delete it?')">
								<i class="fa fa-trash" style="color: red;"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	{{-- </table> --}}

	<!-- Modal Update-->
	<div class="modal fade" id="update" tabindex="-1" aria-labelledby="update" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="update">Update</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="update" action="{{ route('form/update') }}" method = "post"><!-- form add -->
					{{ csrf_field() }}
					<div class="modal-body">
						<input type="hidden" class="form-control" id="e_id" name="id" value=""/>
						<div class="modal-body">
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Full Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="e_name" name="name" required="" value=""/>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="e_email" name="email" required="" value=""/>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Phone</label>
								<div class="col-sm-9">
									<input type="tel" class="form-control" id="e_phone" name="phone" required="" value=""/>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Date</label>
								<div class="col-sm-9">
									<input type="tel" class="form-control" id="e_date" name="phone" required="" value=""/>
								</div>
							</div>
						</div>
						<!-- form add end -->
					</div>
					<div class="modal-footer">
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
							<button type="submit" id=""name="" class="btn btn-success  waves-light"><i class="icofont icofont-check-circled"></i>Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Modal Update-->

	{{-- script update --}}
	
	<script>
		$(document).on('click','.update',function()
		{
			var _this = $(this).parents('tr');
			$('#e_id').val(_this.find('.id').text());
			$('#e_name').val(_this.find('.name').text());
			$('#e_email').val(_this.find('.email').text());
			$('#e_phone').val(_this.find('.phone').text());
			$('#e_date').val(_this.find('.date').text());
		});
	</script>
	
    {{-- hide message js --}}
    <script>
        $('#insert').show();
        setTimeout(function()
        {
            $('#insert').hide();
        },5000);

		$('#error').show();
        setTimeout(function()
        {
            $('#error').hide();
        },5000);
        
    </script>        
</main>
@endsection