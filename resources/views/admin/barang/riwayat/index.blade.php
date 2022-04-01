
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
                    <form action="{{ route('barang.riwayat.post',[$id]) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}



                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Barang</label>
                                <input type="text" name="namaRiwayat" value="{{ $barang->namaBarang }}" disabled class="tags form-control @error('keterangan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('barangId'))
                                        <small class="form-text text-danger">{{ $errors->first('barangId') }}</small>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Catatan</label>
                                <input type="text" name="keterangan" class="tags form-control @error('keterangan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('keterangan'))
                                        <small class="form-text text-danger">{{ $errors->first('keterangan') }}</small>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal</label>
                                <input type="date" name="tanggal" id="date" class="tags form-control @error('waktuMasuk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('waktuKembali'))
                                        <small class="form-text text-danger">{{ $errors->first('waktuKembali') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat</label>
                                <input type="text" name="tempat" class="tags form-control @error('keterangan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('keterangan'))
                                        <small class="form-text text-danger">{{ $errors->first('keterangan') }}</small>
                                    @endif
                                </div>
                            </div>

                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp;Simpan Data</button>
                        </div>
                    </form>
                </div>


                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Catatan</th>
                                <th>Tanggal</th>
                                <th>Tempat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($riwayats as $riwayat)
                            <tr>
                                <td> {{ $no++}} </td>
                                <td> {{ $riwayat->namaBarang}}</td>
                                <td> {{ $riwayat->keterangan}}</td>
                                <td> {{ $riwayat->tanggal}}</td>
                                <td> {{ $riwayat->tempat}}</td>
                                <td>
                                <form action="{{ route('barang.riwayat.delete',[$riwayat->id]) }}" method="POST">
                                        {{ csrf_field() }} {{ method_field("DELETE") }}

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

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
@endpush
