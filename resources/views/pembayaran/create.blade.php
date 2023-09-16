@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<h1>Input Pembayaran</h1>
@stop

@section('content')
<div class="container">

    <!-- Form untuk pencarian siswa -->
    <form action="{{ route('pembayaran.create') }}" method="GET">
        <div class="input-group mb-3 col-lg-5">
            <input type="text" name="search" class="form-control" placeholder="Pencarian siswa" aria-label="Pencarian siswa" aria-describedby="basic-addon2 value="{{ request()->query('search') }}">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Cari</button>
            </div>
          </div>
    </form>

    <!-- Tabel untuk menampilkan daftar siswa -->
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>No Pendaft</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswaList as $siswa)
            <tr>
                <td>{{ $siswaList->firstItem() + $loop->index }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{$siswa->no_pendaf}}</td>
                <td>{{$siswa->jurusan}}</td>
                <td>
                    <!-- Tombol modal untuk input pembayaran -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputPembayaranModal{{ $siswa->id }}">
                        Input Pembayaran
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tampilkan pagination links -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination m-0 float-right">
            {!! $siswaList->links() !!}
        </ul>
    </div>

    @foreach($siswaList as $siswa)
    <div class="modal fade" id="inputPembayaranModal{{ $siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="inputPembayaranModalLabel{{ $siswa->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputPembayaranModalLabel{{ $siswa->id }}">Input Pembayaran untuk {{ $siswa->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk input pembayaran -->
                    <form action="{{ route('pembayaran.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                        <div class="form-group">
                            <label for="tagihan_id">Pilih Tagihan:</label>
                            <select name="tagihan_id" id="tagihan_id" class="form-control">
                                @foreach($tagihanList as $tagihan)
                                    <option value="{{ $tagihan->id }}">{{ $tagihan->nama_tagihan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_id">Pilih Tahun:</label>
                            <select name="tahun_id" id="tahun_id" class="form-control">
                                @foreach($tahunList as $tahun)
                                    <option value="{{ $tahun->id }}">{{ $tahun->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal:</label>
                            <input type="number" name="nominal" id="nominal" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

</script>
<script> console.log('halaman profil'); </script>
@stop
