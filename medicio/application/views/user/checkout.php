<!-- Section: intro -->
    <?php $this->load->view("user/partials.php") ?>

    <div class="alert alert-info" role=alert>
    <?php 
            if (isset($pesan)) {
                echo $pesan;
            } else {
                echo "";
            }
         ?>
    </div>

    <!-- Breadcrumb Section Begin -->
    <section >
        <div class="container">
            <div class="row">
            
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-left:20px; "class="checkout__form col-lg-12 col-md-9">
                        <h4>RECEIVER DETAIL</h4>
                        <?php 
                        foreach($account as $ac):
                            echo form_open(base_url('index.php/user/Cart/checkout'));
                            $kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
                        ?>
                        <div class="row">
                            <div class=" col-md-6">
                                <div style="margin-top:-75px;">
                                <input type="hidden" name="id_account" value="<?php echo $ac->id?>" required><br> 
                                <input type="hidden" name="total" value="<?php echo $this->cart->total()?>" required><br> 
                                <input type="hidden" name="date" value="<?php echo date('Y-m-d');?>" required><br> 
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Transaction Code<span>*</span></p>
                                            <input type="text" name="kode_transaksi" value="<?php echo $kode_transaksi?>" readonly required><br>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Full Name<span>*</span></p>
                                            <input type="text" name="full_name" value="<?php echo $ac->FULL_NAME?>" required><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" name="address" value="<?php echo $ac->ADDRESS?>" required><br>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text" name="phone_number" value="<?php echo $ac->PHONE_NUMBER?>" required><br>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" name="email" value="<?php echo $ac->email?>" required class="text-dark">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Order notes<span>*</span></p>
                                    <input type="text"
                                        placeholder="Notes about your order, e.g. special notes for delivery.">
                                </div>     
                                <?php 
                                echo form_close();
                                endforeach;   
                                ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-5 col-md-6">
                                <?php
                                    $cart = $this->cart->contents();
                                ?>
                                <div class="checkout__order">
                                    <h4>Your Order</h4>
                                    <?php  
                                    if($this->session->flashdata('sukses')){
                                        echo '<div class="alert alert-warning"> ';
                                        echo $this->session->flashdata('sukses');
                                        echo '</div> ';
                                    } 

                                    if(empty($cart)){?>
                                        <p class="alert alert-success">Empty Cart</p>
                                    <?php  
                                    }else{ ?>
                                    <table >
                                        <thead >
                                            <tr >
                                                <!-- <th > Photos</th> -->
                                                <th >Products</th>
                                               
                                                <th class="col-md-2"></th>
                                
                                                <th >Subtotal</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
                                            foreach($cart as $cart){
                                               form_open(base_url('user/Cart/update_cart/'.$cart['rowid']));
                                            ?> 
                                                
                                             <tr>
                                               
                                                <td class="col-lg-7 col-md-1">
                                                    <ul>
                                                        <li><?php echo $cart['name']?></li>
                                                    </ul>
                                                </td>
                                                
                                                <td ><ul>
                                                        <li>x<?php echo $cart['qty']?></td></li>
                                                    </ul>
                                                <td class="" >
                                                    <!-- <span> -->
                                                    <ul>
                                                        <li>
                                                    Rp. 
                                                        
                                                        <?php 
                                                            $sub_total = $cart['price'] * $cart['qty'];
                                                            echo number_format($sub_total,'0',',','.' )
                                                        ?>
                                                        </li>
                                                    </ul>
                                                    
                                                    <!-- </span> -->
                                                </td>
                                                
                                            
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    echo form_close();?>
                                    <?php
                                    
                                    }?>
                                    <?php
                                    $total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
                                    ?>
                                    <div style="margin-right:50px;"class="checkout__order__total">Total <span><?php echo $total_belanja?></span></div>
                                    <button type="submit" class="site-btn">PLACE ORDER</button>
                                </div>
                               

                            </div>
                        </div>
                    </div>
                </div>

            </div> 
        </div>
    </section>
    <!-- Shoping Cart Section End -->
</div>

