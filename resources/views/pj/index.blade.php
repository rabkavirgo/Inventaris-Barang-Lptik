
@extends('layouts.layout')
@section('title', 'Manajemen Data Personal')

@section('sidebar-menu')
    @include('layouts.sidebar')
@endsection
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
                            @else
                            <div class="alert alert-success alert-block" id="">
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data Penanggung Jawab

                            </div>
                    @endif
                </div>
                <div class="col-md-12">
                <a href="{{ route('pj.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
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
                                <th>Nama Penanggung Jawab</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($pj as $pj)
                            <tr>
                                <td> {{ $no++}} </td>

                                <td> {{ $pj->name}}</td>
                                <td> {{ $pj->email}}</td>
                                <td>
                                <a href="{{ route('pj.edit',[$pj->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                <form action="{{ route('pj.delete',[$pj->id]) }}" method="POST">
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
