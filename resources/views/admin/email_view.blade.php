
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
                 <form action="{{url("sendemail",$data->id)}}" method="POST">
                  @csrf
                   <div style="padding:15px;">
                     <label>Greetings</label>
                     <input type="text" name="greeting" style="color: black;"/>
                   </div>
                   <div style="padding:15px;">
                    <label>Body</label>
                    <input type="text" name="body" style="color: black;"/>
                  </div>
            
                  {{-- <div style="padding:15px;">
                    <label>Action Text</label>
                    <input type="text" name="action_text"  style="color: black;" />
                  </div>
                     <div style="padding:15px;">
                    <label>Action Url</label>
                    <input type="text" name="action_url"  style="color: black;" />
                  </div> --}}
                     <div style="padding:15px;">
                    <label>Mail End Part</label>
                    <input type="text" name="end_part" style="color: black;" />
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