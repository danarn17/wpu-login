
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row">
                <div class="col-lg-6">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                
                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRole">Add New Role</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($role as $r) :?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning" >ACCESS</a>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#editMenu<?= $i; ?>">EDIT</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteMenu<?= $i; ?>">DELETE</a>
                            </td>
                        </tr>
                        <!-- Modal Edit dan Delete -->
                        <div class="modal fade" id="editMenu<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenu<?= $i; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editMenu">Edit Menu</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="<?= base_url('menu'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="editmenu" id="editmenu" value="<?= $m['menu']; ?>" placeholder="Edit Menu Name">
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                                                <button class="btn btn-primary" type="submit" >Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- delete -->
                        <div class="modal fade" id="deleteMenu<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteMenu<?= $i; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editMenu">Delete Menu</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="<?= base_url('menu/hapus/'); ?><?= $m['id']; ?>" method="post">
                                        <div class="modal-body">
                                            <p>Anda yakin akan menghapus menu <?= $m['menu']; ?> ? </p>
                                        </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                                                <button class="btn btn-primary" type="submit" >Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Modal -->
    
    <!-- Add Modal-->
    <div class="modal fade" id="newRole" tabindex="-1" role="dialog" aria-labelledby="newRole" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="newRole">Add New Role</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="role" id="role" placeholder="Menu Role">
                    </div>
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                        <button class="btn btn-primary" type="submit" >Add</button>
                </div>
            </form>
        </div>
        </div>
    </div>