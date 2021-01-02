<div class="container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h1>List Image</h1>
        </div>
        <div class="pull-right" style="line-height:70px;">
            <a href="admin-form.html" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th width="200">Thumbnail</th>
                        <th>Title</th>
                        <th width="50">Visibility</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="thumbnail">
                                <img width="200" src="assets/uploads/Image+1.jpg" alt="Image 1">
                            </div>
                        </td>
                        <td>Image 3</td>
                        <td>
                            <span class="label label-success">Visible</span>
                        </td>
                        <td>
                            <!-- <?= base_url('gallery/editimage/') . $r['id']; ?> <?= $r['id']; ?>-->
                            <!-- <?= base_url('gallery/deleteimage/') . $r['id']; ?> -->
                            <a href="#" class=" badge badge-primary " data-toggle=" modal" data-target="#newRoleModal" data-id="#" role="button" title="edit"><i class="fas fa-fw fa-edit"></i></a>
                            <a href="#" class="badge badge-danger tombol-hapusimage" role="button" title="delete"><i class="fas fa-fw fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div class="thumbnail">
                                <img width="200" src="assets/uploads/Image+2.jpg" alt="Image 2">
                            </div>
                        </td>
                        <td>Image 3</td>
                        <td>
                            <span class="label label-default">Invisible</span>
                        </td>
                        <td>
                            <a href="admin-form.html" class="btn btn-xs btn-default">Edit</a>
                            <a onclick="javascript:confirm('Are you sure ?')" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="thumbnail">
                                <img width="200" src="assets/uploads/Image+3.jpg" alt="Image 3">
                            </div>
                        </td>
                        <td>Image 3</td>
                        <td>
                            <span class="label label-default">Invisible</span>
                        </td>
                        <td>
                            <a href="admin-form.html" class="btn btn-xs btn-default">Edit</a>
                            <a onclick="javascript:confirm('Are you sure ?')" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <nav class='text-center'>
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>

</div>