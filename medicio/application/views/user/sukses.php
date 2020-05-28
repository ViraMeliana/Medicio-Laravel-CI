<section id="callaction" class="home-section paddingtop-200">	
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="callaction bg-gray">
					<div class="row">
						<div class="col-md-8">
							<div class="wow fadeInUp" data-wow-delay="0.1s">
                                <div class="cta-text">

                                <?php
                                    if($this->session->flashdata('sukses')){
                                        echo'<div class="alert alert-warning">';
                                        echo $this->session->flashdata('sukses');
                                        echo'</div>';
                                        
                                    }
                                ?>

                                <p class="alert alert-success"> Registrasi Success. <a onclick="document.getElementById('lg').style.display='block'" class="btn btn-info btn-sm">
                                Login here</a>
                                </a>
                                </p> 

                                </div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
    </div>
</section>	

