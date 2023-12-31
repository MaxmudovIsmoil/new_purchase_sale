<!-- Modal -->
<div class="modal fade text-left static" id="add_edit_modal" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Instance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" class="js_add_edit_form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <label>Name: </label>
                            <div class="form-group">
                                <input type="text" name="name_ru" class="form-control js_name_ru" />
                                <div class="invalid-feedback">name fail!</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Status: </label>
                            <div class="form-group">
                                <select name="status" class="form-control js_status">
                                    <option value="1">Active</option>
                                    <option value="0">No active</option>
                                </select>
                                <div class="invalid-feedback">status fail!</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

