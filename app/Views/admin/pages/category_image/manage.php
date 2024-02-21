<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container row">
                            <div class="col-md-10">
                                <form action="<?= current_url() ?>" method="get">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="search"
                                                    placeholder="Enter search..."
                                                    value="<?= esc($request->getGet('search')) ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select class="form-control" name="cat_id">
                                                    <option value="">Select Category</option>
                                                    <?php if ($categories): ?>
                                                        <?php foreach ($categories as $row): ?>
                                                            <option value="<?= esc($row->id) ?>"
                                                                <?= ($request->getGet('cat_id') == $row->id) ? 'selected' : '' ?>>
                                                                <?= esc($row->name) ?>
                                                            </option>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <button type="submit" class="btn light btn-success btn-sm">Search</button>
                                            <a href="<?= base_url(uri_segements([1, 2])) ?>" type="button"
                                                class="btn light btn-danger btn-sm">Reset</a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 mt-2">
                                <?php if ($permission->hasPermission('category_images', 'add')): ?>
                                    <a href="<?= base_url(uri_segements([1, 2], 'new')) ?>" type="button"
                                        class="btn light btn-info float-right">Add New</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
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
                                                <td><img src="<?= base_url(image("/public/uploads/images/floors/", $row->image, false)) ?>"
                                                        alt="<?= esc($row->name) ?>" class="img-thumbnail"
                                                        style="height: 100px;width: 100px;"></td>
                                                <td>
                                                    <?= esc($row->name) ?>
                                                </td>
                                                <td>
                                                    <?= esc($row->category_name) ?>
                                                </td>
                                                <td><span
                                                        class="badge badge-rounded badge-outline-<?= $status[strtolower($row->category_status)] ?>">
                                                        <?= strtoupper($row->category_status) ?>
                                                    </span></td>
                                                <td>
                                                    <p>
                                                        <?php if ($permission->hasPermission('category_images', 'edit')): ?>
                                                            <a href="<?= base_url(uri_segements([1, 2], "edit/{$row->id}")) ?>"
                                                                class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                                        <?php endif ?>
                                                        <?php if ($permission->hasPermission('category_images', 'delete')): ?>
                                                            <a href="<?= base_url(uri_segements([1, 2], "delete/{$row->id}")) ?>"
                                                                class="btn btn-xs btn-danger delete-item"><i
                                                                    class="fa fa-trash"></i></a>
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