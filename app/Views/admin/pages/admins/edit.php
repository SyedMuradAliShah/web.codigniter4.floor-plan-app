<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="#" method="post" id="update-form">
                                <div class="row p-2">
                                    <div class="col-md m-2 align-self-center">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type="file" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url('<?= base_url(image("/public/uploads/admins/", $admin->image)) ?>');">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Full Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter a first name.." value="<?= $admin->full_name ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Status <span class="text-danger">*</span></label>
                                                <select class="form-control" id="status" name="status">
                                                    <option disabled selected>Please select</option>
                                                    <option value="active" <?= ($admin->status == "active") ? "selected" : "" ?>>Active</option>
                                                    <option value="suspended" <?= ($admin->status == "suspended") ? "selected" : "" ?>>Suspended</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Role <span class="text-danger">*</span></label>
                                                <select class="form-control" id="role" name="role_id">
                                                    <option disabled selected>Please select</option>
                                                    <?php if ($roles) : ?>
                                                        <?php foreach ($roles as $role) : ?>
                                                            <option value="<?= $role->id ?>" <?= ($role->id == $admin->role_id) ? "selected" : "" ?>><?= $role->name ?></option>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter valid email.." value="<?= $admin->email ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="<?= $admin->phone ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="full_address" name="full_address" placeholder="Enter valid full address.." value="<?= $admin->full_address ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-7 ml-auto">
                                                <button type="button" id="submitBtn" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>