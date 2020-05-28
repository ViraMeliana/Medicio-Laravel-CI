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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card" >
                            <!--flashhapus-->
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th class="border-0">Trans Code</th>
                                                <th class="border-0">Full Name</th>
                                                <th class="border-0">Email</th>
                                                <th class="border-0">Address</th>
                                                <th class="border-0">Phone Number</th>
                                                <th class="border-0">Total</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                        @foreach($res as $result)
                                                <tr>
                                                    <td>{{ $result->KODE_TRANSAKSI }}</td>
                                                    <td>{{ $result->FULL_NAME }}</td>
                                                    <td>{{ $result->EMAIL }} </td>
                                                    <td>{{ $result->ADDRESS }}</td>
                                                    <td>{{ $result->PHONE_NUMBER }}</td>
                                                    <td>{{ $result->TOTAL }}</td>
                                                    <td width="25">
                                                    <a href="/trans/detail/{{ $result->KODE_TRANSAKSI }}" class="badge badge-success">
                                                    <i class="fas fa-eye"></i> See Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection
