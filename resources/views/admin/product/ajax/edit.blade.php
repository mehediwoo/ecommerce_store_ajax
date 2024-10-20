<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="updateForm" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" id="p_id" name="product_id">
              <!--- Modal Content-->
              <div class="container-fluid">
                  <div class="row"> <!--Main Row-->
                      <div class="col-md-6"> <!--Main Body left-->
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="">Product Title</label>
                                      <input type="text" name="title" id="p_title" class="form-control" placeholder="product title..">
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-4">
                                  <label>Category <span class="text-danger">*</span></label>
                                  <select name="p_cate" class="form-control" id="edit_p_cat">
                                      <option value="">Select category</option>
                                      <option id="current_cat" value="" class="text-danger" selected></option>
                                      @if (!empty($category) && $category->count() > 0)
                                          @foreach ($category as $row)
                                          <option value="{{ $row->id }}">{{ $row->title }}</option>
                                          @endforeach
                                      @endif
                                  </select>
                              </div>
                              <div class="col-md-4">
                                  <label>Sub Category <span class="text-danger">*</span></label>
                                  <select name="p_subcate" id="editsubcat" class="form-control">
                                      <option value="">Select Sub Category</option>
                                      <option id="current_subcat" value="" class="text-danger" selected></option>
                                  </select>
                              </div>
                              <div class="col-md-4">
                                  <label>Child Category <span class="text-danger">*</span></label>
                                  <select name="p_childcate" id="edit_childCat" class="form-control">
                                      <option value="">Select child category</option>
                                      <option id="current_childcat" value="" class="text-danger" selected></option>
                                  </select>
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-6">
                                  <label>Product Brand <span class="text-danger">*</span></label>
                                  <select name="p_brand" class="form-control">
                                      <option value="">Select brand</option>
                                      <option id="brand" value="" class="text-danger" selected></option>
                                      @if (!empty($brand) && $brand->count() > 0)
                                          @foreach ($brand as $row)
                                          <option value="{{ $row->id }}">{{ $row->title }}</option>
                                          @endforeach
                                      @endif
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label>Units <span class="text-danger">*</span></label>
                                  <input type="text" name="p_units" id="p_units" class="form-control" placeholder="product units..">
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-4">
                                  <label>Product Tag</label>
                                  <input type="text" name="p_tag" id="p_tags" class="form-control" placeholder="product tag.." data-role="tagsinput">
                              </div>
                              <div class="col-md-4">
                                  <label>Size <span class="text-danger">*</span></label>
                                  <input type="text" name="p_size" id="size" class="form-control" placeholder="product size.." data-role="tagsinput">
                              </div>
                              <div class="col-md-4">
                                  <label>Color <span class="text-danger">*</span></label>
                                  <input type="text" name="p_color" id="color" class="form-control" placeholder="product color.." data-role="tagsinput">
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-6">
                                  <label>Quantity <span class="text-danger">*</span></label>
                                  <input type="text" name="p_qty" id="qty" class="form-control" placeholder="product quantity..">
                              </div>
                              <div class="col-md-6">
                                  <label>Alert Quantity</label>
                                  <input type="text" name="alert_qty" id="alrt_qty" class="form-control" placeholder="product alert quantity..">
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-4">
                                  <label>Cost <span class="text-danger">*</span></label>
                                  <input type="text" name="p_cost" id="cost" class="form-control" placeholder="product cost..">
                              </div>
                              <div class="col-md-4">
                                  <label>Price <span class="text-danger">*</span></label>
                                  <input type="text" name="price" id="price" class="form-control" placeholder="product price..">
                              </div>
                              <div class="col-md-4">
                                  <label>Discount Price <span class="text-danger">*</span></label>
                                  <input type="text" name="discount_price" id="d_price" class="form-control" placeholder="product discount_price..">
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Meta Description<span class="text-danger">*</span></label>
                                      <textarea name="meta_desc" rows="5" id="meta_desc" class="form-control" placeholder="This description is for seo, it will help to find a product in your customers on google search!" class="form-control"></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Short Description<span class="text-danger">*</span></label>
                                      <textarea name="short_desc" rows="5" id="short_desc" class="form-control" placeholder="This description is for about of your product!" class="form-control"></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Product Description<span class="text-danger">*</span></label>
                                      <textarea name="description" id="summernote2" rows="10" class="form-control desc" placeholder="Product descriptions.." class="form-control"></textarea>
                                  </div>
                              </div>
                          </div>
                      </div><!--Main Body left end-->
                      <div class="col-md-6"><!--Main Body right end-->
                          <div class="row">
                              <div class="col-md-12">
                                  <label>Main thumbnail</label>
                                  <input type="file" name="thumbnail" class="dropify" id="product_image">
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col-md-12">
                                  <label>Multiple images (insert more images)</label>
                                  <input type="file" name="p_img[]" class="form-control"  multiple/>
                                  Curent images <br>
                                  <div class="allMultiIMg">
                                      {{-- <img src="" id="multiThumb" style="height: 100px;width:100px"> --}}
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col-md-4">
                                  <label>Feature Product</label>
                                  <input type="checkbox" name="feature_p" id="p_feature" class="ml-2">
                              </div>
                              <div class="col-md-4">
                                  <label>Hot Deal</label>
                                  <input type="checkbox" name="hot_deal" id="hot_deal" class="ml-2">
                              </div>
                              <div class="col-md-4">
                                <label>Show On Slider</label>
                                <input type="checkbox" name="show_on_slider" id="show_on_slider" class="ml-2">
                            </div>
                          </div>
                      </div>
                  </div>
              </div>




              <!-- Modal Footer-->
              <div class="modal-footer mt-3">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-info" id="updateProduct" value="Update">

                  <button class="btn btn-primary d-none" type="button" disabled id="updateSpinner">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                  </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
