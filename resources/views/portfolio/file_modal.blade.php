<div class="modal fade" role="dialog" id="photo_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <a data-dismiss="modal" class="btn btn-danger pull-right"><i class="fa fa-times"></i> </a>
                    <h4>Image Upload Form</h4>
                </div>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" action="{{ URL::to("portfolio/add") }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Comments</label>
                        <div class="col-md-6">
                            <textarea name="description" class="form-control" placeholder="Say something about your photo"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">&nbsp;</label>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>