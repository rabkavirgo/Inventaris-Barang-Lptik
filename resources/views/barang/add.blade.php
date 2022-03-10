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
      <script>
     $( function() {
    $( "#date" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );
  </script>
@endpush
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Sistem Inventaris LPTIK UNIB
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    <div class="alert alert-primary alert-block text-center" id="keterangan">

                        <strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong><br> Silahkan tambahkan usulan kegiatan anda, harap melengkapi data terlebih dahulu agar proses pengajuan usulan tidak ada masalah kedepannya !!
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('barang.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Nama Barang</label>
                                <input type="text" name="namaBarang" class="tags form-control @error('namaBarang') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('namaBarang'))
                                        <small class="form-text text-danger">{{ $errors->first('namaBarang') }}</small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Nama Ruangan</label>
                                <select name="ruangId" class="form-control" id="">
                                <option disabled>-- pilih Ruangan --</option>
                                    @foreach ($barang as $barang)
                                        <option value="{{ $barang->ruangId}}">{{ $barang->namaRuang }}</option>
                                    @endforeach
                                    </select>
                                <div>
                                    @if ($errors->has('ruangId'))
                                        <small class="form-text text-danger">{{ $errors->first('ruangId') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <select name="keterangan" class="form-control">
                                    <option disabled>-- pilih keterangan --</option>
                                    <option value="bagus">BAGUS</option>
                                    <option value="rusak">rusak</option>
                                </select>
                                <div>
                                    @if ($errors->has('keterangan'))
                                        <small class="form-text text-danger">{{ $errors->first('keterangan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Status</label>
                                <input type="text" name="status" class="tags form-control @error('status') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('status'))
                                        <small class="form-text text-danger">{{ $errors->first('status') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Status Perbaikan</label>
                                <select name="statusPerbaikan" class="form-control">
                                    <option disabled>-- pilih status --</option>
                                    <option value="BAIK">BAIK</option>
                                    <option value="RUSAK">RUSAK</option>
                                </select>
                                <div>
                                    @if ($errors->has('statusPerbaikan'))
                                        <small class="form-text text-danger">{{ $errors->first('statusPerbaikan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div>
                            
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Tanggal Masuk</label>
                                <input type="date" name="tanggalMasuk" id="date" class="tags form-control @error('tanggalMasuk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('tanggalMasuk'))
                                        <small class="form-text text-danger">{{ $errors->first('tanggalMasuk') }}</small>
                                    @endif
                                </div>
                            </div>

                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <a href="" class="btn btn-warning btn-sm" style="color: white"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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
