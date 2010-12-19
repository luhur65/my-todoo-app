<div class="row">
    <div class="col-lg-5 mx-auto mt-5 py-5">
        <div class="card">
            <h1 class="h2 mb-3 mt-3 font-weight-normal text-center">Todoo App</h1>
            <p class="mb-1 text-center">
                Don't have any account ?? <a href="<?= base_url('oauth/new'); ?>">Register Here</a>.
            </p>
            <form action="<?= base_url('oauth/member'); ?>" class="form-signin" method="POST">
                <div class="form-label-group">
                    <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname" value="<?= set_value('nickname'); ?>" autofocus autocomplete=" off" autocapitalize="off">
                    <span class="text-danger small"><?= form_error('nickname'); ?></span>
                    <label for="nickname">Nickname</label>
                </div>

                <div class="form-label-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>">
                    <span class="text-danger small"><?= form_error('password'); ?></span>
                    <label for="password">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember"> Remember me
                    </label>
                </div>

                <button class="btn btn-primary btn-block mb-2" type="submit">Sign in</button>
                <div class="text-center mt-2">
                    <a href="<?= base_url('oauth/guest'); ?>">Login as Anonymous</a>
                </div>
            </form>
        </div>
    </div>
</div>