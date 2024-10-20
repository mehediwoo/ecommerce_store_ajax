<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Page</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="pageForm" method="post">
            <div class="form-group">
                <label>Page Title</label>
                <input type="text" name="page_title" class="form-control">
            </div>

            <div class="form-group">
                <label>Page Content</label>
                <textarea name="page_content" id="page_text" cols="30" rows="10"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save" id="savePage" class="btn btn-primary">

                <button class="btn btn-primary d-none" type="button" disabled id="spinner">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
