<section id="callaction" class="home-section paddingtop-200">	
    <div class="container">
		<div class="row">
			<div class="col-md-8" style="margin-left:200px;">
				<div class="callaction bg-gray">
					<div class="row">
						<div class="col-md-5">
							<div class="wow fadeInUp" data-wow-delay="0.1s">
                                <div class="cta-text">

                                <?php
                                    if($this->session->flashdata('sukses')){
                                        echo'<div class="alert alert-warning">';
                                        echo $this->session->flashdata('sukses');
                                        echo'</div>';
                                        
                                    }
                                ?>

                                <div class="col-md-6">
                                    <?php
                                    echo validation_errors('<div class="alert alert-warning">','</div>');
                                        
                                    ?>
                                <div class="container"> 
                                    <div class="contact-form spad">
                                    <label style="margin-left:200px;"><h3>PROFILE</h3></label> <br>
                                        <form method="POST" action="<?php echo base_url('index.php/user/accountUser/update') ?>">
                                                <label><b>Username</b></label> <br>
                                                <input type="text" name="username" placeholder="username" value="<?= $show['username'] ?>" required>                                    
                                                <br>
                                                
                                                <label><b>Full Name</b></label> <br>
                                                <input type="text" name="full_name" placeholder="full_name" value="<?= $show['FULL_NAME'] ?>" required>                                    
                                                <br>
                                            <label><b>Email</b></label> <br>
                                                <input type="text" name="email" placeholder="email" value="<?= $show['email'] ?>" required> <br>
                                            <label><b>Password</b></label> <br>
                                                <input type="password" name="password" placeholder="password" value="<?= $show['password'] ?>" required>                                    
                                                <br>
                                            
                                            <label><b>Address</b></label> <br>
                                                <input type="text" name="address" placeholder="address" value="<?= $show['ADDRESS'] ?>" required>                                    
                                                <br>

                                            <label><b>Phone Number</b></label> <br>
                                                <input type="text" name="phone_number" placeholder="phone_number" value="<?= $show['PHONE_NUMBER'] ?>" required>                                    
                                                <br>
                                            <input class="btn btn-success btn-lg" type="submit" name="submit" value="Update Data">
                                            <button class="btn btn-danger btn-lg" type="submit" name="delete"> Delete Account</button>
                                        </form>
                                     </div>
                                </div>


                                </div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
    </div>
</section>	
