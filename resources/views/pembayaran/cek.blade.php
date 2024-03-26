@foreach ($siswas as $siswa)
    <p>{{ $siswa->id }},{{ $siswa->nama }}, {{ $siswa->tagihan->id ?? 'kosong' }}</p>
@endforeach
