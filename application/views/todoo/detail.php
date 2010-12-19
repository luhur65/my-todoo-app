<div class="mt-0 mb-4">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="<?= base_url(); ?>">
            <i class="fa fa-home fa-fw" aria-hidden="true"></i> Home
        </a>
        <a class="breadcrumb-item" href="<?= base_url('mytodo'); ?>">
            <i class="fa fa-folder fa-fw" aria-hidden="true"></i> My Todoo
        </a>
        <span class="breadcrumb-item active">
            <i class="fa fa-eye fa-fw" aria-hidden="true"></i> Details Todoo
        </span>
    </nav>
</div>

<div class="card p-3 border-left-dark">
    <div class="top d-flex justify-content-between align-items-baseline">
        <div class="section-title-info">
            <h1 class="h2 font-weight-bold text-dark"><?= $todo['title']; ?></h1>
            <?php

            $tags = explode('-', $todo['slug']);
            foreach ($tags as $tag) {
                echo '<span class="badge badge-light mb-2">
                        <i class="fa fa-hashtag fa-fw" aria-hidden="true"></i> ' . $tag . '
                    </span>';
            }

            ?>
            <p class="lead mt-0"><?= $todo['info']; ?></p>
        </div>
        <a href="<?= base_url('mytodo/edit/' . $todo['slug']); ?>" class="btn btn-rounded btn-outline-primary mb-2 btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit Your Todoo">
            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
        </a>

    </div>
    <div class="mt-4">
        <?php if ($todo['id_status'] !== '1') : ?>
            <a href="<?= base_url('mytodo/remove/' . $todo['date_created']); ?>" class="btn btn-rounded btn-outline-danger remove-todo btn-sm">
                <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
                Remove Todo
            </a>
        <?php endif ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
            See info this todo
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details Info Todoo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mt-2">
                    <dl class="row">
                        <dt class="col-sm-3"> Created By </dt>
                        <dd class="col-sm-9">
                            <?= $todo['full_name']; ?>
                        </dd>
                        <dt class="col-sm-3"> Status Todoo </dt>
                        <dd class="col-sm-9">
                            <span class="badge badge-<?= status($todo['id_status']); ?>">
                                <?= $todo['status']; ?>
                            </span> /
                            <span class="badge badge-<?= access($todo['id_access']); ?>">
                                <?= $todo['access']; ?>
                            </span>
                        </dd>
                        <dt class="col-sm-3"> Date Created </dt>
                        <dd class="col-sm-9">
                            <?= getHumanDate($todo['date_created']); ?>
                        </dd>
                        <dt class="col-sm-3"> Time Created </dt>
                        <dd class="col-sm-9">
                            <?= getHumanTime($todo['date_created']); ?>
                        </dd>
                        <?php if ($todo['id_status'] === '1') : ?>
                            <dt class="col-sm-3"> Date Finished </dt>
                            <dd class="col-sm-9">
                                <?= getHumanTime($todo['date_finished']); ?>
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