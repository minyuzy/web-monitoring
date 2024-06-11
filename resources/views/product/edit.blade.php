@extends('template.index')

@section('content')

<style>
    #bulan-filter {
        max-width: 200px;
    }
</style>

<div class="container">
    <h3 class="text-center text-secondary">DATA BALITA
    </h3>
    @if ($messege = Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_add'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('failed_add'))
    <div class="alert alert-danger alert-dismissible " role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_edit'))
    <div class="alert alert-warning alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif ($messege= Session::get('success_delete'))
    <div class="alert alert-danger alert-dismissible text-white" role="alert">
        <strong>{{$messege}}
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title text-white">Ubah Data Product </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/product/edit">
            @csrf
            @foreach ($data_product as $dtp)
            <input type="hidden" name="id" value="{{$dtp->id}}">

            <div class="card-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{$dtp->name}}" type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama">
                </div>
                <!-- <div class="form-group">
                    <label for="image_url">Foto</label>
                    <input value="{{$dtp->image_url}}" type="text" class="form-control" name="image_url" id="image_url" placeholder="Masukkan nama">
                </div> -->
                <div class="form-group">
                    <label for="product_category_id">Product Category</label>
                    <select name="product_category_id" id="product_category_id" class="form-control">
                        <option value="{{$dtp->product_category_id}}">{{$dtp->product_category->name}}</option>
                        @foreach ($data_product_category as $dtpc)
                        <option value="{{$dtpc->id}}">{{$dtpc->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input value="{{$dtp->stock}}" type="number" class="form-control" name="stock" id="stock" placeholder="Masukkan nama">
                </div>
                <div class="form-group">
                    <label for="harga_beli">Harga Beli</label>
                    <input value="{{$dtp->harga_beli}}" type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Masukkan nama">
                </div>
                <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input value="{{$dtp->harga_jual}}" type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan nama">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning text-white">Ubah Data</button>
            </div>
            @endforeach
        </form>
    </div>

</div>
<script>
    var bulanArray = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    const getSelectBulan = document.getElementById("bulan")
    bulanArray.map((data) => {
        getSelectBulan.innerHTML += `<option value="${data}">${data}</option>`
    })
</script>


</div>
@endsection