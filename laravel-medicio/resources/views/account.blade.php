@extends('header')

@section('konten')

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
                                                        @if(count($errors)>0)
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                    <li>{{$error}}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            @endif
                                                            <form action="/home/save" method="POST">
                                                                <!-- <div class="alert alert-info" role=alert>
                                                            
                                                                </div> -->
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <label>Username</label>
                                                                    <input type="text"  class="form-control" name="name" Required>         
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input type="password" placeholder="Password" name="password" class="form-control" Required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" placeholder="name@example.com" name="email" class="form-control" Required>         
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Full Name</label>
                                                                    <input type="text" placeholder="Full Name" name="full_name" class="form-control" Required>         
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input type="text" placeholder="Address" name="address" class="form-control" Required>         
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Phone Number</label>
                                                                    <input type="text" placeholder="08xxxxxxxxx" name="phone_number" class="form-control" Required>         
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
                                                <th class="border-0">ID Account</th>
                                                <th class="border-0">Username</th>
                                                <th class="border-0">Password</th>
                                                <th class="border-0">Email</th>
                                                <th class="border-0">Full Name</th>>
                                                <th class="border-0">Address</th>>
                                                <th class="border-0">Phone Number</th>>
                                                <th class="border-0">Role</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($res as $data)
                                                <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->username }}</td>
                                                    <td>{{ $data->password }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->FULL_NAME }}</td>
                                                    <td>{{ $data->ADDRESS }}</td>
                                                    <td>{{ $data->PHONE_NUMBER }}</td>
                                                    <td >{{ $data->role }}</td>
                                                </tr>
                                        @endforeach
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
@endsection