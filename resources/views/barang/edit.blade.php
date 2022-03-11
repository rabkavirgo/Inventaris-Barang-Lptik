@extends('layouts.layout')
@section('title', 'Manajemen Klasifikasi Berkas')
@section('sidebar-menu')
    @include('layouts.sidebar')
@endsection
@push('styles')
    <style>
        #selengkapnya{
            color:#5A738E;
            text-decoration:none;
            cursor:pointer;
        }
        #selengkapnya:hover{
            color:#007bff;
        }
    </style>
@endpush
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Arsip Dokumen Universitas Bengkulu
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    <div class="alert alert-primary alert-block text-center" id="keterangan">

                        <strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong><br> Silahkan tambahkan usulan kegiatan anda, harap melengkapi data terlebih dahulu agar proses pengajuan usulan tidak ada masalah kedepannya !!
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('barang.update',[$data->id]) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('PATCH') }}

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Barang</label>
                                <input type="text" value="{{ $data->namaBarang }}" name="namaBarang" class="tags form-control @error('akNama') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('namaBarang'))
                                        <small class="form-text text-danger">{{ $errors->first('namaBarang') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Kode Barang</label>
                                <input type="text" value="{{ $data->kodeBarang }}" name="kodeBarang" class="tags form-control @error('akNama') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('kodeBarang'))
                                        <small class="form-text text-danger">{{ $errors->first('kodeBarang') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Ruang</label>
                                <select name="ruangId" class="form-control">
                                    <option disabled>-- pilih Ruang --</option>
                                    <option {{ $data->ruangId == "1" ? 'selected' : '' }} value="1">ADMIN</option>
                                    <option {{ $data->ruangId == "2" ? 'selected' : '' }} value="2">SIM</option>
                                    <option {{ $data->ruangId == "3" ? 'selected' : '' }} value="3">HALL</option>
                                    <option {{ $data->ruangId == "4" ? 'selected' : '' }} value="4">JARINGAN</option>
                                    <option {{ $data->ruangId == "5" ? 'selected' : '' }} value="5">MULTIMEDIA</option>
                                    <option {{ $data->ruangId == "6" ? 'selected' : '' }} value="6">LABORATORIUM 1</option>
                                    <option {{ $data->ruangId == "7" ? 'selected' : '' }} value="7">LABORATORIUM 2</option>
                                    <option {{ $data->ruangId == "8" ? 'selected' : '' }} value="8">LABORATORIUM 3</option>
                                    <option {{ $data->ruangId == "9" ? 'selected' : '' }} value="9">LABORATORIUM 4</option>
                                    <option {{ $data->ruangId == "10" ? 'selected' : '' }} value="10">LABORATORIUM 5</option>
                                   
                                </select>
                                <div>
                                    @if ($errors->has('ruangId'))
                                        <small class="form-text text-danger">{{ $errors->first('ruangId') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Barang</label>
                                <select name="jenisBarang" class="form-control">
                                    <option disabled>-- pilih Jenis --</option>
                                    <option {{ $data->jenisBarang == "elektronik" ? 'selected' : '' }} value="elektronik">ELEKTRONIK</option>
                                    <option {{ $data->jenisBarang == "nonelektronik" ? 'selected' : '' }} value="nonelektronik">NON ELEKTRONIK</option>
                                </select>
                                <div>
                                    @if ($errors->has('jenisBarang'))
                                        <small class="form-text text-danger">{{ $errors->first('jenisBarang') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Kondisi</label>
                                <select name="kondisi" class="form-control">
                                    <option disabled>-- pilih Kondisi --</option>
                                    <option {{ $data->kondisi == "bagus" ? 'selected' : '' }} value="bagus">BAGUS</option>
                                    <option {{ $data->kondisi == "rusak" ? 'selected' : '' }} value="rusak">RUSAK</option>
                                </select>
                                <div>
                                    @if ($errors->has('kondisi'))
                                        <small class="form-text text-danger">{{ $errors->first('kondisi') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Status Perbaikan</label>
                                <select name="statusPerbaikan" class="form-control">
                                    <option disabled>-- pilih status --</option>
                                    <option value="0">Pernah</option>
                                    <option value="1">Belum</option>
                                </select>
                                <div>
                                    @if ($errors->has('statusPerbaikan'))
                                        <small class="form-text text-danger">{{ $errors->first('statusPerbaikan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Merk</label>
                                <input type="text" value="{{ $data->merk }}" name="merk" class="tags form-control @error('merk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('merk'))
                                        <small class="form-text text-danger">{{ $errors->first('merk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Asal Perolehan</label>
                                <input type="text" value="{{ $data->asalPerolehan }}" name="asalPerolehan" class="tags form-control @error('asalPerolehan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('asalPerolehan'))
                                        <small class="form-text text-danger">{{ $errors->first('asalPerolehan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Bahan</label>
                                <input type="text" value="{{ $data->bahan }}" name="bahan" class="tags form-control @error('bahan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('bahan'))
                                        <small class="form-text text-danger">{{ $errors->first('bahan') }}</small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="text" value="{{ $data->harga }}" name="harga" class="tags form-control @error('harga') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('harga'))
                                        <small class="form-text text-danger">{{ $errors->first('harga') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Catatan</label>
                                <input type="text" value="{{ $data->catatan }}" name="catatan" class="tags form-control @error('harga') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('catatan'))
                                        <small class="form-text text-danger">{{ $errors->first('catatan') }}</small>
                                    @endif
                                </div>
                            </div>

                           

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Masuk</label>
                                <input type="date" value="{{ $data->waktuMasuk }}" name="waktuMasuk" class="tags form-control @error('tanggalMasuk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('waktuMasuk'))
                                        <small class="form-text text-danger">{{ $errors->first('waktuMasuk') }}</small>
                                    @endif
                                </div>
                            </div>

                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <a href="{{ route('barang') }}" class="btn btn-warning btn-sm" style="color: white"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i>&nbsp;Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp;Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.tags-selector').select2();
        })
    </script>
@endpush
