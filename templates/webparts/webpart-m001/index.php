<!--
	Name: Three profiles in a row, with image and details 
-->
			<section id="doctors-3" class="bg-lightgrey <?= ($i==1)?'overlap':''?> wide-60 doctors-section division">
				<div class="container">
					<div class="row">


						<!-- DOCTOR #1 -->
						<div class="col-md-6 col-lg-4">
							<div class="doctor-2">	

								<!-- Doctor Photo -->
								<div class="hover-overlay"> 
									<img class="img-fluid <?=$Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-1" ?>" data-type="img" src="<?= $Core->getCMS($PageInfo->id, $page_part->id, 1, "{$assets}website\images\doctor-1.jpg") ?>" alt="doctor-foto">	
								</div>								
														
								<!-- Doctor Meta -->		
								<div class="doctor-meta">

									<h5 class="h5-xs blue-color <?=$Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 2, "Jonathan Barnes D.M.") ?></h5>
									<span class="<?= $Core->Editable()?>" id="<?= "{$PageInfo->id}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 3, "Chief Medical Officer") ?></span>
								</div>	
							</div>								
						</div>	<!-- END DOCTOR #1 -->
						
						
						<!-- DOCTOR #2 -->
						<div class="col-md-6 col-lg-4">
							<div class="doctor-2">	

								<!-- Doctor Photo -->
								<div class="hover-overlay"> 
									<img class="img-fluid <?=$Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-4" ?>" data-type="img" src="<?= $Core->getCMS($PageInfo->id, $page_part->id, 4, "{$assets}website\images\doctor-2.jpg") ?>" alt="doctor-photo">	
								</div>								
														
								<!-- Doctor Meta -->		
								<div class="doctor-meta">

									<h5 class="h5-xs blue-color <?=$Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-5" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 5, "Kai Harvert D.M.") ?></h5>
									<span class="<?= $Core->Editable()?>" id="<?= "{$PageInfo->id}-{$page_part->id}-6" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 6, "Assistant Medical Officer") ?></span>
								</div>	
							</div>								
						</div>	<!-- END DOCTOR #2 -->
						
						
						<!-- DOCTOR #3 -->
						<div class="col-md-6 col-lg-4">
							<div class="doctor-2">	

								<!-- Doctor Photo -->
								<div class="hover-overlay"> 
									<img class="img-fluid <?=$Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-7" ?>" data-type="img" src="<?= $Core->getCMS($PageInfo->id, $page_part->id, 7, "{$assets}website\images\doctor-3.jpg") ?>" alt="doctor-photo">	
								</div>								
														
								<!-- Doctor Meta -->		
								<div class="doctor-meta">

									<h5 class="h5-xs blue-color <?=$Core->Editable() ?>" id="<?= "{$PageInfo->id}-{$page_part->id}-8" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 8, "Chris Wood A.S.") ?></h5>
									<span class="<?= $Core->Editable()?>" id="<?= "{$PageInfo->id}-{$page_part->id}-9" ?>" data-type="text"><?= $Core->getCMS($PageInfo->id, $page_part->id, 9, "Chief Pharmacist") ?></span>
								</div>	
							</div>								
						</div>	<!-- END DOCTOR #3 -->
					</div>	    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END DOCTORS-3 -->
