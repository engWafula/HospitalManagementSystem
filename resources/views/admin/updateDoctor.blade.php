
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
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
            <div class="container" align="center" style="padding-top: 20px;outline:none;">
                @if (session()->has('message'))
                <div class="alert  alert-success">
                  <button type="button" class="close" data-dismiss="alert" style="cursor:pointer;">X</button>
             {{session()->get('message')}}
                </div>
        
                  @endif
                 <form action="{{url("editDoctor",$data->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                   <div style="padding:15px;">
                     <label>Doctor Name </label>
                     <input type="text" name="name" value='{{$data->name}}' placeholder="Enter Name " style="color: black;"/>
                   </div>
                   <div style="padding:15px;">
                    <label>Phone</label>
                    <input type="number" name="phone" value='{{$data->phone}}' placeholder="Enter Number" style="color: black;"/>
                  </div>
                  <div style="padding:15px;">
                    <label>Speciality</label>
                    <select  name="speciality" value='{{$data->speciality}}' style="color: black; width:200px;" >
                      <option>---Select---</option>
                      <option value="skin">Skin Doctor</option>
                      <option value="eye">Eye</option>
                      <option value="heart">Heart</option>
                      <option value="nose">Nose</option>
                    </select>
                  </div>
                  <div style="padding:15px;">
                    <label>Room Number</label>
                    <input type="text" name="room" value='{{$data->room}}' placeholder="Enter Name " style="color: black;" />
                  </div>
                  <div style="padding:15px;">
                    <label>Old Image</label>
                    <img  src="doctor_image/{{$data->image}}" alt="" width="100px" height="100px">
                
                  </div>
                  <div style="padding:15px;">
                    <label>Change Image</label>
                    
                    <input type="file" name="file"  style="color: black;" />
                  </div>
                  <div style="padding:15px;">
                    
                    <input type="submit" class="btn btn-success"/>
                  </div>
                 </form>
               </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
  </body>
</html>