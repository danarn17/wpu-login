
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row">
                <div class="col-lg">

                <?php if(validation_errors() ) : ?>
                <div class="alert alert-danger" role="alert" >
                    <?= validation_errors();  ?>
                </div>
                <?php endif; ?>


                <?= $this->session->flashdata('message'); ?>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenu">Add New Submenu</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">URL</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($subMenu as $sm) :?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#editSubMenu<?= $i; ?>">EDIT</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteSubMenu<?= $i; ?>">DELETE</a>
                            </td>
                        </tr>
                        <!-- Modal Edit dan Delete -->
                        <div class="modal fade" id="editSubMenu<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenu<?= $i; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSubMenu">Edit SubMenu</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="<?= base_url('menu/edit_submenu/'); ?><?= $sm['id']; ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" id="menu" value="<?= $sm['title']; ?>" placeholder="Edit SubMenu Name">
                                            </div>
                                            <div class="form-group">
                                                <select name="menu_id" id="menu_id" class="form-control">
                                                    <option value="<?= $sm['menu_id']; ?>">===Select Menu===</option>
                                                    <?php foreach($menu as $m) : ?>
                                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="url" id="url" value="<?= $sm['url']; ?>" placeholder="Submenu URL">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="icon" id="icon" value="<?= $sm['icon']; ?>" placeholder="Submenu Icon">
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                <?php 
                                                    if($sm['is_active'] == 1){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                ?>
                                                    <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" <?= $check; ?>>
                                                    <label class="form-check-label" for="is_active">
                                                        Active?
                                                    </label>
                                                </div>
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
                        <div class="modal fade" id="deleteSubMenu<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteSubMenu<?= $i; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteSubmenu">Delete Submenu</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="<?= base_url('menu/hapus_submenu/'); ?><?= $sm['id']; ?>" method="post">
                                        <div class="modal-body">
                                            <p>Anda yakin akan menghapus submenu <?= $sm['title']; ?> ? </p>
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
    <div class="modal fade" id="newSubMenu" tabindex="-1" role="dialog" aria-labelledby="addSubMenu" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addSubMenu">Add New Submenu</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="menu" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">===Select Menu===</option>
                            <?php foreach($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="url" id="url" placeholder="Submenu URL">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Submenu Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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