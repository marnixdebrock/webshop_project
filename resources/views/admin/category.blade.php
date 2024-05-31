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
   	.div_deg, .h1_deg
   	{
   		display: flex;
   		justify-content: center;
   		align-items: center;
   		margin: 30px;
   	}

    .table_deg
    {
      text-align: center;
      margin: auto;
      border: 2px solid #DB6574;
      margin-top: 50px;
    }
   	
    th
    {
  
      padding: 15px;
      font-size: 20px;
      font-weight: bold;
    }

    td
    {
      color: white;
      padding: 10px;
      border: 1px solid #DB6574;
    }
    #alt_row
    {
      text-align: right;
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

          	<h1 class="h1_deg">Add Category</h1>
          	<div class="div_deg">
	          	<form action="{{url('add_category')}}" method="post">
              @csrf
	          		<div>
	          			<input type="text" name="category" placeholder="Add a category..." required>
	          			<input class="btn btn-success" type="submit" value="Add category">
	          		</div>
	          	</form>
          	</div>

            <div>
              <table class="table_deg">
                <tr>
                  <th id="alt_row">Category Name</th>
                </tr>

                @foreach($data as $data)

                <tr>
                  <td>{{$data->category_name}}</td>

                  <td>
                    <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category', $data->id)}}">Delete</a>
                  </td>
                  <td>
                    <a class="btn btn-warning" href="{{url('edit_category', $data->id)}}">Edit</a>
                  </td>

                </tr>

                @endforeach
              </table>

            </div>

          </div>

          @include('admin.footer')
      </div>
    </div>
    <!-- JavaScript files-->

    <script type="text/javascript">
      function confirmation(ev)
      {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({

          title:"Are you sure you want to delete this?",
          text: "The child must not be an obstacle.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })

        .then((willCancel)=>{
          if(willCancel){
            window.location.href=urlToRedirect;
          }
        })
      }

    </script>

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