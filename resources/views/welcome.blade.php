
@extends('layouts.remind')
@section('content')
      
  <!-- /Page Header -->  
    <div class="ali">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Dashboard / Reminders</h3>
        </div>
            <!--- End Date Header-->  
        </div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Reminders</h3>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Reminders</a>
        </div>
    </div>
    <div class="content container-fluid">
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="card-body p-0">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Reminder</th>
                                <th>Time</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>No of Days</th>                         
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>

                       
                    </table>
                </div>
            </div>
        </div>
 <!-- Add Leave Modal -->
<div id="add_leave" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Reminder</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('form/leaves/save') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-4">Type of Reminder</label>
                    <div class="col-8">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="leaveType" name="leave_type" value="{{ old('leave_type') }}" placeholder="Enter your reminder">
                        @error('leaveType')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>        	
                </div>
              
                <div class="form-group row">
                    <label class="col-form-label col-4">Input Time:</label>
                    <div class="col-8">
                        <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}">
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>	
                </div>
                <div class="form-group">
                    <label>From <span class="text-danger">*</span></label>
                    <div class="cal-icon">
                        <input type="text" class="form-control datetimepicker" id="from_date" name="from_date">
                    </div>
                </div>
                <div class="form-group">
                    <label>To <span class="text-danger">*</span></label>
                    <div class="cal-icon">
                        <input type="text" class="form-control datetimepicker" id="to_date" name="to_date">
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

  <!-- Edit Leave Modal -->
  <div id="edit_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('form/leaves/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" id="e_id" name="id" value="">
                    <div class="form-group row">
                        <label class="col-form-label col-4">Type of Reminder</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="e_leave_type" name="leave_type" value="{{ old('leave_type') }}" value="">                      
                        </div>        	
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-4">Input Time:</label>
                        <div class="col-8">
                            <input type="time" class="form-control" id="e_time" name="time" value="">
                        </div>	
                    </div>
                    <div class="form-group">
                        <label>From <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input type="text" class="form-control datetimepicker" id="e_from_date" name="from_date" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>To <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input type="text" class="form-control datetimepicker" id="e_to_date" name="to_date" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Number of days <span class="text-danger">*</span></label>
                        <input class="form-control" readonly type="text" id="e_number_of_days" name="number_of_days" value="">
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Leave Modal -->
<!-- Delete Leave Modal -->
<div class="modal custom-modal fade" id="delete_approve" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Reminder</h3>
                    <p>Are you sure want to delete this reminder?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('form/leaves/edit/delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" class="e_id" value="">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Leave Modal -->

    @section('script')
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
   

   
    @endsection
@endsection
