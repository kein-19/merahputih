<div class="container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h1>Add Image</h1>
        </div>
        <div class="pull-right" style="line-height:70px;">
            <a href="admin.html" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <form action="#" class="form-horizontal">
                <div class="form-group">
                    <label for="title" class="col-md-3">Title</label>
                    <div class="col-md-9">
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-md-3">Image</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="assets/uploads/Image+1.jpg" alt="Image 1">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="filename"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-md-3">Visibility</label>
                    <div class="col-md-2">
                        <select name="visible" id="visible" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-4">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>