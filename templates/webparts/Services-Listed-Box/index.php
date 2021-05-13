<!--
Name: Services List Box
-->
<?php
$Services = $Core->ServicePages();
?>
<!-- SERVICES -->
<div class="section <?= ($i == 1) ? 'overlap' : '' ?> services">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<h2 class="section-heading  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-27" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 27, "SERVICES") ?></h2>
			</div>
		</div>

		<div class="row no-gutter">

			<?php while ($service = mysqli_fetch_object($Services)) : ?>
				<div class="col-sm-6 col-md-4">
					<div class="media"><img src="<?= $service->page_photo ?>" class="img-responsive"></div>
					<!-- BOX 1 -->
					<div class="box-icon-3">
						<div class="body-content">
							<div class="heading h1"><?= $service->menutitle ?></div>
							<span><?= $service->title ?></span>
							<a href="/pages/<?= $service->slug ?>" class="readmore">READ MORE</a>
						</div>
						<div class="line-b"></div>
					</div>
				</div>
			<?php endwhile; ?>

		</div>
	</div>
</div>