<div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                   
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Account</h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                   
                    <div class="ecommerce-widget">
                        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    
                                    <div class="card-body p-0">
                                       
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    
                                                    <div class="card">
                                                      
                                                        <div class="card-body">
                                                            
                                                            <form action="<?php base_url() ?>account/addAccount" method="POST">
                                                                <div class="alert alert-info" role=alert>
                                                                <?php 
                                                                        if (isset($pesan)) {
                                                                            echo $pesan;
                                                                        } else {
                                                                            echo "Add new account";
                                                                        }
                                                                     ?>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Username</label>
                                                                    <input type="username"  class="form-control" name="username" Required>         
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="password" placeholder="Password" name="password" class="form-control" Required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" placeholder="name@example.com" name="email" class="form-control" Required>         
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                    <label>Role</label>
                                                                    <select class="form-control" name="role">
                                                                        <option value="0">User</option>
                                                                        <option value="1">Admin</option>
                                                                    </select>       
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
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th class="border-0">No</th>
                                                <th class="border-0">ID Account</th>
                                                <th class="border-0">Username</th>
                                                <th class="border-0">Password</th>
                                                <th class="border-0">Email</th>
                                                <th class="border-0">Role</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach ($account as $result) { ?>
                                                <tr>
                                                    <td class="badge badge-danger float right"><?= $no++ ?></td>
                                                    <td><?= $result->ID_ACCOUNT ?></td>
                                                    <td><?= $result->USERNAME ?></td>
                                                    <td><?= $result->PASSWORD ?></td>
                                                    <td><?= $result->EMAIL ?></td>
                                                    <td ><?= $result->ROLE ?></td>
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
              
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
               
            </div>
           
        </div>