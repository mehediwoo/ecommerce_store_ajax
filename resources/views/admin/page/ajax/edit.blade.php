<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Page</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="updatePageForm" method="post">
                <input type="hidden" name="edit_id" id="editId">
                <div class="form-group">
                    <label>Page Title</label>
                    <input type="text" name="page_title" id="page_title" class="form-control">
                </div>

                <div class="form-group">
                    <label>Page Content</label>
                    <textarea name="page_content" id="page_content" cols="30" rows="10"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <input type="submit" value="Update" class="btn btn-info" id="editPages">

                    <button class="btn btn-info d-none" type="button" disabled id="editSpinner">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Loading...
                    </button>
                </div>
              </form>
          </div>
      </div>
    </div>
  </div>
