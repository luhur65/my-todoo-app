<nav class="breadcrumb mt-3">
	<a class="breadcrumb-item" href="<?= base_url(); ?>">
		<i class="fa fa-home fa-fw" aria-hidden="true"></i> Home
	</a>
	<span class="breadcrumb-item active">
		<i class="fa fa-folder fa-fw" aria-hidden="true"></i> My Todoo
	</span>
</nav>
<div class="card mb-2">
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center">
			<h3 class="h3 font-weight-bold">My Todoo</h3>
			<a href="<?= base_url('newtodo'); ?>" class="btn btn-sm btn-outline-primary rounded">
				<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Create
			</a>
		</div>
	</div>
</div>
<!-- <form action="<?= base_url(); ?>" method="post">
	<div class="input-group">
		<input type="text" class="form-control" name="keyword" aria-describedby="helpId" placeholder="Search todoo ...">
		<div class="input-group-append">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-search fa-fw" aria-hidden="true"></i>
			</button>
		</div>
	</div>
	<small id="helpId" class="form-text text-muted">
		Type your keyword todoo from anything.
	</small>
</form> -->



<div class="my-tabs mt-4">
	<ul class="nav nav-tabs mb-1 border-bottom-0" data-tabs="tabs">
		<li class="nav-item mr-1 mb-1 border rounded">
			<a class="nav-link active show" href="#working" data-toggle="tab">
				<i class="fa fa-paper-plane fa-fw"></i> Working
				<?= showCountingBadge(count($workTodoo)); ?>
			</a>
		</li>
		<li class="nav-item mr-1 mb-1 border rounded">
			<a class="nav-link" href="#cancelled" data-toggle="tab">
				<i class="fa fa-times fa-fw" aria-hidden="true"></i> Cancelled
				<?= showCountingBadge(count($cancelTodoo)); ?>
			</a>
		</li>
		<li class="nav-item mr-1 mb-1 border rounded">
			<a class="nav-link" href="#accept" data-toggle="tab">
				<i class="fa fa-plus fa-fw" aria-hidden="true"></i> Accept
				<?= showCountingBadge(count($newTodoo)); ?>
			</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active show" id="working">
			<ul class="list-group mt-3 mb-3">
				<?= isEmptyTodoo($workTodoo, 'No Working Todoo Was Found, Please Work One Todoo'); ?>
				<?php foreach ($workTodoo as $work) : ?>
					<li class="list-group-item border-right-primary">
						<div class="little-info-todoo">
							<p class="font-weight-bold mb-0">
								<?= character_limiter($work['title'], 50, ' ...'); ?>
							</p>
							<p class="small">
								<span class="badge badge-<?= status($work['id_status']); ?>">
									<?= $work['status']; ?>
								</span>
								<span class="badge badge-<?= access($work['id_access']); ?>">
									<?= $work['access']; ?>
								</span>
							</p>
						</div>
						<div class="action d-flex justify-content-between align-items-center">
							<div>
								<a href="<?= base_url('mytodo/finish/' . $work['slug']); ?>" data-toggle="tooltip" data-placement="top" title="Todoo Finish ??" class="btn btn-outline-primary btn-sm mb-1">
									<i class="fa fa-check fa-fw" aria-hidden="true"></i>
								</a>
								<a href="<?= base_url('mytodo/cancel/' . $work['date_created']); ?>" data-toggle="tooltip" data-placement="right" title="Cancel this Todoo" class="btn btn-outline-dark btn-sm mb-1">
									<i class="fa fa-times fa-fw" aria-hidden="true"></i>
								</a>
							</div>
							<a href="<?= base_url('mytodo/remove/' . $work['date_created']); ?>" data-toggle="tooltip" data-placement="left" title="Remove Todoo" class="btn btn-outline-danger btn-sm mb-1 remove-todo">
								<i class="fa fa-trash fa-fw" aria-hidden="true"></i>
							</a>
						</div>
					</li>
					<a href="<?= base_url('mytodo/details/' . $work['slug']); ?>" class="page-link ml-0 border-top-0 mb-2">
						<span class="ml-2">Details Todoo...
							<i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
						</span>
					</a>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="tab-pane" id="cancelled">
			<ul class="list-group mt-3 mb-3">
				<?= isEmptyTodoo($cancelTodoo, 'No Cancelled Todoo Was Found.'); ?>
				<?php foreach ($cancelTodoo as $cancel) : ?>
					<li class="list-group-item border-right-primary">
						<div class="little-info-todoo">
							<p class="font-weight-bold mb-0">
								<?= character_limiter($cancel['title'], 50, ' ...'); ?>
							</p>
							<p class="small">
								<span class="badge badge-<?= status($cancel['id_status']); ?>">
									<?= $cancel['status']; ?>
								</span>
								<span class="badge badge-<?= access($cancel['id_access']); ?>">
									<?= $cancel['access']; ?>
								</span>
							</p>
						</div>
						<div class="action d-flex justify-content-between align-items-center">
							<a href="<?= base_url('mytodo/work/' . $cancel['date_created']); ?>" data-toggle="tooltip" data-placement="right" title="Working this Todoo" class="btn btn-outline-success btn-sm mb-1">
								<i class="fa fa-hand-rock-o fa-fw" aria-hidden="true"></i>
							</a>
							<a href="<?= base_url('mytodo/remove/' . $cancel['date_created']); ?>" data-toggle="tooltip" data-placement="left" title="Remove Todoo" class="btn btn-outline-danger btn-sm mb-1 remove-todo">
								<i class="fa fa-trash fa-fw" aria-hidden="true"></i>
							</a>
						</div>
					</li>
					<a href="<?= base_url('mytodo/details/' . $cancel['slug']); ?>" class="page-link ml-0 border-top-0 border-right-primary mb-2">
						<span class="ml-2">Details Todoo... <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
						</span>
					</a>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="tab-pane" id="accept">
			<ul class="list-group mt-3 mb-3">
				<?= isEmptyTodoo($newTodoo, 'No New Todoo Was Found, Please Create Todoo.') ?>
				<?php foreach ($newTodoo as $new) : ?>
					<li class="list-group-item border-right-primary mb-2">
						<div class="little-info-todoo">
							<p class="font-weight-bold mb-0"><?= character_limiter($new['title'], 30, ' ...'); ?>
							</p>
							<p class="small">
								<span class="badge badge-<?= access($new['id_access']); ?>"><?= $new['access']; ?></span>
								<span class="badge badge-<?= status($new['id_status']); ?>"><?= $new['status']; ?></span>
								<span class="badge badge-warning"><?= $new['nickname']; ?></span>
							</p>
						</div>
						<div class="action d-flex justify-content-between align-items-center">
							<div>
								<a href="<?= base_url('mytodo/work/' . $new['date_created']); ?>" data-toggle="tooltip" data-placement="top" title="Working this Todoo" class="btn btn-outline-success btn-sm mb-1">
									<i class="fa fa-hand-rock-o fa-fw" aria-hidden="true"></i>
								</a>
								<a href="" data-custom="tooltip" data-placement="right" title="Details Todoo" data-toggle="modal" data-target="#detailId<?= $new['id_todoo']; ?>" class="btn btn-outline-primary btn-sm mb-1">
									<i class="fa fa-eye fa-fw" aria-hidden="true"></i>
								</a>
							</div>
							<a href="<?= base_url('mytodo/remove/' . $new['date_created']); ?>" data-toggle="tooltip" data-placement="left" title="Remove Todoo" class="btn btn-outline-danger btn-sm mb-1 remove-todo">
								<i class="fa fa-trash fa-fw" aria-hidden="true"></i>
							</a>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<!-- Modal -->
<?php foreach ($newTodoo as $new) : ?>
	<div class="modal fade" id="detailId<?= $new['id_todoo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Details Todoo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<dl class="row">
						<dt class="col-sm-2">Title</dt>
						<dd class="col-sm-10"><?= $new['title']; ?></dd>
						<dt class="col-sm-2">Info</dt>
						<dd class="col-sm-10"><?= $new['info']; ?></dd>
						<dt class="col-sm-2">Status</dt>
						<dd class="col-sm-10">
							<span class="badge badge-<?= status($new['id_status']); ?>"><?= $new['status']; ?></span>
						</dd>
						<dt class="col-sm-2">Access</dt>
						<dd class="col-sm-10">
							<span class="badge badge-<?= access($new['id_access']); ?>"><?= $new['access']; ?></span>
						</dd>
						<dt class="col-sm-2">Created At</dt>
						<dd class="col-sm-10">
							<span class="badge badge-light"><?= getHumanDate($new['date_created']); ?></span>
							<span class="badge badge-light"><?= getHumanTime($new['date_created']); ?></span>
						</dd>
						<dt class="col-sm-2">Created By</dt>
						<dd class="col-sm-10">
							<?= $new['full_name']; ?>
						</dd>
					</dl>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>