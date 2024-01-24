@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <x-adminlte-callout theme="success" title="Pendaftar per Jurusan">
        <div class="row">
            <div class="col-md-3">
                <x-adminlte-info-box title="SEMUA PENDAFTAR" text="{{ $siswadu }} / {{ $siswa->count() }}" icon="fas fa-lg fa-users text-light" icon-theme="gradient-purple"/>
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="PERHOTELAN" text="{{ $data[6]['sub_value'] }} / {{$data[6]['value']}}" icon="fas fa-lg fa-hotel text-light" icon-theme="gradient-orange"/>
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="KULINER" text="{{ $data[5]['sub_value'] }} / {{$data[5]['value']}}" icon="fas fa-lg fa-utensils text-light" icon-theme="gradient-pink"/>
            </div>
            <div class="col-md-3">
                <x-adminlte-info-box title="TPM" text="{{ $data[1]['sub_value'] }} / {{$data[1]['value']}}" icon="fas fa-lg fa-cogs text-light" icon-theme="gradient-red"/>
            </div>
        </div>
        <div class="row">
                <div class="col-md-3">
                    <x-adminlte-info-box title="TKR" text="{{ $data[2]['sub_value'] }} / {{$data[2]['value']}}" icon="fas fa-lg fa-car-side text-light" icon-theme="gradient-green"/>
                </div>
                <div class="col-md-3">
                    <x-adminlte-info-box title="TKJ" text="{{ $data[0]['sub_value'] }} / {{$data[0]['value']}}" icon="fas fa-lg fa-desktop text-light" icon-theme="gradient-blue"/>
                </div>
                <div class="col-md-3">
                    <x-adminlte-info-box title="TSM" text="{{ $data[3]['sub_value'] }} / {{$data[3]['value']}}" icon="fas fa-lg fa-motorcycle text-light" icon-theme="gradient-orange"/>
                </div>
                <div class="col-md-3">
                    <x-adminlte-info-box title="TITL" text="{{ $data[4]['sub_value'] }} / {{$data[4]['value']}}" icon="fas fa-lg fa-bolt text-light" icon-theme="gradient-yellow"/>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-info-box title="Aksi Peduli" text="{{$siswa->where('no_pendaf', 'LIKE', '%'.'AP'.'%')->count()}}" icon="fas fa-lg fa-gift text-light" icon-theme="gradient-green"/>
            </div>
            <div class="col-md-6">
                <x-adminlte-info-box title="Pondok" text="{{$siswa->where('pondok', '1')->count()}}" icon="fas fa-lg fa-building text-light" icon-theme="gradient-blue"/>
            </div>
    </div>
    </x-adminlte-callout>
    <x-adminlte-callout theme="info" title="Grafik Pendaftar">
        <div class="container">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </x-adminlte-callout>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var data = @json($data);

            var labels = data.map(item => item.label);
            var values = data.map(item => item.value);
            var sub_values = data.map(item => item.sub_value);

            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pendaftar',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Daftar Ulang',
                        data: sub_values,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
         $(document).ready(function() {
            $('.rupiah').mask("#.##0", {
                reverse: true
            });
        });
    </script>

@stop
