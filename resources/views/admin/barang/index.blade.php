
@extends('admin/layouts.layout')
@section('login_as','Administrator')
@section('user-login')
    {{ Auth::user()->name }}
@endsection
@section('title', 'LPTIK')

@section('sidebar-menu')
    @include('admin/layouts.sidebar')
@endsection
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Sistem Inventaris
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
                            @else
                            <div class="alert alert-success alert-block" id="">
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data yang sudah diunggah

                            </div>
                    @endif
                </div>
                <div class="col-md-12">
                <a href="{{ route('barang.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                 <!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="modaltambah" href="{{ route('barang.add') }}">
                        <i class="fa fa-plus"></i>&nbsp;Tambah Baru
                    </button>
                -->
                </div>

                <!-- modal tambah -->
                <!--
                <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModelLabel" arie-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-list"></i>&nbsp; Tambah Data Barang
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </h5>
                            </div>
                            <form action="{{ route('barang.add') }}" method="POST">
                                {{ csrf_field() }} {{ method_field('POST') }}
                            </form>
                        </div>
                    </div>
                </div>
                -->
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Ruangan</th>
                                <th>Kondisi</th>
                                <th style="text-align:center">Status Perbaikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($barangs as $barang)
                            <tr>
                                <td> {{ $no++}} </td>

                                <td> {{ $barang->namaBarang}}</td>
                                <td>
                                    {{ $barang->namaRuangan }}
                                </td>
                                <td> {{ $barang->kondisi}}</td>
                                <td style="text-align:center">
                                    @if ($barang->statusPerbaikan == "0")
                                        <a style="color: green"><i class="fa fa-check-circle"></i>&nbsp; Belum ada perbaikan</a>
                                        @else
                                        <a style="color: red"><i class="fa fa-close"></i>&nbsp; Sudah ada perbaikan</a>
                                    @endif
                                    <hr>
                                    <a href="{{ route('barang.riwayat',[$barang->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Riwayat Perbaikan</a>
                                </td>
                                <td>
                                <a href="{{ route('barang.edit',[$barang->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                <a onclick="detail({{ $barang->id }})" class="btn btn-success btn-sm" style="color:white;cursor: pointer;"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
                                <form action="{{ route('barang.delete',[$barang->id]) }}" method="POST">
                                        {{ csrf_field() }} {{ method_field("DELETE") }}

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <p class="modal-title" id="exampleModalLabel">Informasi Detail Barang</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th style="max-width:100px !important;">Nama Barang :</th>
                                        <td id="namaBarang"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Kode Barang :</th>
                                        <td id="kodeBarang"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Jenis Barang :</th>
                                        <td id="jenisBarang"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Kondisi :</th>
                                        <td id="kondisi"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Status Perbaikan :</th>
                                        <td id="statusPerbaikan"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Merk :</th>
                                        <td id="merk"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Asal Perolehan :</th>
                                        <td id="asalPerolehan"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Bahan :</th>
                                        <td id="bahan"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Harga :</th>
                                        <td id="harga"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Catatan :</th>
                                        <td id="catatan"></td>
                                    </tr>
                                 <tr>
                                        <th style="max-width:100px !important;">Waktu Masuk :</th>
                                        <td id="waktuMasuk"></td>
                                    </tr>
                                    <tr>
                                        <th style="max-width:100px !important;">Foto Barang :</th>
                                        <td>
                                            <img src="" id="foto" alt="" style="max-width:100px">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
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

        function detail(id){
            $.ajax({
                url: "{{ url('barang') }}"+'/'+ id + "/detail",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalDetail').modal('show');
                    $('#namaBarang').text(data.namaBarang);
                    $('#kodeBarang').text(data.kodeBarang);
                    $('#jenisBarang').text(data.jenisBarang);
                    $('#kondisi').text(data.kondisi);
                    $('#statusPerbaikan').text(data.statusPerbaikan);
                    $('#merk').text(data.merk);
                    $('#asalPerolehan').text(data.asalPerolehan);
                    $('#bahan').text(data.bahan);
                    $('#harga').text(data.harga);
                    $('#catatan').text(data.catatan);
                    $('#waktuMasuk').date(data.waktuMasuk);
                    $('#foto').attr("src", "upload/foto/"+data.foto);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }
    </script>
@endpush
