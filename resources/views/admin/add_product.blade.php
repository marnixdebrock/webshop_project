<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">
   	
    .div_deg, h1
    {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 
    }

    label
    {
      display: inline-block;
      width: 200px;
      font-size: 18px !important; 
      align-items: top;
    }

    textarea, .inputDeg, select
    {
      width: 250px;
      height: 30px;
      margin: 3px;
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
            <h1>Add Product</h1>
            <div class="div_deg">
              <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                  <label>Product Title</label>
                  <input class="inputDeg" type="text" name="title">
                </div>

                <div>
                  <label>Price</label>
                  <input class="inputDeg" type="text" name="price">
                </div>

                <div>
                  <label>Quantity</label>
                  <input class="inputDeg" type="number" name="quantity">
                </div>

                <div>
                  <label>Category</label>
                  <select name="category" required>
                    <option disabled>Select a Category</option>
                    @foreach($category as $category)
                    <option>{{$category->category_name}}</option>

                    @endforeach
                  </select>
                </div>

                <div>
                  <label>Description</label>
                  <textarea name="description" required></textarea>
                </div>

                <div>
                  <label>Image</label>
                  <input class="inputDeg" type="file" name="image">
                </div>
                <div>
                  <input class="btn btn-success" type="submit" value="Add Product">
                </div>
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