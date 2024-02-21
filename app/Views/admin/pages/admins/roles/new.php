<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <form id="updateForm" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <label for="inputrole_name">Role Name</label>
                                <input class="form-control" id="inputrole_name" type="text" name="role_name" value="" placeholder="Entry role name...!" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>View</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($role->permissions)) : $i = 0; ?>
                                        <?php foreach ($role->permissions as $permission) : ?>
                                            <tr>
                                                <td><?= ++$i ?></td>
                                                <td>
                                                    <span class="btn btn-sm disabled btn-outline-dark"><?= ucwords($permission->name) ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($permission->perm_view_exists) : ?>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="view-<?= $permission->id ?>" name="<?= "permissions[{$permission->key}][view]" ?>" value="1">
                                                            <label class="form-check-label" for="view-<?= $permission->id ?>"></label>
                                                        </div>
                                                    <?php endif ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($permission->perm_add_exists) : ?>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="add-<?= $permission->id ?>" name="<?= "permissions[{$permission->key}][add]" ?>" value="1">
                                                            <label class="form-check-label" for="add-<?= $permission->id ?>"></label>
                                                        </div>
                                                    <?php endif ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($permission->perm_edit_exists) : ?>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="edit-<?= $permission->id ?>" name="<?= "permissions[{$permission->key}][edit]" ?>" value="1">
                                                            <label class="form-check-label" for="edit-<?= $permission->id ?>"></label>
                                                        </div>
                                                    <?php endif ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($permission->perm_delete_exists) : ?>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="delete-<?= $permission->id ?>" name="<?= "permissions[{$permission->key}][delete]" ?>" value="1">
                                                            <label class="form-check-label" for="delete-<?= $permission->id ?>"></label>
                                                        </div>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6">No access assigned!</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                            <div class="row position-relative overflow-hidden">
                                <div id="spinner">
                                    <div class="position-absolute w-100 h-100 d-flex flex-column align-items-center bg-white justify-content-center rounded " style="opacity: 0.1; z-index:9999999999999999999999999999999999">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <p>How it works</p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" readonly>
                                        <label class="form-check-label"> Not Assign</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" checked readonly>
                                        <label class="form-check-label"> Assigned</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" checked readonly disabled>
                                        <label class="form-check-label"> Locked</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-primary" type="button">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>