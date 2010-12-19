<section class="jumbotron text-center bg-white">
	<div class="mt-5">
		<h1 class="greetings"><?= sayGreetings(); ?></h1>
		<h2 class="text-dark font-weight-light date-time"> <?= date('l, d M Y'); ?> </h2>
		<p class="small text-muted">
			<?= is_weekend(date('l')); ?>
		</p>
	</div>
</section>
<section class="mt-5">
	<h3 class="lead h3 text-center"> All Acomplished Todoo </h3>
	<p class="text-center small">Finish Your All Todoo ?? <a href="<?= base_url('mytodo'); ?>"> My Todoo </a></p>
	<div class="row">
		<?php if (empty($finishTodoo)) : ?>
			<div class="col-lg-7 mx-auto mb-3">
				<div class="alert alert-danger" role="alert">
					<p class="mb-0 text-center lead">
						No Acomplished Todoo Was Found
					</p>
				</div>
			</div>

		<?php endif; ?>
		<?php foreach ($finishTodoo as $ft) : ?>
			<div class="col-lg-7 mx-auto mb-3">
				<a href="<?= base_url('mytodo/details/' . $ft['slug']); ?>" class="text-decoration-none text-dark">
					<div class="card shadow border-right-primary">
						<div class="card-body">
							<div class="row">
								<div class="col-lg">
									<p class="card-text mb-0 font-weight-normal text-truncate text-dark lead">
										<i class="fa fa-check text-success" aria-hidden="true"></i>
										<?= $ft['title']; ?>
									</p>
									<p class="small mb-0 mt-0">
										<span class="badge badge-light">
											finished At : <?= getHumanDate($ft['date_finished']); ?>
										</span>
										<span class="float-right badge badge-light badge-pill">
											<?= getHumanTime($ft['date_finished']); ?>
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