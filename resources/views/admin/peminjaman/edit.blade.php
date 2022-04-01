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
@endpush
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Sistem Inventaris
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    <div class="alert alert-primary alert-block text-center" id="keterangan">

                        <strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong><br> Silahkan tambahkan usulan kegiatan anda, harap melengkapi data terlebih dahulu agar proses pengajuan usulan tidak ada masalah kedepannya !!
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('pinjam.update',[$data->id]) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('PATCH') }}

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Barang</label>
                                <select name="barangId" class="form-control">
                                    <option disabled>-- pilih ruang --</option>
                                    @foreach ($barang as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->namaBarang }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @if ($errors->has('barangId'))
                                        <small class="form-text text-danger">{{ $errors->first('barangId') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">NIK</label>
                                <input type="text" value="{{ $data->nik }}" name="nik" class="tags form-control @error('akNama') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('nik'))
                                        <small class="form-text text-danger">{{ $errors->first('nik') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Peminjam</label>
                                <input type="text" value="{{ $data->peminjam }}" name="peminjam" class="tags form-control @error('akNama') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('peminjam'))
                                        <small class="form-text text-danger">{{ $errors->first('peminjam') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Catatan</label>
                                <input type="text" value="{{ $data->keterangan }}" name="keterangan" class="tags form-control @error('harga') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('keterangan'))
                                        <small class="form-text text-danger">{{ $errors->first('keterangan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Pinjam</label>
                                <input type="date" value="{{ $data->waktuPinjam }}" name="waktuPinjam" class="tags form-control @error('tanggalMasuk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('waktuPinjam'))
                                        <small class="form-text text-danger">{{ $errors->first('waktuPinjam') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Kembali</label>
                                <input type="date" value="{{ $data->waktuKembali }}" name="waktuKembali" class="tags form-control @error('tanggalMasuk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('waktuKembali'))
                                        <small class="form-text text-danger">{{ $errors->first('waktuKembali') }}</small>
                                    @endif
                                </div>
                            </div>

                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <a href="{{ route('pinjam') }}" class="btn btn-warning btn-sm" style="color: white"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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
