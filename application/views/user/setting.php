<a href="<?= base_url('home'); ?>" class="btn btn-outline-primary btn-sm mb-2 mt-4">
    <i class="fa fa-angle-left fa-fw" aria-hidden="true"></i> Back to home
</a>
<div class="row mt-1">
    <div class="col-lg-8 mb-5">
        <div class="card">
            <div class="card-body">
                <h3 class="h2">Statistic Info</h3>
                <hr class="bg-gray">

                <div class="alert alert-danger mt-5" role="alert">
                    <p class="mb-0">
                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i> No Statistic was Found.!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="user-information">
            <div class="card border-bottom-0">
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center">
                        <i class="fa fa-user-circle fa-fw fa-3x" aria-hidden="true"></i>
                        <div class="ml-2">
                            <h4 class="h4 mb-0 lead"><?= ucfirst($user['full_name']); ?></h4>
                            <span class="badge badge-light">
                                <?= $user['nickname']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('oauth/logout'); ?>" class="btn btn-sm btn-block btn-outline-primary rounded">
                <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Logout Account
            </a>
        </div>
        <div class="user-editInfo">
            <div class="card mt-3">
                <div class="card-header bg-white text-center">
                    <h4 class="h5 lead">Account Info</h4>
                </div>
                <div class="card-body">
                    <?php if ($user['identify'] !== 'real') : ?>
                        <div class="alert alert-warning mb-2" role="alert">
                            <p class="mb-0 small lead">
                                This is for a anonymous account !! if you want to make this a real account please edit your infomation.
                            </p>
                        </div>
                    <?php endif; ?>

                    <dl class="row">
                        <dt class="col-sm-4">Nickname</dt>
                        <dd class="col-sm-8"><?= $user['nickname']; ?></dd>
                        <dt class="col-sm-4">Identify</dt>
                        <dd class="col-sm-8">
                            <span class="badge badge-primary badge-pill">
                                <?= ucfirst(($user['identify'] !== 'real') ? explode('-', $user['identify'])[0] : $user['identify']); ?>
                            </span>
                        </dd>
                        <?php if ($user['identify'] !== 'real') : ?>
                            <dt class="col-sm-4">Password</dt>
                            <dd class="col-sm-8">
                                <a href="#">
                                    <i class="fa fa-eye fa-fw" aria-hidden="true"></i> show password
                                </a>
                            </dd>
                        <?php endif; ?>
                    </dl>

                    <a href="#" data-toggle="modal" data-target="#editUserInfo" class="mt-3 btn btn-warning btn-sm">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Edit Account
                    </a>
                    <a href="<?= base_url('user/delete'); ?>" class="mt-3 btn btn-outline-danger btn-sm">
                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i> Delete Account
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editUserInfo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form-signin" method="POST">
                    <div class="form-label-group">
                        <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Full Name" value="<?= $user['full_name'] ?>" autofocus autocomplete=" off" autocapitalize="off">
                        <span class="text-danger small"><?= form_error('fullName'); ?></span>
                        <label for="fullName">Full Name</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname" value="<?= $user['nickname'] ?>" autocomplete=" off" autocapitalize="off" readonly>
                        <span class="text-danger small"><?= form_error('nickname'); ?></span>
                        <label for="nickname">Nickname</label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" name="password" id="password" class="form-control reset-pass" placeholder="Password" readonly>
                        <span class="text-danger small"><?= form_error('password'); ?></span>
                        <label for="password">Password</label>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" class="pass-open"> Edit password ??
                        </label>
                    </div>
                    <span class="text-danger small">
                        <sup>*</sup> password must be at least 8 character.
                    </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>