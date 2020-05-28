
<?php $this->load->view("user/partials.php") ?>
	<!-- Section: intro -->

	

	<section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 center">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s" style="width : 450px ; margin-left: 200px; margin-top: 70px;">
							<div class="panel panel-skin">
							<div class="panel-heading" >
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Choose Medicine Category</h3>
									</div>
									<div class="panel-body" >
									<form role="form" class="lead" action=" <?php echo base_url() ?>index.php/user/product/getbycat" method="POST">
										<div class="row">
											<div style="margin-left: 100px; margin-top:1px;" >
												<div class="form-group" >
                                                    <select name="cat"  class="hero__categories">
													<?php
															foreach($cat as $data){ // Lakukan looping pada variabel kelas dari controller
																echo "
																	<option value='".$data->ID_CATEGORY."'>".$data->CAT_NAME."
																	</option>";

																
															}
														?>
													</select>											
												</div>
											</div>
											
										</div>
										<input style="margin-top:10px;" type="submit" value="Search" class="btn btn-skin btn-block " name="submit">
									</form>
								</div>
							</div>				
						
						</div>
						</div>
					</div>		
					
					<div class="col-lg-5">
						<div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
						<img src="<?php echo base_url() ?>assets2/img/dummy/img-1.png" class="img-responsive" alt="" />
						</div>
					</div>	
				</div>		
			</div>
		</div>		
    </section>
	
	<!-- /Section: intro -->

	<!-- Section: products -->
    <section id="product" class="home-section nopadding paddingtop-60">
		<div class="container">
	
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow fadeInDown" data-wow-delay="0.1s">
						<div class="section-heading text-center">
						<h2 class="h-bold">Popular Products</h2><br>
						
						</div>
						</div>
						<div class="divider-short"></div>
					</div>
				</div>
			
			<?php 
				foreach ($product as $result) {		
 			?>
			
			<?php
				echo 
					form_open(base_url('index.php/user/Cart/add'));
				echo 
					form_hidden('id',$result->ID_MEDICINE);
				echo 
					form_hidden('qty', 1);
				echo 
					form_hidden('price',$result->PRICE);
				echo 
					form_hidden('name',$result->MED_NAME);
				echo 
					form_hidden('img',$result->IMAGE);
					
					echo '
					<div class="col-sm-3 col-md-3" style="height:400px">
						<div class="wow fadeInUp" data-wow-delay="0.2s">
							<div class="box text-center">
								<table>
								<tr>
									<a href="shop-single.html"> <img src="'.base_url().'med_img/'.$result->IMAGE.'" alt="Image" style="width:150px; height:150px"></a>
								</tr>
									<tr>
										<ul class="featured__item__pic__hover">
											
											<li><button class="btn btn-link" type="submit" value="submit"><a><i class="fa fa-shopping-cart"></i></a></button></li>
										</ul>
									</tr>
										
									<tr>
										<p class="cbp-singlePage cbp-l-grid-team-name">'.$result->MED_NAME.'</p>
										<div style="margin-top:5px">
									</tr>
									<tr>
									<p class="price">'.$result->DESC_MED.'</p>
									</tr>
									<tr>
									<p class="price">Rp. '.$result->PRICE.'</p>
									</tr>
									</div>
									
								</table>
							</div>
						</div>
					</div>
					';
				echo 
				form_close();
				
				}
				

					?>
				
				</div>
	
	</section>