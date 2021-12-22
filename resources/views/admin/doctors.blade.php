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
                <table >
                    <tr style="background-color:black;" align="center">
                        <th style="padding:20px; font-size:20px; color:white;">Doctor Name</th>
                        <th style="padding:20px; font-size:20px; color:white;">Phone</th>
                        <th style="padding:20px; font-size:20px; color:white;">room number</th>
                        <th style="padding:20px; font-size:20px; color:white;" >Speciality</th>
                        <th style="padding:20px; font-size:20px; color:white;" >Picture</th>
                        <th style="padding:20px; font-size:20px; color:white;" >Update Data</th>
                        <th style="padding:20px; font-size:20px; color:white;" >Delete Data</th>
                    </tr>
                    @foreach ($doctor as$doctors )
                    <tr style="background-color:black;" align="center">
                      
                        <td style="padding:20px;  color:white;">{{$doctors->name}}</td>
                        <td style="padding:20px; color:white;">{{$doctors->phone}}</td>
                        <td style="padding:20px; color:white;">{{$doctors->room}}</td>
                        <td style="padding:20px;  color:white;">{{$doctors->speciality}}</td>
                        <td style="padding:20px;  color:white;"> <img  src="doctor_image/{{$doctors->image}}" alt="" width="100px" height="100px"></td>
                       <td><a class="btn btn-success" onclick="return confirm('Are you sure you want to approve this')" href="{{url('update',$doctors->id)}}">Update</a></td>
                       
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')" href="{{url('Delete',$doctors->id)}}">Delete</a></td>
                 
                     
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
  </body>
</html>