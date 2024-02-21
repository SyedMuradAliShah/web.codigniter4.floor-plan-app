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
                            <form class="form-valid" action="#" method="post" id="add-form">
                                <div class="row p-2">
                                    <div class="col-md m-2 align-self-center">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type="file" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url('<?= base_url(image("/public/uploads/images/floors/", 'no-image.png')) ?>');">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 mx-auto">
                                        <div class="form-group col-md-12">
                                            <label>Category <span class="text-danger">*</span></label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option value="" selected disabled>Select Category</option>
                                                <?php if ($categories) : ?>
                                                    <?php foreach ($categories as $category) : ?>
                                                        <option value="<?= $category->id ?>"><?= esc($category->name) ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 mx-auto">
                                        <div class="form-group col-md-12">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter image name.." value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2 mx-auto">
                                        <button type="button" id="submitBtn" class="btn btn-primary">Save</button>
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