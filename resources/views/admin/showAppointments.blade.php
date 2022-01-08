
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
            <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table That Shows The Appointments</h4>
                   
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Doctor Name </th>
                            <th> Date </th>
                             <th> Email</th>
                            <th> Message</th>
                            <th> Status</th>
                             <th> Approved</th>
                              <th> Canceled</th>
                               <th> Send Mail</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($appointment as$appointments )
                          <tr class="table-info">
                            <td>{{$appointments->id}}</td>
                            <td> {{$appointments->selectedDoctor}} </td>
                            <td> {{$appointments->date}}</td>
                            <td>{{$appointments->email}}</td>
                            <td> {{$appointments->message}} </td>
                             <td>{{$appointments->status}}</td>
                              <td><a class="btn btn-success" onclick="return confirm('Are you sure you want to approve this')" href="{{url('approve_appointment',$appointments->id)}}">Approve</a></td>
                             <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')" href="{{url('canceled',$appointments->id)}}">Cancel</a></td>
                             <td><a class="btn btn-primary"  href="{{url('send_Mail',$appointments->id)}}">Send Mail</a></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
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