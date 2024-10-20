<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="updateBrandForm" method="post">
              <input type="hidden" name="id" id="brandId">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="Btitle" class="form-control">
              </div>

              <div class="form-group">
                <label>Logo</label>
                <input type="file" name="logo" id="Brandlogo" class="form-control dropify">

              </div>



              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-info" id="updateBrand" value="Update">

                <button class="btn btn-primary d-none" type="button" disabled id="Brandspinner">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
