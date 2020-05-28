@extends('header')

@section('konten')

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Category Medicine</h2>
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
                                        @foreach ($cat as $result)
                                            <form action="/cat/updateCat" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label>Category ID</label>
                                                    <input type="text" name="ID_CATEGORY" autocomplete="off" value="{{ $result-> ID_CATEGORY }}" required class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" name="CAT_NAME" autocomplete="off" value="{{ $result->CAT_NAME }}" required  class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="submit" class="btn btn-md btn-success" value="Submit">
                                                    <a href="/cat" class="btn btn-md btn-danger">Cancel</a>
                                                </div>
                                            </form>
                                        @endforeach
                                        </div>
                                               
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
