
@extends('layouts.layout')
@section('title', 'Laporan')

@section('sidebar-menu')
    @include('layouts.sidebar')
@endsection
@push('styles')
    <!-- Styles -->
    <style>
        #chartdiv, #chartdiv2 {
            width: 100%;
            height: 300px;
        }
        #chartdiv3, #chartdiv4 {
            width: 100%;
            height: 300px;
        }
    </style>
@endpush
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Sistem Inventaris LPTIK UNIB
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Berhasil :</strong>{{ $message }}
                        </div>
                        @elseif ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Gagal :</strong>{{ $message }}
                            </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <form action="{{ route('laporan.cari') }}" method="post">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Pilih Ruangan Terlebih Dahulu</label>
                                <select name="ruangId" class="form-control" id="">
                                    <option value="" disabled selected>-- pilih ruangan --</option>
                                    @foreach ($ruangans as $ruangan)
                                        <option value="{{ $ruangan->id }}">{{ $ruangan->namaRuangan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp; Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                            <i class="fa fa-bar-chart"></i>&nbsp;Statistik Per Ruangan (Diagram Lingkaran)
                        </header>
                        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (isset($_POST['ruangId']))
                                        @section('charts')
                                            chart.data = [
                                                @foreach ($perRuang as $data)
                                                    {
                                                        "country": "{{$data['jenisBarang'] }}",
                                                        "litres": {{ $data['jumlah'] }}
                                                    },
                                                @endforeach
                                            ];
                                        @endsection
                                    @endif
                                    <div id="chartdiv"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
        
                <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                            <i class="fa fa-bar-chart"></i>&nbsp;Statistik Per Ruangan (Diagram Batang)
                        </header>
                        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                            <div class="row">
                                <div class="col-md-12">
                                    @section('charts2')
                                        @if (isset($_POST['ruangId']))
                                            chart.data = [
                                                @foreach ($perRuang as $data)
                                                    {
                                                            "country": "{{ $data['jenisBarang'] }}",
                                                        "visits": {{ $data['jumlah'] }}
                                                    },
                                                @endforeach
                                            ];
                                        @endif
                                    @endsection
                                    <div id="chartdiv2"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Ruangan</th>
                                <th>Jenis Barang</th>
                                <th>Kondisi</th>
                                <th>Status Perbaikan</th>
                                <th>Merk</th>
                                <th>Asal Perolehan</th>
                                <th>Bahan</th>
                                <th>Harga</th>
                                <th>Catatan</th>
                                <th>Waktu Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @if (!empty($_POST['ruangId']))
                            @foreach ($barangs as $barang)
                            <tr>
                                <td> {{ $no++}} </td>

                                <td> {{ $barang->namaBarang}}</td>
                                <td>
                                    {{ $barang->namaRuangan }}
                                </td>
                                <td> {{ $barang->jenisBarang}}</td>
                                <td> {{ $barang->kondisi}}</td>
                                <td>
                                    @if ($barang->statusPerbaikan == "0")
                                        <a style="color: green"><i class="fa fa-check-circle"></i>&nbsp; Belum ada perbaikan</a>
                                        @else
                                        <a style="color: red"><i class="fa fa-close"></i>&nbsp; Sudah ada perbaikan</a>
                                    @endif
                                </td>
                                <td> {{ $barang->merk}}</td>
                                <td> {{ $barang->asalPerolehan}}</td>
                                <td> {{ $barang->bahan}}</td>
                                <td> {{ $barang->harga}}</td>
                                <td> {{ $barang->catatan}}</td>
                                <td> {{ $barang->waktuMasuk}}</td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );
    </script>

    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function() {
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end
        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.PieChart);
        // Add data
        @yield('charts')
        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;
        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;
        }); // end am4core.ready()
    </script>
     <!-- Resources -->
  <script src="{{ asset('assets/offline/cdn/core.js') }}"></script>
  <script src="{{ asset('assets/offline/cdn/charts.js') }}"></script>
  <script src="{{ asset('assets/offline/cdn/animated.js') }}"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.XYChart);
// Add data
@yield('charts2')
// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;
var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
}); // end am4core.ready()
</script>
@endpush
