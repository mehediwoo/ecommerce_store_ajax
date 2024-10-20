<!-- Modal -->
<div class="modal " id="quick_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!--Modal Content -->
            <div class="row">
                <div class="col-md-5">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset('admin/images/table-product-3.jpg') }}" class="d-block w-100" alt="..." id="mainThumb">
                          </div>

                          <div id="multiple_thumb">

                          </div>



                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>

                </div>

                <div class="col-md-7">
                    <h1 id="title"></h1>
                    <p class="mt-3 text-mute" style="font-weight: bold;font-size:13px;">
                        <span id="category">Category</span>
                        -> <span id="sub_cat">Sub Category</span>
                        -><span id="child_cat"> Child Category</span>
                    </p>
                    <p class="mt-3">Brand: <span id="brands" class="badge bg-secondary"></span></p>
                    <p class="mt-3">Tags: <span id="tags"></span></p>
                    <p class="mt-3">Size: <span id="sizes"></span></p>
                    <p class="mt-3">Color: <span id="colors"></span></p>
                    <p class="mt-3 text-uppercase">Units: <span id="units"></span></p>
                    <p class="mt-3">Quantity: <span id="quantity"></span></p>
                    <p class="mt-3">Alert Quantity: <span id="alert_quantity"></span></p>
                    <p class="mt-2">
                        Review
                        <span style="color: rgb(214, 184, 12)">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </span>
                    </p>

                    <h2 class="mt-3">Cost: <span id="costs"></span> </h2>
                    <h2 class="mt-3">Price: <span id="prices" class="text-danger"></span> </h2>
                    <h2 class="mt-3">Discount Price: <span id="d_prices" class="text-success"></span> </h2>
                    <p class="mt-3">
                      Feature : <span id="feature"></span>
                    </p>
                    <p class="mt-3">
                      Hot Dels : <span id="hot_deals"></span>
                    </p>
                    <p class="mt-3">
                      <h3>Short Description:</h3> <span id="short_descr"></span>
                    </p>
                    <p class="mt-3">
                      <h3>Description:</h3> <span id="long_desc"></span>
                    </p>
                </div>
            </div>




        </div>

      </div>
    </div>
  </div>
