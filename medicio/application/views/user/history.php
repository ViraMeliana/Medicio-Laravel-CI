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
                <div class="shoping__cart__table">
                <?php  
                foreach($transaksi as $trans){
                    $kode = $trans->KODE_TRANSAKSI;
                if(empty($trans)){?>
                    <p class="alert alert-success">Empty History</p>
                <?php  
                }else{ ?>
                <div class="row">     
                    <div class="col-lg-20">
                        <div class="shoping__checkout">
                            <div style="background-color:black;">
                                <div style="margin-left:400px;">
                                    <p style="font-family: courier; font-size: 30px; color: white;">
                                        <?= $trans->KODE_TRANSAKSI?>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Medicine</th>
                                        <th>Qty</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <?php
                                    $detail = $this->transactionmodel->getDetailbyUser($kode);
                                    foreach($detail as $det){?>

                                    <td class="shoping__cart__item">
                                        <label><?= $det->MED_NAME ?></label>
                                    </td>
                                    <td class="shoping__cart__quantity" >
                                        <label><?= $det->QTY ?></label>
                                    </td>
                                    <td class="shoping__cart__item">
                                        <label><?= $det->DATE ?></label>
                                    </td>
                                    <td class="shoping__cart__item">
                                    <label>Rp. <?= $det->PRICE ?></label>
                                    </td>
                                </tr>
                                    <?php } ?>
                                </tbody>
                                <thead>
                                
                                    <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th class="shoping__cart__item">Rp. <?= $det->TOTAL ?></th>
                                        <!-- <th>Total</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    
                                       
                                    </tr>
                                    
                                </tbody>
                            </table>
                            </br>
                        <?php
                            } } ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>               
    </div>
</section>