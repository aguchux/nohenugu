<!--
     Name: Row with image on the left, title and content 
-->


<section id="info-3" class="bg-blue info-section division <?= ($i==1)?'overlap':'' ?>">
				<div class="container">
				 	<div class="row d-flex align-items-center">


				 		<!-- INFO IMAGE -->
						<div class="col-lg-6">
							<div class="info-3-img text-center">
								<img class="img-fluid <?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-1" ?>" data-type="img" src="<?= $Core->getCMS($PageInfo->id, $page_part->id, 1, "{$asset}website\images\medical_complex_700x700.jpg") ?>" alt="info-image">
					 		</div>
						</div>


					 	<!-- INFO TEXT -->
					 	<div class="col-lg-6">
					 		<div class="txt-block pc-30 white-color wow fadeInUp" data-wow-delay="0.4s">

					 			<!-- Section ID -->	
					 			<span class="section-id id-color <?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 2, "Highest Quality Care") ?></span>

								<!-- Title -->
								<h3 class="h3-md <?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 3, "Solutions to Complex Medical Problems") ?></h3>

								<!-- Text -->
								<p class="<?= $Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-4" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 4, "An enim nullam tempor sapien gravida donec pretium ipsum  porta justo integer at  odio velna vitae auctor integer congue magna purus pretium ligula rutrum luctus ultrice aliquam a augue suscipit. Augue egestas volutpat egestas augue in cubilia laoreet magna") ?>
								</p>		
					 		</div>
					 	</div>	  <!-- END CONTENT TEXT -->


				 	</div>	   <!-- End row -->	
			 	</div>	   <!-- End container -->
			</section>	<!-- END INFO-3 -->
