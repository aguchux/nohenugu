<!--
Name: Three Features Points
-->
<div class="bg-white border-bottom-2 py-16pt py-sm-24pt py-md-32pt ">
	<div class="container page__container">
		<div class="row align-items-center">
			<div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
				<div class="rounded-circle bg-danger w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
					<i class="material-icons text-white">subscriptions</i>
				</div>
				<div class="flex">
					<p class="mb-0"><strong class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 1, "Over 100+ Courses") ?></strong></p>
					<p class="text-black-70 mb-0  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-2" ?>" data-type="html"><?= $Core->getCMS($PageInfo->id, $page_part->id, 2, "Explore a wide range of studies.") ?></p>
				</div>
			</div>
			<div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
				<div class="rounded-circle bg-danger w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
					<i class="material-icons text-white">verified_user</i>
				</div>
				<div class="flex">
					<p class="mb-0"><strong class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 3, "By Industry Experts") ?></strong></p>
					<p class="text-black-70 mb-0  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-4" ?>" data-type="html"><?= $Core->getCMS($PageInfo->id, $page_part->id, 4, "Professional teachings from the best people.") ?></p>
				</div>
			</div>
			<div class="d-flex col-md align-items-center">
				<div class="rounded-circle bg-danger w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
					<i class="material-icons text-white">update</i>
				</div>
				<div class="flex">
					<p class="mb-0"><strong class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-5" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 5, "Unlimited Access") ?></strong></p>
					<p class="text-black-70 mb-0  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-6" ?>" data-type="html"><?= $Core->getCMS($PageInfo->id, $page_part->id, 6, "Unlock Library and learn any topic with one subscription.") ?></p>
				</div>
			</div>
		</div>
	</div>
</div>