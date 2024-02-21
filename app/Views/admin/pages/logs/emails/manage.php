<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title ?></h4>
                        <?php if ($permission->hasPermission('email_logs', 'delete')) : ?>
                            <form id="deleteForm" class="float-end">
                                <button type="button" class="btn light btn-danger" data-delete-url="<?= base_url("{$uri->getSegment(1)}/{$uri->getSegment(2)}/delete_all") ?>">Clear All <i class="la la-trash"></i></button>
                            </form>
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table patient-activity">
                                <?php if ($query) : ?>
                                    <?php foreach ($query as $row) : ?>
                                        <tr>
                                            <td><?= $row->id ?></td>
                                            <td class="text-break" style="width: 12rem;"><?= isset($row->first_name) ? "<a href='" . base_url("{$uri->getSegment(1)}/users/view/{$row->user_id}") . "'>{$row->first_name} {$row->last_name}</a>" : 'N/A' ?></td>
                                            <td class="text-break" style="width: 12rem;"><?= $row->recipient ?></td>
                                            <td class="text-break" style="width: 12rem;"><?= $row->subject ?></td>
                                            <td><?= date("d M, Y H:i", strtotime($row->created_at)) ?></td>
                                            <td><?= input_print($row->status_message) ?></td>
                                            <td>
                                                <span class="badge badge-lg light badge-<?= (strtolower($row->status) == 'delivered') ? 'success' : 'danger' ?>"><?= ucwords($row->status) ?></span>
                                            </td>
                                            <td>
                                                <p>
                                                <form id="deleteForm">


                                                    <span class="btn btn-primary btn-sm view-email" data-title="<?= $row->subject ?>" data-email="<<?= "{$row->first_name} {$row->last_name}" ?>> <?= $row->recipient ?>" data-date="<?= date("d M, Y h:i:s A", strtotime($row->created_at)) ?>" data-status-message="<?= input_print($row->status_message) ?>" data-status="<?= ucwords($row->status) ?>" data-url="<?= base_url("{$uri->getSegment(1)}/{$uri->getSegment(2)}/email/view/{$row->id}") ?>" data-id="<?= $row->id ?>" data-bs-toggle="modal" data-bs-target="#modal-email-view"><i class="la la-eye"></i></span>

                                                    <?php if ($permission->hasPermission('email_logs', 'edit')) : ?>
                                                        <span class="btn btn-sm btn-danger resend-email" data-email="<?= $row->recipient ?>" data-url="<?= base_url("{$uri->getSegment(1)}/{$uri->getSegment(2)}/email/resend/{$row->id}") ?>"><i class="la la-history"></i></span>
                                                    <?php endif ?>

                                                    <?php if ($permission->hasPermission('email_logs', 'delete')) : ?>
                                                        <button type="button" class="btn btn-sm btn-danger" data-delete-url="<?= base_url("{$uri->getSegment(1)}/{$uri->getSegment(2)}/delete_email/{$row->id}") ?>"><i class="la la-trash"></i></button>
                                                    <?php endif ?>
                                                </form>
                                                </p>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No log available</td>
                                    </tr>
                                <?php endif ?>
                                <?php if ($pagination) : ?>
                                    <tfoot>
                                        <tr class="text-center">
                                            <td colspan="8"><?= $pagination ?></td>
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

<div class="modal fade" id="modal-email-view" tabindex="-1" aria-labelledby="modal-email-viewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <div class="row">
                        <h5 class="modal-title" id="modal-email-viewLabel"></h5>
                    </div>
                    <div class="row">
                        <small><span class="modal-email"></span> - <span class="modal-date"></span></small>
                    </div>
                </div>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <div class="col-lg-3 mx-auto">
                    <div class="d-grid gap-2 mx-auto">
                        <span class="btn btn-lg btn-outline-success disabled">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Fetching...
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.view-email').on('click', function() {
            $("#modal-email-view").modal("show");
            $(".modal-title").text($(this).attr('data-title'));
            $(".modal-email").text($(this).attr('data-email'));
            $(".modal-date").text($(this).attr('data-date'));
            $(".modal-status").text($(this).attr('data-status'));
            $(".modal-status-message").text($(this).attr('data-status-message'));
            $.ajax({
                type: "POST",
                url: $(this).attr('data-url'),
                data: {
                    id: $(this).attr('data-id')
                },
                beforeSend: function() {
                    $(".modal-body").html(`
                        <div class="col-lg-3 mx-auto">
                            <div class="d-grid gap-2 mx-auto">
                                <span class="btn btn-lg btn-outline-success disabled">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Fetching...
                                </span>
                            </div>
                        </div>
                    `);
                },
                success: function(data) {
                    $(".modal-body").html(data);
                }
            });
        })
    })
</script>

<?php
if ($permission->hasPermission('email_logs', 'edit')) :
    set_custom_footer("
<script>
    $('.resend-email').on('click', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: `You want resend email to: \${\$(this).attr('data-email')}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, resend it!'
        }).then((result) => {
            if (result.value) {
                do_ajax($(this).attr('data-url'))
            }
        })
    });
</script>

");
endif
?>