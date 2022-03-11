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

                        <strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong><br> Silahkan ubah data ruangan yang memiliki inventaris
                    </div>
                </div>
                <div class="col-md-12">
           <form action="{{ route('ruang.update',[$data->id]) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Ruangan</label>
                                <input type="text" name="namaRuangan" value="{{ $data->namaRuangan }}" class="tags form-control @error('namaRuangan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('namaRuangan'))
                                        <small class="form-text text-danger">{{ $errors->first('namaRuangan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penanggung Jawab</label>
                                <select name="penanggungJawabId" class="form-control" id="">
                                <option disabled selected>-- pilih Penanggung Jawab --</option>
                                    @foreach ($pj as $pj)
                                        <option value="{{ $pj->id}}">{{ $pj->name }}</option>
                                    @endforeach
                                    </select>
                                <div>
                                    @if ($errors->has('penanggungJawabId'))
                                        <small class="form-text text-danger">{{ $errors->first('penanggungJawabId') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <a href="{{ route('ruang') }}" class="btn btn-warning btn-sm" style="color: white"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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
