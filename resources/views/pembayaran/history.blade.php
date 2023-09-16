@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<h1>Histori Pembayaran</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('pembayaran.history') }}" method="GET">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="start_date">Tgl Awal:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}">
                </div>
                <div class="form-group col-lg-4">
                    <label for="end_date">Tgl Akhir:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}">
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari Per Tanggal</button>
                </div>
            </div>

        </form>
    </div>
<div class="card-body">
<div class="table-responsive">
    <table class="table table-hover text-nowrap">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Tagihan</th>
                <th>Tahun</th>
                <th>Nominal</th>
                <th>Status pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiPembayaran as $pembayaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pembayaran->siswa->nama }}</td>
                <td>{{ $pembayaran->tagihan->nama_tagihan }}</td>
                <td>{{ $pembayaran->tahun->tahun }}</td>
                <td>{{ $pembayaran->nominal }}</td>
                <td>
                    @if($pembayaran->nominal >= $pembayaran->tagihan->nominal)
                    <span class="badge badge-success">Lunas</span>
                    @else
                        Kurang: {{ $pembayaran->tagihan->nominal - $pembayaran->nominal }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

</script>
<script> console.log('halaman profil'); </script>
@stop
