<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 30px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
        }

        .center{
          margin: auto;
          width: 50%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid red;
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
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{ url('/add_category') }}" method="POST">

                        @csrf

                        <input class="input_color" type="text" name="category" placeholder="Write category name">

                        <input type="Submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>
                </div>

              {{-- Show all the category datas --}}
              <table class="center">
              <tr>
                <td>Category name</td>
                <td>Action</td>
              </tr>

              @foreach ($data as $data)

              <tr>
                <td>{{ $data->category_name }}</td>
                <td><a onclick="return confirm('Are you sure to delete this?')" href="{{ url('delete_category', $data->id) }}" class="btn btn-danger">Delete</a></td>
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
