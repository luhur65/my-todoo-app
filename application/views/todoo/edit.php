<div class="row pt-4">
	<div class="col-lg-5 mx-auto">
		<h3 class="h3 mb-3 text-center mt-3">Edit Todoo</h3>
		<p class="mb-1 text-center">
			Already have todoo ?? See <a href="<?= base_url('mytodo'); ?>">My Todoo</a>
		</p>
		<div class="card pb-0">
			<div class="card-body">
				<form action="" method="post" class="">
					<div class="form-label-group">
						<input type="text" name="title" id="title" class="form-control" placeholder="Todoo Title" value="<?= set_value('title', $todo['title']); ?>" autofocus autocomplete=" off">
						<span class="text-danger small"><?= form_error('title'); ?></span>
						<label for="title">Todoo Title</label>
					</div>
					<div class="form-label-group">
						<textarea name="info" id="info" class="form-control" cols="20" rows="5"><?= set_value('info', $todo['info']); ?></textarea>
						<span class="text-danger small"><?= form_error('info'); ?></span>
					</div>
					<div class="form-group">
						<select name="accessibility" class="form-control">
							<option value="1" <?= ($todo['id_access'] == 1) ? 'selected' : '' ?>>Private Todoo</option>
							<option value="2" <?= ($todo['id_access'] == 2) ? 'selected' : '' ?>>Public Todoo</option>
						</select>
						<span class="info-text-access text-info small">
							<?php if ($todo['id_access'] == 1) : ?>
								Nobody else know your todoo , just only for you.
							<?php elseif ($todo['id_access'] == 2) : ?>
								Other people can see your todo.
							<?php endif ?>
						</span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">
							Edit this todoo
						</button>
					</div>
				</form>
			</div>
		</div>
		<a href="<?= base_url('home'); ?>" class="mt-2 btn btn-outline-danger btn-sm">
			<i class="fa fa-angle-left" aria-hidden="true"></i> Back to home
		</a>
	</div>
</div>