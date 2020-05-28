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

                                <p class="alert alert-success"> already have an account ? please Login</p> 

                                <div class="col-md-12">
                                    <?php
                                    echo validation_errors('<div class="alert alert-warning">','</div>');
                                        
                                    ?>
                                <div class="container"> 
                                    <form method="POST" action="<?php echo base_url('index.php/user/registrasi') ?>">
                                        <label><b>Full Name</b></label> <br>
                                        <input type="text" name="full_name" placeholder="full_name" value="<?php echo set_value('full_name')?>" required>                                    <br>
                                        <label><b>Username</b></label> <br>
                                            <input type="text" name="username" placeholder="username" value="<?php echo set_value('username')?>" required>                                    <br>
                                        <label><b>Email</b></label> <br>
                                            <input type="text" name="email" placeholder="email" value="<?php echo set_value('email')?>" required> <br>
                                        <label><b>Password</b></label> <br>
                                            <input type="password" name="password" placeholder="password" value="<?php echo set_value('password')?>" required>                                    <br>
                                        
                                        <label><b>Address</b></label> <br>
                                            <input type="text" name="address" placeholder="address" value="<?php echo set_value('address')?>" required>                                    <br>

                                        <label><b>Phone Number</b></label> <br>
                                            <input type="text" name="phone_number" placeholder="phone_number" value="<?php echo set_value('phone_number')?>" required>                                    <br>

                                        <input class="btn btn-success btn-lg" type="submit" name="submit" value="Submit">
                                            <!-- <a  onclick="document.getElementById('rg').style.display='block'" >
                                            Submit</a></button> -->
                                        <button class="btn btn-danger btn-lg" type="reset"> Reset</button>
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
