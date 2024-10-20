<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Currency</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="currencyForm">

            <div class="form-group">
                <label>Currency Name</label>
                <input type="text" name="c_name" placeholder="Dollar" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Currency Code</label>
                <input type="text" name="c_code" placeholder="USD" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Currency Symble</label>
                <input type="text" name="c_symble" placeholder="$" class="form-control">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save" id="saveCurrency" class="btn btn-primary">

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
