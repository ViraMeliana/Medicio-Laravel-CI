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

<div class="site-section" style="margin-top:150px;">
    <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <i class="fa fa-check-circle text-success fa-5x"></i>
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">You order was successfuly completed.</p>
            <p><a href="<?php echo base_url() ?>index.php/user/product" class="btn btn-md height-auto px-4 py-3 btn-primary">Back to store</a></p>
          </div>
        </div>
    </div>
</div>