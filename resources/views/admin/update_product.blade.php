<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

    @include('admin.css')

    <style type="text/css">

    .div_center{
        text-align: center;
        padding-top: 40px;
    }

    .font_size{
        font-size: 40px;
        padding-bottom: 40px;
    }

    .font_color{
        color: black;
        padding-bottom: 20px;
    }

    label{
        display: inline-block;
        width: 250px;
    }

    .div_design{
        padding-bottom: 15px;
        text-align: center;
    }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        X
                    </button>
                    {{ Session::get('success') }}
                </div>

                @endif

                <div class="div_center">

                    <h1 class="font_size">Update Product</h1>


                    <form action="{{ url('/update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                        <div class="div_design">
                            <label for="" >Product Title:</label>
                            <input type="text" name="title" placeholder="Write a title" class="font_color" required value="{{ $product->title }}">
                        </div>
                        <div class="div_design">
                            <label for="" >Product Description:</label>
                            <input type="text" name="description" placeholder="Write a Description" class="font_color" value="{{ $product->description }}" required>
                        </div>
                        <div class="div_design">
                            <label for="" >Product Price:</label>
                            <input type="number" name="price" placeholder="Write a price" class="font_color" value="{{ $product->price }}" required>
                        </div>
                        <div class="div_design">
                            <label for="" >Discounted Price:</label>
                            <input type="number" name="discount" placeholder="Write a discounted price" value="{{ $product->discount }}" class="font_color">
                        </div>
                        <div class="div_design">
                            <label for="" >Product Quantity:</label>
                            <input type="number" name="quantity" placeholder="Insert quantity" value="{{ $product->quantity }}" class="font_color" min="0" required>
                        </div>
                        <div class="div_design">
                            <label for="" >Product Category:</label>
                            <select name="category" id="" class="font_color" required>
                                <option value="{{ $product->category }}" selected> {{ $product->category }}</option>

                                @foreach ($category as $category)

                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="div_design">
                            <label for="" >Current Product Image here:</label>
                            <img style="margin: auto;" height="150" width="150" src="/product/{{ $product->image }}">
                        </div>

                        <div class="div_design">
                            <label for="" >Change Product Image here:</label>
                            <input type="file" name="image">
                        </div>
                            <input type="submit" value="Update Product" class="btn btn-primary">

                    </form>

                </div>

            </div>
        </div>
      <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>


