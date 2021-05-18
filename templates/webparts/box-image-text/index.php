
<!-- 
    Name: Row with image, title and content
-->



<section id="info-2" class="wide-60 info-section division <?= ($i==1)?'overlap':'' ?>">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->	
						<div class="col-lg-6">
							<div class="txt-block pc-30 mb-40 wow fadeInUp" data-wow-delay="0.4s">

								<!-- Section ID -->	
					 			<span class="section-id blue-color <?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 1, "Best Practices") ?></span>

								<!-- Title -->
								<h3 class="h3-md steelblue-color <?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 2, "Clinic with Innovative Approach to Treatment") ?></h3>

								<!-- Text -->
								<p class="mb-30 <?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 3, "An enim nullam tempor sapien gravida donec enim ipsum blandit
								   porta justo integer odio velna vitae auctor integer congue magna at pretium 
								   purus pretium ligula rutrum itae laoreet augue posuere and curae integer 
								   congue leo metus mollis primis and mauris") ?>
								</p>	
							</div>
						</div>	<!-- END TEXT BLOCK -->	


						<!-- IMAGE BLOCK -->
						<div class="col-lg-6">
							<div class="info-2-img wow fadeInUp" data-wow-delay="0.6s">
								<img class="img-fluid <?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-4" ?>" data-type="img" src="<?= $Core->getCMS($PageInfo->id, $page_part->id, 4, "{$assets}website\images\image-04.png") ?>" alt="info-image">
							</div>
						</div>		
					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END INFO-2 -->		
