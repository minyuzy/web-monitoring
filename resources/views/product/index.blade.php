@extends('template.index')

@section('content')

<style>
    #category-filter {
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

    <div class="card">
        <div class="card-header">


            <div class="text-right">
                <a class="btn btn-primary" href="/product/create-index">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>

        </div>


        <div class="card-body">

            <select id="category-filter" class="form-control">
                <option value="all">-- Pilih Category --</option>
                @foreach ($data_product_category as $dtpc)
                <option value="{{$dtpc->name}}">{{$dtpc->name}}</option>
                @endforeach
                <!-- Tambahkan opsi bulan lainnya sesuai kebutuhan -->
            </select>
            <div class="table-responsive">
                <table class="table table-striped" id="example2">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Category</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stock</th>
                            <th>Terjual</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_product as $dtp )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dtp->name}}</td>
                            <td><img src="{{$dtp->image_url}}" width="100px" height="100px" alt=""></td>
                            <td>{{$dtp->product_category->name}}</td>
                            <td>{{$dtp->harga_beli}}</td>
                            <td>{{$dtp->harga_jual}}</td>
                            <td>{{$dtp->stock}}</td>
                            <td>{{$dtp->sold}}</td>

                            <td>

                                <a href="/product/edit-index/{{$dtp->id}}" class="btn btn-sm btn-warning"><i class="fas fa-edit text-white"></i></a>

                                <a href="/product/delete/{{$dtp->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<script>
    var categoryArray = [

    ];

    const getBulanFilter = document.getElementById("category-filter");

    categoryArray.map((data) => {
        getBulanFilter.innerHTML += ` <option value="${data}">${data}</option>`
    })

    getBulanFilter.addEventListener("change", function() {
        var selectedMonth = this.value;
        var tableRows = document.querySelectorAll("#example2 tbody tr");

        if (selectedMonth === "all") {
            tableRows.forEach(function(row) {
                row.style.display = "table-row";
            });
        } else {
            tableRows.forEach(function(row) {
                var monthCell = row.querySelectorAll("td")[3].innerText; // Kolom ke-4 berisi bulan
                if (monthCell === selectedMonth) {
                    row.style.display = "table-row";
                } else {
                    row.style.display = "none";
                }
            });
        }
    });
</script>


</div>
@endsection