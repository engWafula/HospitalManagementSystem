
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
                        <th style="padding:20px; font-size:20px; color:white;">Date</th>
                        <th style="padding:20px; font-size:20px; color:white;">Message</th>
                        <th style="padding:20px; font-size:20px; color:white;" >Status</th>
                        <th style="padding:20px; font-size:20px; color:white;" >Approved</th>
                        <th style="padding:20px; font-size:20px; color:white;" >Canceled</th>
                        <th style="padding:20px; font-size:20px; color:white;" >Send Mail</th>
                    </tr>
                    @foreach ($appointment as$appointments )
                    <tr style="background-color:black;" align="center">
                      
                        <td style="padding:20px;  color:white;">{{$appointments->selectedDoctor}}</td>
                        <td style="padding:20px; color:white;">{{$appointments->date}}</td>
                        <td style="padding:20px; color:white;">{{$appointments->message}}</td>
                        <td style="padding:20px;  color:white;">{{$appointments->status}}</td>
                        <td><a class="btn btn-success" onclick="return confirm('Are you sure you want to approve this')" href="{{url('approve_appointment',$appointments->id)}}">Approve</a></td>
                      
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')" href="{{url('canceled',$appointments->id)}}">Cancel</a></td>
                         <td><a class="btn btn-primary"  href="{{url('send_Mail',$appointments->id)}}">Send Mail</a></td>
                     
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