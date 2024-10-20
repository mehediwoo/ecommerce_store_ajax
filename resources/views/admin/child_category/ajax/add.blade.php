
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Child Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="childCatForm" method="post">

            <div class="form-group">
                <label>Select Sub Category</label>
                <select name="sub_cat_id" class="form-control">
                    <option value="">Choose one </option>
                    @if (!empty($sub_category) && $sub_category->count()>0)
                        @foreach ($sub_category as $row)
                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" id="saveChildCate" value="Save">

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
