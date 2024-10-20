
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="updateCatForm" method="post">
            <input type="hidden" name="cat_id" id="cat_id">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="editTitle" class="form-control">
            </div>

            <div class="form-group">
                <label>On Home Page</label>
                <select name="on_home" id="on_home" class="form-control">
                    <option class="text-primary" id="on_home_option" value="" selected></option>
                    <option class="text-danger" value="no">No</option>
                    <option class="text-success" value="yes">Yes</option>
                </select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" id="updateCate" value="Update">

                <button class="btn btn-primary d-none" type="button" disabled id="UpdateSpinner">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
