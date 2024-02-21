<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title ?></h4>
                        <?php if ($permission->hasPermission('admins', 'add')) : ?>
                            <a href="<?= base_url(uri_segements([1, 2], 'new')) ?>" type="button" class="btn light btn-info">Add New</a>
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($admins) :
                                        $status = ['pending verification' => 'warning', 'pending' => 'warning', 'active' => 'success', 'blocked' => 'danger', 'suspended' => 'info'];
                                    ?>
                                        <?php foreach ($admins as $row) : ?>
                                            <tr>
                                                <td><?= $row->id ?></td>
                                                <td><img class="img-thumbnail" src="<?= base_url(image("public/uploads/admins/", $row->image)) ?>" alt="<?= $row->full_name ?>" width="70" height="70"></td>
                                                <td><?= "{$row->full_name}" ?></td>
                                                <td><?= "{$row->full_address}" ?></td>
                                                <td><?= "{$row->email}" ?></td>
                                                <td><?= "{$row->phone}" ?></td>
                                                <td><span class="badge badge-rounded badge-outline-dark"><?= strtoupper($row->role_name) ?></span></td>
                                                <td><span class="badge badge-rounded badge-outline-<?= $status[strtolower($row->status)] ?>"><?= strtoupper($row->status) ?></span></td>
                                                <td>
                                                    <p>
                                                        <?php if ($row->id !== $session->get('admin_id')) : ?>
                                                            <?php if ($permission->hasPermission('admins', 'edit')) : ?>
                                                                <a href="<?= base_url(uri_segements([1, 2], "edit/{$row->id}")) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                                            <?php endif ?>
                                                        <?php else : ?>
                                                            <a href="<?= base_url(route_to('admin_profile')) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                                        <?php endif ?>
                                                    </p>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No item available</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>

                                <?php if ($pager->links()) : ?>
                                    <tfoot>
                                        <tr class="text-center">
                                            <td colspan="8">
                                                <?= $pager->links('default', 'admin_full') ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                <?php endif ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>