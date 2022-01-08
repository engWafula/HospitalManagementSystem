
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
               @if (session()->has('message'))
          <div class="alert  alert-success">
            <button type="button" class="close" data-dismiss="alert" style="cursor:pointer;">X</button>
       {{session()->get('message')}}
          </div>
  
            @endif
               <form action="{{url("upload_doctor")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12 grid-margin stretch-card" align="center">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">ADD  DOCTOR</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Doctor Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Phone Number</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputEmail3" placeholder="Number">
                      </div>
                  
                      <div class="form-group">
                        <label for="exampleSelectGender">Speciality</label>
                        <select class="form-control" id="exampleSelectGender" name="speciality">
                         <option>---Select---</option>
                <option value="skin">Skin Doctor</option>
                <option value="eye">Eye</option>
                <option value="heart">Heart</option>
                <option value="nose">Nose</option>
                        </select>
                      </div>
                         <div style="padding:15px;">
                    <label>Change Image</label>
                    
                    <input type="file" name="file"  style="color: black;" />
                  </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Room Number</label>
                        <input type="text" name="room" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          </form>
        
        
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
  </body>
</html>