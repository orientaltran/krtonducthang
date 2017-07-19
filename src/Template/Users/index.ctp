<html>
<body>
<div id="content"  class="content-wrapper">
    <section class="content-header">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <h1 class="title-add">Users</h1>
                </div>
                <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <button type="button" id="editTour" class="btn btn-block btn-primary"
                    data-toggle="modal" data-target="#popupEditTour">Edit Tour</button>
                </div> -->
                <div class="col-xs-offset-4 col-sm-offset-2 col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <button type="button" id="AddUser" class="btn btn-block btn-primary"
                    data-toggle="modal" data-target="#popupAddUser">Add user</button>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
    <table id="table" class="table table-bordered table-hover table-condensed">
        <tr>
            <th width="10%">No.</th>
            <th width="40%">Username</th>
            <th width="30%">Created</th>
            <th width="10%">Action</th>
        </tr>
        <?php $number = 1 ?>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $number++ ?></td>
            <td>
                <?= $user->username ?>
            </td>
            <td>
                <?= $user->created->format("d-M-Y") ?>
            </td>
            <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#popupRemoveUser">
                    <i class="fa fa-times" aria-hidden="true" ></i>
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </section>
</div>

<div class="modal fade" id="popupAddUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title color-model">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                <form role="form" method="post" action="/users/add">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputName">Username</label>
                            <input class="form-control" name="username" placeholder="Username" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAlias">Password</label>
                            <input class="form-control" name="password" placeholder="Password" type="password" required>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                    </div>
                </form>
            <!-- form end -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popupEditUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title color-model">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                <form role="form" method="post" action="/users/edit">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputName">Username</label>
                            <input class="form-control" name="username" placeholder="Username" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAlias">Password</label>
                            <input class="form-control" name="password" placeholder="Password" type="password" required>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                    </div>
                </form>
            <!-- form end -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popupRemoveUser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title color-model">Remove User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!-- form start -->
                <form role="form" method="post" action="/users/edit">
                    <div class="box-body">
                        Do you want to remove user?
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger pull-left">Yes</button>
                        <button type="submit" class="btn btn-success pull-right">No</button>
                    </div>
                </form>
            <!-- form end -->
            </div>
        </div>
    </div>
</div>
</body>
</html>