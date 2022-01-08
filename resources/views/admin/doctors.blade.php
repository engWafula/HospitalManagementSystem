<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
      label{
        display: inline-block;
        width: 200px;
      }
    </style>
  @include('admin.css')
  </head>
  <body>
 
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding-top:100px">

                   <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Doctors</h4>
                 
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Doctor Picture</th>
                            <th> Doctor Name</th>
                            <th> Phone</th>
                            <th> Speciality</th>
                            <th> Room</th>
                            <th> Update Data</th>
                            <th> Delete Data</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($doctor as$doctors )
                          <tr>
                            <td class="py-5">
                             <img height="100px"  src="doctor_image/{{$doctors->image}}" alt="" width="100px" height="100px">
                            </td>
                            <td>{{$doctors->name}}</td>
                            <td>{{$doctors->phone}}</td>
                            <td>{{$doctors->speciality}}</td>
                            <td>{{$doctors->room}}</td>
                             
                             <td><a class="btn btn-success" onclick="return confirm('Are you sure you want to approve this')" href="{{url('update',$doctors->id)}}">Update</a></td>
                               <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')" href="{{url('Delete',$doctors->id)}}">Delete</a></td>
                          </tr>
                          <tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
               </div>
            
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
  </body>
</html>