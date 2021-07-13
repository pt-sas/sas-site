<div class="page-header">
	<h4 class="page-title"><?= $title ?></h4>
	<?php if($title != 'Dashboard') :?>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="<?= base_url('/backend') ?>">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a><?= $title ?></a>
			</li>
		</ul>
	<?php else  : ?>

	<?php endif ?>
</div>
