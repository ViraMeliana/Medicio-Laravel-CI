@extends('header')

@section('konten')

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
                                                    <form action="/cat/save" method="POST">
                                                    {{ csrf_field() }}
                                                        <div class="alert alert-info" role=alert>
                                                               <!-- alert -->
                                                                </div>
                                                        <div class="form-row">
                                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                                <label>Name Category</label>
                                                                <input style="width: 190px;" type="text" class="form-control" name="CAT_NAME"  required>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th class="border-0">ID</th>
                                                <th class="border-0">Category Name</th>
                                                <th class="border-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cat as $result)
                                                <tr>
                                                    <td>{{$result['ID_CATEGORY']}}</td>
                                                    <td>{{$result['CAT_NAME']}}</td>
                                                    <td width="25">
                                                        <a href="/cat/editCat/{{ $result['ID_CATEGORY'] }}" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                                                        <a href="/cat/delete/{{ $result['ID_CATEGORY'] }}"
                                                        class="badge badge-danger" onclick="return confirm('Do you want to delete the data?');"><i class="fas fa-trash"></i> Delete</a>
                                                    </td>
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
    </div>
    
</div>
@endsection


                       
