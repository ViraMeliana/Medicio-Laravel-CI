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
            <?php
                $cart = $this->cart->contents();
            ?>
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
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

                        <table>
                            <thead>
                                <tr >
                                   
                                    <th >Products</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                        $total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
                        foreach($cart as $cart){
                            echo 
                            form_open(base_url('user/Cart/update_cart/'.$cart['rowid']));
                        ?>
                            <tr>
                               
                                <td class="shoping__cart__item">
                                    <h5><?php echo $cart['name']?></h5>
                                </td>
                                <td class="shoping__cart__item">
                                    <label><?php echo $cart['price']?></label>
                                </td>
                                <td class="shoping__cart__item">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input class="" type="number" name="qty" value="<?php echo $cart['qty']?>">
                                    
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__item">
                                    <label style="" > Rp. 
                                        <?php 
                                            $sub_total = $cart['price'] * $cart['qty'];
                                            echo number_format($sub_total,'0',',','.' )
                                        ?>
                                    </label>
                                </td>
                                <td class="shoping__cart__item">
                                    <a href="<?php echo base_url('index.php/user/Cart/update_cart/'.$cart['rowid'])?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?php echo base_url('index.php/user/Cart/hapus/'.$cart['rowid'])?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i>
                                    </a>  
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
                </div>
            </div>               
        </div>


            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-left:1000px" class="shoping__cart__btns">
                        <a href="<?php echo base_url('index.php/user/Cart/hapus')?>" class="btn btn-danger btn-lg cart-btn-right">
                        <span class="fa fa-trash-o"></span>
                            Clear Cart</a>
                    </div>
                </div>
               
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <!-- <h5>Discount Codes</h5> -->
                            <form action="#">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php
                       $total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
                    ?>

                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span><?php echo $total_belanja?></span></li>
                        </ul>
                        <a href="Cart/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
</div>

