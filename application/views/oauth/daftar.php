<div class="row">
    <div class="col-lg-5 mx-auto mt-5 py-5">
        <div class="card">
            <h1 class="h2 mb-3 mt-3 font-weight-normal text-center">Todoo App</h1>
            <p class="mb-1 text-center">
                Already have any account ?? <a href="<?= base_url('oauth'); ?>">Login Here</a>.
            </p>
            <form action="" class="form-signin" method="POST">

                <div class="form-label-group">
                    <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Full Name" autofocus autocomplete="off" autocapitalize="off" value="<?= set_value('fullName'); ?>">
                    <span class=" text-danger small"><?= form_error('fullName'); ?></span>
                    <label for="fullName">Full Name</label>
                </div>
                <div class="form-label-group">
                    <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname" autofocus autocomplete="off" autocapitalize="off" value="<?= set_value('nickname'); ?>">
                    <span class="text-danger small"><?= form_error('nickname'); ?></span>
                    <label for="nickname">Nickname</label>
                </div>

                <div class="form-label-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>">
                    <span class="text-danger small"><?= form_error('password'); ?></span>
                    <label for="password">Password</label>
                </div>
                <div class="form-label-group">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="<?= set_value('confirm_password'); ?>">
                    <span class="text-danger small"><?= form_error('confirm_password'); ?></span>
                    <label for="password">Confirm Password</label>
                </div>

                <button class="btn btn-primary btn-block mb-2" type="submit">Register</button>
                <div class="text-center mt-2">
                    <a href="<?= base_url('oauth/guest'); ?>">Login as Anonymous</a>
                </div>
            </form>
        </div>
    </div>
</div>