<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>

    table.center {
        margin:auto;
        width: 70%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .font_size{
        font-size: 40px;
        padding-bottom: 40px;
        text-align: center;
    }

    .img_size{
        width: 200px;
        height: 200px;
        text-align: center;
    }

    .th_color{
        background-color: #4CAF50;
        color: white;
    }

    .th_design{
        padding: 15px;
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

                {{-- show the success message --}}
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        X
                    </button>
                    {{ Session::get('success') }}
                </div>

                @endif

                <h2 class="font_size">All Products</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_design">Product Title</th>
                        <th class="th_design">Description</th>
                        <th class="th_design">Quantity</th>
                        <th class="th_design">Category</th>
                        <th class="th_design">Price</th>
                        <th class="th_design">Discount Price</th>
                        <th class="th_design">Product Image</th>
                        <th class="th_design">Delete</th>
                        <th class="th_design">Edit</th>
                    </tr>

                    @foreach ($product as $product)

                    <tr class="alternate-row">
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $product->image }}">

                        </td>
                        <td>
                            <a href="{{ url('delete_product', $product->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                        </td>
                        <td>
                            <a href="{{ url('update_product', $product->id) }}" class="btn btn-success">Update  </a>
                        </td>
                    </tr>

                    @endforeach

                </table>

            </div>
        </div>
      <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
