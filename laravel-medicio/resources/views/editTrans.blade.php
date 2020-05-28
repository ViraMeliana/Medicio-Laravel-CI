@extends('header')

@section('konten')

<div class="dashboard-wrapper">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Detail Transaksi</h2>
                    <a href="/trans" class="badge badge-success">
                    <i class="fas fa-backward"></i> Back</a>
                    </td>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
           
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card" >
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th class="border-0">Medicine Name</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($res as $data)
                                    <tr>
                                        <td>{{ $data->MED_NAME }}</td>
                                        <td>{{ $data->PRICE }}</td>
                                        <td>{{ $data->QTY }}</td>
                                        <td>{{ $data->DATE }}</td>
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