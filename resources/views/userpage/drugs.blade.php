@extends('layouts.remind')

@section('content')

<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Pill Finder</h2>
              <div class="">   
                  <div class="col-md-6 offset-md-1 ">
                        <div class="form-group">  
                             <!-- Direct to Web.php and call controller-->    
                            <form action="/search" class="ali"> 
                            <div class="input-group  input-group-lg">
                                <input type="text" name="query" class="form-control" placeholder="Search name">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <button class="btn-lg btn-info" href="userpage.drugs">
                                    <i class="fa fa-refresh"></i> </button>
                                             
                            </div>
                    </div>
                        </div>
                      </form>
                      
                  </div>
                 
              </div>
        
     
        <div class="row ali">
          <div class="col-md-12">
              <div class="">
                  <table id="example" class="table table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Description</th>                         
                          </tr>
                      </thead>  
                      <tbody>    
                         <!-- Data table for list of drugs to display data-->                
                        @foreach ($drugs as $key => $items)
                        <tr>
                        <td hidden class="id">{{ $items->id }}</td>
                        <td> {{$items->name}}</td>
                        <td> {{$items->type_drugs}}</td>              
                        <td> {{$items->description}}</td>            
                            </tr>
                            
                        @endforeach        
                </tbody>                
                  </table>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  <li class="page-item disabled">       
                  </li>
                   <!-- pagination number--> 
                  <li>   {{ ($drugs->links()) }}</li>
                  </li>
                </ul>
              </nav>
          </div>
      </div>
    </form>
</div>
     
    

    </div>
</section>


@endsection

@section('script')


<script type="text/javascript">

      $("#nameid").select2({
            placeholder: "Select a Name",
            allowClear: true
        });
</script>

        












@endsection