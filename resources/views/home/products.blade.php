<section class="py-5">
    <header>
      <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
      <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
    </header>
    <div class="row">
    @foreach ($product as $products)
      <!-- PRODUCT-->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="product text-center">
          <div class="position-relative mb-3">
            <div class="badge text-white bg-"></div><a class="d-block" href="{{ url('product_details', $products->id) }}"><img class="img-fluid w-100 product-image" src="product/{{ $products->image }}" alt="{{ $products->title }}"></a>
            <div class="product-overlay">
              <ul class="mb-0 list-inline">
                {{-- <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.html">Add to cart</a></li> --}}
              </ul>
              <form action="{{ url('add_cart', $products->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input class="btn btn-sm btn-dark change-text-color" type="submit" value="Add to Cart" >
                    </div>
                </div>
              </form>
            </div>
          </div>
          <h6><a class="reset-anchor" href="detail.html">{{ $products->title }}</a></h6>
          <p class="small text-muted">RM {{ $products->price }}</p>
          {{-- <p class="small text-muted">{{ $products->discount }}</p> --}}
        </div>
      </div>
      <!-- PRODUCT-->
    @endforeach
    </div>
    <span style="padding-top: 40px;">
      {{ $product->links('pagination::bootstrap-5') }}
    </span> 
</section>

<style>
    .product-image {
        height: 250px; /* Set a fixed height for the product images */
        object-fit: cover; /* Ensure the images maintain aspect ratio */
    }
</style>
