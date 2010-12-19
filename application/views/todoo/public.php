<section class="mt-5">
    <h3 class="h2 text-center mb-3"> All Public Todoo </h3>
    <div class="row">
        <?php if (empty($public)) : ?>
            <div class="col-lg-7 mx-auto mb-3">
                <div class="alert alert-danger" role="alert">
                    <p class="mb-0 text-center lead">
                        No Public Todoo Was Found
                    </p>
                </div>
            </div>

        <?php endif; ?>
        <?php
        foreach ($public as $pb) : ?>
            <div class="col-lg-7 mx-auto mb-3">
                <a data-toggle="modal" data-target="#<?= $pb['slug']; ?>" href="#" class="text-decoration-none text-dark">
                    <div class="card shadow border-right-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg">
                                    <p class="card-text mb-0 font-weight-normal text-truncate text-dark lead">
                                        <i class="fa fa-check text-success" aria-hidden="true"></i>
                                        <?= $pb['title']; ?>
                                    </p>
                                    <p class="small mb-0 mt-0">
                                        <span class="badge badge-light">
                                            finished At : <?= getHumanDate($pb['date_finished']); ?>
                                        </span>
                                        <span class="float-right badge badge-light badge-pill">
                                            <?= getHumanTime($pb['date_finished']); ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        <div class="col-lg-7 mx-auto mb-3">
            <a href="<?= base_url(); ?>" class="btn btn-outline-dark btn-sm">
                <i class="fa fa-angle-left" aria-hidden="true"></i> Back to home
            </a>
        </div>
    </div>
</section>

<?php foreach ($public as $pb) : ?>
    <!-- Modal -->
    <div class="modal fade" id="<?= $pb['slug']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Todoo detail info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-2">
                        <dl class="row">
                            <dt class="col-sm-4"> Title </dt>
                            <dd class="col-sm-8">
                                <?= $pb['title']; ?>
                            </dd>
                            <dt class="col-sm-4"> Info </dt>
                            <dd class="col-sm-8">
                                <?= $pb['info']; ?>
                            </dd>
                            <dt class="col-sm-4"> Created By </dt>
                            <dd class="col-sm-8">
                                <?= $pb['full_name']; ?>
                            </dd>
                            <dt class="col-sm-4"> Status Todoo </dt>
                            <dd class="col-sm-8">
                                <span class="badge badge-<?= status($pb['id_status']); ?>">
                                    <?= $pb['status']; ?>
                                </span>
                                <span class="badge badge-<?= access($pb['id_access']); ?>">
                                    <?= $pb['access']; ?>
                                </span>
                            </dd>
                            <dt class="col-sm-4"> Date Created </dt>
                            <dd class="col-sm-8">
                                <?= getHumanDate($pb['date_created']); ?>
                            </dd>
                            <dt class="col-sm-4"> Time Created </dt>
                            <dd class="col-sm-8">
                                <?= getHumanTime($pb['date_created']); ?>
                            </dd>
                            <?php if ($pb['id_status'] === '1') : ?>
                                <dt class="col-sm-4"> Date Finished </dt>
                                <dd class="col-sm-8">
                                    <?= getHumanTime($pb['date_finished']); ?>
                                </dd>
                            <?php endif ?>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close info</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>