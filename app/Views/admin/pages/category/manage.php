<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <?= $title ?>
                        </h4>
                        <?php if ($permission->hasPermission('categories', 'add')): ?>
                            <a href="<?= base_url(uri_segements([1, 2], 'new')) ?>" type="button"
                                class="btn light btn-info">Add New</a>
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result):
                                        $i = 0;
                                        $status = ['pending verification' => 'warning', 'pending' => 'warning', 'active' => 'success', 'in active' => 'danger', 'blocked' => 'danger', 'suspended' => 'info'];
                                        ?>
                                        <?php foreach ($result as $row): ?>
                                            <tr>
                                                <td>
                                                    <?= ++$i ?>
                                                </td>
                                                <td><img src="<?= base_url(image("/public/uploads/images/categories/", $row->image, false)) ?>"
                                                        alt="<?= esc($row->name) ?>" class="img-thumbnail"
                                                        style="height: 100px;width: 100px;"></td>
                                                <td><a href="<?= base_url(uri_segements([1], 'category-images')."?cat_id={$row->id}") ?>">
                                                        <?= esc($row->name) ?>
                                                    </a></td>
                                                <td><span
                                                        class="badge badge-rounded badge-outline-<?= $status[strtolower($row->status)] ?>">
                                                        <?= strtoupper($row->status) ?>
                                                    </span></td>
                                                <td>
                                                    <p>
                                                        <?php if ($permission->hasPermission('categories', 'edit')): ?>
                                                            <a href="<?= base_url(uri_segements([1, 2], "edit/{$row->id}")) ?>"
                                                                class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                                        <?php endif ?>
                                                    </p>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No item available</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>

                                <?php if ($pager->links()): ?>
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