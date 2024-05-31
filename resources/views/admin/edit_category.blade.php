<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">
   	
   	input[type='text']
   	{
   		width: 300px;
   		height: 40px;
   	}
    
    .div_deg, h1{
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
    }


   </style>
  </head>
  <body>
   @include('admin.header')

   @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Edit Category</h1>
            <div class="div_deg">
              <form action="{{url('update_category', $data->id)}}" method="post">
                @csrf
                <input type="text" name="category" value="{{$data->category_name}}">
                <input class="btn btn-warning" type="submit" value="Edit">
              </form>
            </div>
          </div>

          @include('admin.footer')
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>