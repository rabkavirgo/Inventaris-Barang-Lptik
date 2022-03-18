@extends('admin/layouts.layout')
@section('login_as','Administrator')
@section('user-login')
    {{ Auth::user()->name }}
@endsection
@section('title', 'LPTIK')
@section('sidebar-menu')
    @include('admin/layouts.sidebar')
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

                        <strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong><br> Silahkan tambahkan data barang yang dimiliki oleh masing - masing ruangan, harap diperhatikan detail setiap isian data
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('barang.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Barang</label>
                                <input type="text" name="namaBarang" class="tags form-control @error('namaBarang') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('namaBarang'))
                                        <small class="form-text text-danger">{{ $errors->first('namaBarang') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Kode Barang</label>
                                <input type="text" name="kodeBarang" class="tags form-control @error('kodeBarang') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('kodeBarang'))
                                        <small class="form-text text-danger">{{ $errors->first('kodeBarang') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Ruang</label>
                                <select name="ruangId" class="form-control">
                                    <option disabled selected>-- pilih ruang --</option>
                                    @foreach ($ruang as $ruang)
                                        <option value="{{ $ruang->id }}">{{ $ruang->namaRuangan }}</option>
                                    @endforeach
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
                                    <option disabled>-- pilih jenis --</option>
                                    <option value="elektronik">Elektronik</option>
                                    <option value="nonelektronik">Non Elektronik</option>
                                </select>
                                <div>
                                    @if ($errors->has('statusPerbaikan'))
                                        <small class="form-text text-danger">{{ $errors->first('statusPerbaikan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Kondisi</label>
                                <select name="kondisi" class="form-control">
                                    <option disabled>-- pilih Kondisi --</option>
                                    <option value="bagus">BAGUS</option>
                                    <option value="rusak">RUSAK</option>
                                </select>
                                <div>
                                    @if ($errors->has('kondisi'))
                                        <small class="form-text text-danger">{{ $errors->first('kondisi') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Merk</label>
                                <input type="text" name="merk" class="tags form-control @error('merk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('merk'))
                                        <small class="form-text text-danger">{{ $errors->first('merk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Asal Perolehan</label>
                                <input type="text" name="asalPerolehan" class="tags form-control @error('asalPerolehan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('asalPerolehan'))
                                        <small class="form-text text-danger">{{ $errors->first('asalPerolehan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Bahan</label>
                                <input type="text" name="bahan" class="tags form-control @error('bahan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('bahan'))
                                        <small class="form-text text-danger">{{ $errors->first('bahan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="text" name="harga" class="tags form-control @error('harga') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('harga'))
                                        <small class="form-text text-danger">{{ $errors->first('harga') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Catatan</label>
                                <input type="text" name="catatan" class="tags form-control @error('catatan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('catatan'))
                                        <small class="form-text text-danger">{{ $errors->first('catatan') }}</small>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Masuk</label>
                                <input type="date" name="waktuMasuk" id="date" class="tags form-control @error('waktuMasuk') is-invalid @enderror" />
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
