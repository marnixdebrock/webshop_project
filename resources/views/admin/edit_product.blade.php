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
            <h1>Edit Product</h1>
            <div class="div_deg">
              <form action="{{url('update_product', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                  <label>Product Title</label>
                  <input class="inputDeg" type="text" name="title" value="{{$product->title}}">
                </div>

                <div>
                  <label>Price</label>
                  <input class="inputDeg" type="text" name="price" value="{{$product->price}}">
                </div>

                <div>
                  <label>Quantity</label>
                  <input class="inputDeg" type="number" name="quantity" value="{{$product->quantity}}">
                </div>

                <div>
                  <label>Category</label>
                  <select name="category" required>
                    <option value="{{$product->category}}">{{$product->category}}</option>
                    @foreach($category as $category)
                      @if($category->id !== $category_id)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div>
                  <label>Description</label>
                  <textarea name="description">{{$product->description}}</textarea>
                </div>

                <div>
                  <label>Current Image</label>
                  <img width="200px" src="/products/{{$product->image}}">
                </div>

                <div>
                  <label>New Image</label>

                  <input class="inputDeg" type="file" name="image">
                </div>
                <div>
                  <input class="btn btn-warning" type="submit" value="Edit Product">
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