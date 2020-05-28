@extends('header')

@section('konten')

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
                                                    <form action="/med/save" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                        <div class="alert alert-info" role=alert>
                                                        <div class="form-row">
                                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                                <label for="validationCustom04">ID Med-Category</label>
                                                                <select class="form-control" name="ID_CATEGORY">                                                        
                                                                @foreach($cat as $result)
                                                                <option value="{{ $result->ID_CATEGORY }}">{{ $result->CAT_NAME }}</option>
                                                                @endforeach
                                                                </select>
                                                           
                                                            </div>
                                                            
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label>Medicine Name</label>
                                                            <input  type="text" class="form-control" Required style="width:400px" name="MED_NAME">         
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="custom-file">Image</label>
                                                            <input type="file" name="IMAGE" id="IMAGE" required>
                                                            
                                                        </div><br>
                                                        
                                                        <div class="form-group">
                                                            <label>Price</label><br>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                                <input type="text" class="form-control" style="width: 422px;" name="PRICE">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea style="width: 400px;" class="form-control" rows="3" name="DESC_MED" ></textarea>
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
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th class="border-0">Category Name</th>
                                                <th class="border-0">Medicine Name</th>
                                                <th class="border-0">Image Name</th>
                                                <th class="border-0">Price</th>
                                                <th class="border-0">Description</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                        @foreach($med as $result)
                                                <tr>
                                                    <td>{{ $result['CAT_NAME'] }}</td>
                                                    <td>{{ $result['MED_NAME'] }}</td>
                                                    <td>{{ $result['IMAGE'] }} </td>
                                                    <td>{{ $result['PRICE'] }}</td>
                                                    <td>{{ $result['DESC_MED'] }}</td>
                                                    <td width="25">
                                                        <a href="/med/edit/{{ $result['ID_MEDICINE'] }}" class="badge badge-success"><i class="fas fa-edit"></i> Edit</a>
                                                        <a href="/med/delete/{{ $result['ID_MEDICINE'] }}" class="badge badge-danger" onclick="return confirm('Do you want to delete the data?');"><i class="fas fa-trash"></i> Delete</a>
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
