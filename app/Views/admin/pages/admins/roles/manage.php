<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title ?></h4>
                        <?php if ($permission->hasPermission('admin_roles', 'add')) : ?>
                            <a href="<?= base_url(uri_segements([1, 2], 'new')) ?>" type="button" class="btn light btn-info">Add New</a>
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Permission Name</th>
                                        <th>View</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($admin_roles) : $i = 0;  ?>
                                        <?php foreach ($admin_roles as $key => $role) : ?>
                                            <tr>
                                                <td><?= ++$i; ?></td>
                                                <td>
                                                    <?php print($key) ?>
                                                </td>
                                                <td colspan="5" class="text-center"></td>
                                                <td>
                                                    <?php if ($permission->hasPermission('admin_roles', 'edit')) : ?>
                                                        <a href="<?= base_url(uri_segements([1, 2], "edit/{$role->id}")) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php foreach ($role->permissions as $key => $row) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <?php
                                                    $perm_add = ($row->perm_add) ? 'fa fa-check text-success' : 'fa fa-times text-danger';
                                                    $perm_view = ($row->perm_view) ? 'fa fa-check text-success' : 'fa fa-times text-danger';
                                                    $perm_edit = ($row->perm_edit) ? 'fa fa-check text-success' : 'fa fa-times text-danger';
                                                    $perm_delete = ($row->perm_delete) ? 'fa fa-check text-success' : 'fa fa-times text-danger';
                                                    ?>
                                                    <td>
                                                        <span class="btn btn-xs disabled btn-outline-dark"><?= ucwords($row->name) ?></span>
                                                    </td>
                                                    <td>
                                                        <?php if ($row->perm_view_exists) : ?>
                                                            <i class="<?= $perm_view ?>" aria-hidden="true"></i>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row->perm_add_exists) : ?>
                                                            <i class="<?= $perm_add ?>" aria-hidden="true"></i>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row->perm_edit_exists) : ?>
                                                            <i class="<?= $perm_edit ?>" aria-hidden="true"></i>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row->perm_delete_exists) : ?>
                                                            <i class="<?= $perm_delete ?>" aria-hidden="true"></i>
                                                        <?php endif ?>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No access available</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>