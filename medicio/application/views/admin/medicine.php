<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Medicine</h2>
                    </div>
                </div>
            </div>
            <div class="ecommerce-widget">
                    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card" style="width: 500px;">
                            <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            
                                            <div class="card">
                                              
                                                <div class="card-body">
                                                    <form action="<?php echo base_url() ?>index.php/admin/medicine/addMedicine" method="POST" enctype="multipart/form-data">
                                                         <div class="alert alert-info" role=alert>
                                                                <?php 
                                                                        if (isset($pesan)) {
                                                                            echo $pesan;
                                                                        } else {
                                                                            echo "Add new medicine";
                                                                        }
                                                                     ?>

                                                                </div>
                                                        <div class="form-row">
                                                            
                                                            
                                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                                <label for="validationCustom04">ID Med-Category</label>
                                                                <select class="form-control" name="category">                                                        
                                                                    <?php 
                                                                    foreach ($cat as $result) {
                                                                        ?>
                                                                        <option value="<?= $result->ID_CATEGORY ?> "><?= $result->CAT_NAME ?></option>
                                                                        <?php
                                                                    } ?>
                                                                </select>
                                                           
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label>Medicine Name</label>
                                                            <input  type="text" class="form-control" Required style="width:457px" name="medname">         
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="custom-file">Image</label>
                                                            <input type="file" name="medimage" id="medimage" required>
                                                            
                                                        </div><br>
                                                        
                                                        <div class="form-group">
                                                            <label>Price</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                                <input type="text" class="form-control" style="width: 422px;" name="price">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea style="width: 457px;" class="form-control" rows="3" name="desc" ></textarea>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card" >
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
                                                <th class="border-0">Category Name</th>
                                                <th class="border-0">Medicine Name</th>
                                                <th class="border-0">Image Name</th>
                                                <th class="border-0">Price</th>
                                                <th class="border-0">Description</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach ($med as $result) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $result->CAT_NAME ?></td>
                                                    <td><?= $result->MED_NAME ?></td>
                                                    <td><?= $result->IMAGE ?></td>
                                                    <td><?= $result->PRICE ?></td>
                                                    <td><?= $result->DESC_MED ?></td>
                                                    <td width="25">
                                                    <a href="" data-toggle="modal" data-target="#modal-edit<?=$result->ID_MEDICINE;?>" 
                                                        class="badge badge-success" ><i class="fas fa-edit"></i> Edit</a>                                               
                                                    </td>
                                                    <td width="25">
                                                        <a href="<?= base_url('index.php/admin/medicine/deleteMed/').$result->ID_MEDICINE?>"
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

                    <?php $no=0; foreach($med as $med): $no++; ?>
                        <div class="row">
                        <div id="modal-edit<?=$med->ID_MEDICINE;?>" class="modal fade">
                            <div class="modal-dialog">
                            <form action="<?php echo base_url('index.php/admin/medicine/editMed/'); ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                            <input type="hidden" readonly value="<?=$med->ID_MEDICINE;?>" name="id_medicine" class="form-control" > 
                                        <div class="form-group">
                                            <br><label>Category Name</label><br>
                                            <div class='col-md-9'><input type="text" name="cat_name" autocomplete="off" value="<?=$med->CAT_NAME;?>" required class="form-control" ></div>
                                            <br><label>Medicine Name</label><br>
                                            <div class='col-md-9'><input type="text" name="med_name" autocomplete="off" value="<?=$med->MED_NAME;?>" required  class="form-control" ></div>
                                            <br><label>IMAGE</label><br>                    
                                            <div class='col-md-9'>
                                                <input type="file" name="image" autocomplete="off" value="<?=$med->IMAGE;?>"  class="form-control" ></div>
                                            <br><label>Price</label><br>
                                            <div class='col-md-9'><input type="text" name="price" autocomplete="off" value="<?=$med->PRICE;?>" required class="form-control" ></div>
                                            <br><label>Description</label><br>
                                            <div class='col-md-9'><input type="text" name="desc_med" autocomplete="off" value="<?=$med->DESC_MED;?>" required  class="form-control" ></div>
                                    </div>
                                    <br>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" name="submit" class="btn btn-primary"><i class="icon-pencil5"></i></button>
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