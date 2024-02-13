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
            <div class="badge text-white bg-"></div><a class="d-block" href="{{ url('product_details', $products->id) }}"><img class="img-fluid w-100" src="product/{{ $products->image }}" alt="..."></a>
            <div class="product-overlay">
              <ul class="mb-0 list-inline">
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.html">Add to cart</a></li>
                <li class="list-inline-item me-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
              </ul>
            </div>
          </div>
          <h6> <a class="reset-anchor" href="detail.html">{{ $products->title }}</a></h6>
          <p class="small text-muted">RM {{ $products->price }}</p>
          {{-- <p class="small text-muted">{{ $products->discount }}</p> --}}
        </div>
      </div>
      <!-- PRODUCT-->
      @endforeach

      <span style="padding-top: 20px;">
      {{ $product->links('pagination::bootstrap-5') }}
      </span>

    </div>
  </section>
