<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="updatePaymentForm" method="post">
              <input type="hidden" name="payment_id" id="payment_id">

              <div class="form-group">
                <label>Payment Name</label>
                <input type="text" name="payment_name" id="payment_name" class="form-control">
              </div>

              <div class="form-group">
                <label>Payment Store ID</label>
                <input type="text" name="store_id" id="store_id" class="form-control">
              </div>

              <div class="form-group">
                <label>Payment Signature Key</label>
                <input type="text" name="signature_key" id="signature_key" class="form-control">
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-info" id="updatePayment" value="Update">

                <button class="btn btn-primary d-none" type="button" disabled id="PaymentSpinner">
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Loading...
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
