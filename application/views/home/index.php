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
	<h3 class="lead text-center mb-3"> Choose your plan </h3>
	<div class="row">
		<?php foreach ($navigation as $n) : ?>
			<div class="col-lg-7 mx-auto mb-3">
				<a href="<?= base_url($n['url']); ?>" class="text-decoration-none text-dark">
					<div class="card shadow navigation-card border-right-primary">
						<div class="card-body">
							<div class="d-flex justify-content-start align-items-center">
								<div class="icon-place mr-2">
									<i class="fa <?= $n['icon']; ?> fa-fw fa-3x" aria-hidden="true"></i>
								</div>
								<div class="info-place">
									<h4 class="card-title"><?= $n['title']; ?></h4>
									<p class="card-text small lead"><?= $n['info']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</section>