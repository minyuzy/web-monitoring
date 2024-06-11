@extends('template.index')

@section('content')

<style>
    .blok {
        width: 100%;
        height: 300px;
        background-color: green;
    }
</style>


<div class="container mt-5">

    <div class="card">

        <div class="card-body">
            <div class="row justify-content-start">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Terjual</span>
                            <span class="info-box-number">
                                {{$total_terjual}}
                                <small>Product</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Pembelian</span>
                            <span class="info-box-number">
                                <small>Rp.</small> {{$total_pengeluaran}}

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Keuntungan</span>
                            <span class="info-box-number">
                                <small>Rp.</small> {{$keuntungan}}

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div>

        </div>
        <!-- /.card-body -->
    </div>

</div>

</div>
@endsection