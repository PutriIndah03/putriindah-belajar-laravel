@extends('layouts.main')
@section('konten')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chart Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chart Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-tittle">Chart Produk</h4>
                    <p class="card-text"></p>

                    <div id="productCountChart" style="height: 300px;"></div>
                    <div id="totalPriceChart" style="height: 300px;"></div>
                    <div id="stockCountChart" style="height: 300px;"></div>
                </div>
            </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
<script>
    // Kolom Chart
    Highcharts.chart('productCountChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Produk per Kategori'
        },
        xAxis: {
            categories: @json($categories),
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Jumlah Produk'
            }
        },
        series: [{
            name: 'Jumlah Produk',
            data: @json($totalProducts)
        }]
    });
    // Pie Chart
    Highcharts.chart('totalPriceChart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Jumlah Total Harga Produk per Kategori'
        },
        series: [{
            name: 'Total Harga',
            data: [
                @foreach($categories as $key => $category)
                {name: '{{ $category }}', y: {{ $totalPrice[$key] }}},
                @endforeach
            ]
        }]
    });

    //line chart
       Highcharts.chart('stockCountChart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Jumlah Stok Produk per Kategori'
        },
        xAxis: {
            categories: @json($categories)
        },
        yAxis: {
            title: {
                text: 'Jumlah Stok'
            }
        },
        series: [{
            name: 'Jumlah Stok',
            data: [
                @foreach($categories as $key => $category)
                {name: '{{ $category }}', y: {{ $totalStock[$key] }}},
                @endforeach
            ]
        }]
    });
</script>
@endsection
