@extends('header')

@section('konten')

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Edit Medicine</h2>
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
                                       
                                        @foreach ($med as $result)
                                            <form action="/med/update" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" readonly value="{{ $result-> ID_MEDICINE }}" name="ID_MEDICINE" class="form-control" > 
                                                <div class="form-group">
                                                    <label>Category ID</label>
                                                    <input type="text" name="ID_CATEGORY" autocomplete="off" value="{{ $result-> ID_CATEGORY }}" required class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Medicine Name</label>
                                                    <input type="text" name="MED_NAME" autocomplete="off" value="{{ $result->MED_NAME }}" required  class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" name="PRICE" autocomplete="off" value="{{ $result->PRICE }}" required class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="DESC_MED" autocomplete="off" value="{{ $result->DESC_MED }}" required  class="form-control" >                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="submit" class="btn btn-md btn-success" value="Submit">
                                                    <a href="/med" class="btn btn-md btn-danger">Cancel</a>
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
