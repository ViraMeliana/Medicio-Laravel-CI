<div class="dashboard-wrapper">


    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
           
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Medicine</h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
           
            <div class="ecommerce-widget">
                                  <!-- trans  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card" style="width: 500px;">
                            <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">                                                   
                                            <div class="card">
                                                <div class="card-body">
                                                    <form action="<?php base_url() ?>category/addcategory" method="POST">
                                                        <div class="alert alert-info" role=alert>
                                                                <?php 
                                                                        if (isset($pesan)) {
                                                                            echo $pesan;
                                                                        } else {
                                                                            echo "Add new category";
                                                                        }
                                                                     ?>

                                                                </div>
                                                        <div class="form-row">
                                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                                <label>Name Category</label>
                                                                <input style="width: 190px;"t ype="text" class="form-control" name="CAT_NAME"  required>
                                                            </div>                                                                                                                                    
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ecommerce-widget">
                                          <!-- trans  -->
                            <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card"  style="width: 500px;">
                        
                        <!--flashhapus-->
                        <?php if($this->session->flashdata('notif')):?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data <strong>berhasil</strong> <?= $this->session->flashdata('notif');?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <!--flashedit-->
                        <?php 
                            $data=$this->session->flashdata('success');
                            if($data!=""){ ?>
                            <div id="notifikasi" class="alert alert-success"><strong>Success!</strong> <?=$data;?></div>
                        <?php } ?>
                        
                        <?php 
                            $data2=$this->session->flashdata('error');
                            if($data2!=""){ ?>
                            <div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
                        <?php } ?>
                        

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th class="border-0">No</th>
                                                <th class="border-0">ID</th>
                                                <th class="border-0">Category Name</th>
                                                <th class="border-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach ($cat as $result) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $result->ID_CATEGORY ?></td>
                                                    <td><?= $result->CAT_NAME ?></td>
                                                    <td width="25">
                                                    <a href="" data-toggle="modal" data-target="#modal-edit<?=$result->ID_CATEGORY;?>" 
                                                        class="badge badge-success" ><i class="fas fa-edit"></i> Edit</a>
                                                       
                                                    </td>
                                                    <td width="25">
                                                        <a href="<?= base_url('index.php/admin/category/deleteCat/').$result->ID_CATEGORY?>"
                                                        class="badge badge-danger" onclick="return confirm('Do you want to delete the data?');"><i class="fas fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                             ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <?php $no=0; foreach($cat as $cat): $no++; ?>
                    <div class="row">
                        <div id="modal-edit<?=$cat->ID_CATEGORY;?>" class="modal fade">
                       

                        <div class="modal-dialog">
                            <form action="<?php echo base_url('index.php/admin/category/editCat/'); ?>" method="post">  
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                            <input type="hidden" readonly value="<?=$cat->ID_CATEGORY;?>" name="id_category" class="form-control" > 
                                        <div class="form-group">
                                            <br><label>Category Name</label><br>
                                            <div class='col-md-9'><input type="text" name="cat_name" autocomplete="off" value="<?=$cat->CAT_NAME;?>" required class="form-control" ></div>
                                    </div>
                                    <br>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="icon-pencil5"></i>Update</button>
                                    </div>
                            </form>
                            </div>
                        </div>
                    </div>    
                    <?php endforeach; ?>   
            </div>
        </div>
    </div>
</div>





                       
