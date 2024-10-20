<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Currency</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form action="" id="currencyUpdateForm" method="post">

                    <input type="hidden" name="c_id" id="c_id">
                    <div class="form-group">
                        <label>Currency Name</label>
                        <input type="text" name="c_name" id="c_name" placeholder="Dollar" class="form-control">
                    </div>

                    <div class="form-group mt-2">
                        <label>Currency Code</label>
                        <input type="text" name="c_code" id="c_code" placeholder="USD" class="form-control">
                    </div>

                    <div class="form-group mt-2">
                        <label>Currency Symble</label>
                        <input type="text" name="c_symble" id="c_symble" placeholder="$" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Update" id="updateCurrency" class="btn btn-info">

                        <button class="btn btn-primary d-none" type="button" disabled id="c_spinner">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
