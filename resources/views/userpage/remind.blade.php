
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
        @php
        use Carbon\Carbon;
        $today_date = Carbon::today()->format('d-m-Y');
    @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="card-body p-0">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            
                            <tr>
                                <th>Medication's Name</th>
                                <th>Type of Drug</th>
                                <th>Contact Number</th>
                                <th>Dosage</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Frequency</th>
                                <th>Days</th>                         
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Data table for reminder--> 
                            @if(!empty($users))
                                @foreach ($users as $items)
                                <tr>
                                <td hidden class="id">{{ $items->id }}</td>
                                <td class="medname">{{$items->medname}}</td>
                                <td class="drugtype">{{$items->drugtype}}</td>
                                <td class="contact_num">{{$items->contact_num}}</td>
                                <td class="dosage">{{$items->dosage}}</td>
                                <td hidden class="from_date">{{ $items->from_date }}</td>
                                <td>{{date('d F, Y',strtotime($items->from_date)) }}</td>
                                <td hidden class="to_date">{{$items->to_date}}</td>
                                <td>{{date('d F, Y',strtotime($items->to_date)) }}</td>
                                <td class="freqency">{{$items->freqency}}</td>
                                <td class="day">{{$items->day}} Day</td> 
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item remindUpdate" data-toggle="modal" data-id="'.$items->id.'" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item remindDelete" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <nav aria-label="Page navigation example" >
                <ul class="pagination justify-content-end">
                  <li class="page-item disabled">       
                  </li>
                   <!-- pagination number--> 
                  <li>   {{ ($users->links()) }}</li>
                  </li>
                </ul>
              </nav>
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
            <!-- Direct to Web.php and call controller--> 
            <form action="{{ route('form/leaves/save') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-4">Medication's Name</label>
                    <div class="col-8">
                        <input type="text" class="form-control @error('medname') is-invalid @enderror" id="medname" name="medname" value="{{ old('medname') }}" placeholder="Enter your Medication's name">
                        @error('medname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>        	
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-4">Contact Number</label>
                    <div class="col-8">
                        <input type="tel-num" class="form-control @error('contact_num') is-invalid @enderror" id="contact_num" name="contact_num" value="{{ old('contact_num') }}" placeholder="Enter your number in Coutry Code">
                        @error('contact_num')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div> 	
                </div>
                
                <div class="form-group row">
                    <label class="col-form-label col-4">Type of Drugs</label>
                    <div class="col-8">
                        <select class="select" id="drugtype" name="drugtype">
                            <option selected disabled>Select Type of Drugs</option>
                            <option value="Pill">Pill</option>
                            <option value="Capsule">Capsule</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Syrup">Syrup</option>
                            <option value="Suspension">Suspension</option>
                            <option value="Injection">Injection</option>
                            <option value="Sachet">Sachet</option>
                            <option value="Eye Drop">Eye Drop</option>
                        </select>
                    </div>	
                </div>
               
                
                <div class="form-group row">
                    <label class="col-form-label col-4">Dosages</label>
                    <div class="col-8">
                        <select class="select" id="dosage" name="dosage">
                            <option selected disabled>Select Dosage</option>
                            <option value="Grams(g)">Grams(g)</option>
                            <option value="Micrograms(mcg)">Micrograms(mcg)</option>
                            <option value="Milligrams(mg)">Milligrams(mg)</option>
                            <option value="Millilitre(mL)">Millilitre(mL)</option>                
                        </select>
                    </div> 	
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-4">Frequency of drug</label>
                    <div class="col-8">
                        <select class="select" id="freqency" name="freqency">
                            <option selected disabled>Select Leave Type</option>
                            <option value="Every 2 Hours">Every 2 Hours</option>
                            <option value="Every 4 Hours">Every 4 Hours</option>
                            <option value="Once a Day">Once a Day</option>
                            <option value="Twice a Day">Twice a Day</option>
                            <option value="Three Times a Day">Three Times a Day</option>
                            <option value="Before Meal">Before Meal</option>
                            <option value="At Bedtime">At Bedtime</option>                    
                        </select>
                  
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
                <!-- Direct to Web.php and call controller--> 
                <form action="{{ route('form/leaves/edit') }}" method="POST">
                    @csrf
                    <input type="hidden" id="e_id" name="id" value="">
                    <div class="form-group row">
                        <label class="col-form-label col-4">Medication's Name</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="e_medname" name="medname" value="">
                        </div>        	
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-4">Contact Number</label>
                        <div class="col-8">
                            <input type="number" class="form-control" id="e_contact_num" name="contact_num" value="{{ old('contact_num') }}" placeholder="Enter your number">
                        </div> 	
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-4">Type of Drugs</label>
                        <div class="col-8">
                            <select class="select" id="e_drugtype" name="drugtype">
                                <option selected disabled>Select Type of Drugs</option>
                                <option value="Pill">Pill</option>
                                <option value="Medical Leave">Capsule</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Syrup">Syrup</option>
                                <option value="Suspension">Suspension</option>
                                <option value="Injection">Injection</option>
                                <option value="Sachet">Sachet</option>
                                <option value="Eye Drop">Eye Drop</option>
                            </select>
                        </div>	
                    </div>

                      
                <div class="form-group row">
                    <label class="col-form-label col-4">Dosages</label>
                    <div class="col-8">
                        <select class="select" id="e_dosage" name="dosage">
                            <option selected disabled>Select Dosage</option>
                            <option value="Grams(g)">Grams(g)</option>
                            <option value="Micrograms(mcg)">Micrograms(mcg)</option>
                            <option value="Milligrams(mg)">Milligrams(mg)</option>
                            <option value="Millilitre(mL)">Millilitre(mL)</option>                
                        </select>
                    </div> 	
                </div>  
              

                    <div class="form-group row">
                        <label class="col-form-label col-4">Frequency of drug</label>
                        <div class="col-8">
                            <select class="select" id="e_freqency" name="freqency">
                                <option selected disabled>Select Leave Type</option>
                                <option value="Pill">Every 2 Hours</option>
                                <option value="Medical Leave">Every 4 Hours</option>
                                <option value="Tablet">Once a Day</option>
                                <option value="Syrup">Twice a Day</option>
                                <option value="Suspension">Three Times a Day</option>
                                <option value="Injection">Before Meal</option>
                                <option value="Sachet">At Bedtime</option>                    
                            </select>
                      
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
                     <!-- Direct to Web.php and call controller--> 
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

    {{-- update js for edit button --}}
    <script>
        $(document).on('click','.remindUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_medname').val(_this.find('.medname').text());
            $('#e_contact_num').val(_this.find('.contact_num').text());
            $('#e_drugtype').val(_this.find('.drugtype').text());
            $('#dosage').val(_this.find('.freqency').text());
            $('#e_freqency').val(_this.find('.freqency').text());
            $('#e_number_of_days').val(_this.find('.day').text());
            $('#e_time').val(_this.find('.time').text());
            $('#e_from_date').val(_this.find('.from_date').text());  
            $('#e_to_date').val(_this.find('.to_date').text());  
            
            var drugtype = (_this.find(".drugtype").text());
            var _option = '<option selected value="' + drugtype+ '">' + _this.find('.drugtype').text() + '</option>'
            $( _option).appendTo("#e_drugtype");

            var freqency = (_this.find(".freqency").text());
            var _option = '<option selected value="' + freqency+ '">' + _this.find('.freqency').text() + '</option>'
            $( _option).appendTo("#e_freqency");

            var freqency = (_this.find(".dosage").text());
            var _option = '<option selected value="' + freqency+ '">' + _this.find('.dosage').text() + '</option>'
            $( _option).appendTo("#e_dosage");
          
        });
    </script>
    {{-- delete js for delete button --}}
    <script>
        $(document).on('click','.remindDelete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>
        @endsection
@endsection
