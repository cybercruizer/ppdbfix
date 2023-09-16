@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <x-adminlte-callout theme="success" title="Pendaftar per Jurusan">
        <div class="row">
            <div class="col-md-4">
                <x-adminlte-info-box title="PERHOTELAN" text="{{$data[6]['value']}}" icon="fas fa-lg fa-hotel text-light" icon-theme="gradient-orange"/>
            </div>
            <div class="col-md-4">
                <x-adminlte-info-box title="KULINER" text="{{$data[5]['value']}}" icon="fas fa-lg fa-utensils text-light" icon-theme="gradient-pink"/>
            </div>
            <div class="col-md-4">
                <x-adminlte-info-box title="TPM" text="{{$data[1]['value']}}" icon="fas fa-lg fa-cogs text-light" icon-theme="gradient-red"/>
            </div>
        </div>
        <div class="row">
                <div class="col-md-3">
                    <x-adminlte-info-box title="TKR" text="{{$data[2]['value']}}" icon="fas fa-lg fa-car-side text-light" icon-theme="gradient-green"/>
                </div>
                <div class="col-md-3">
                    <x-adminlte-info-box title="TKJ" text="{{$data[0]['value']}}" icon="fas fa-lg fa-desktop text-light" icon-theme="gradient-blue"/>
                </div>
                <div class="col-md-3">
                    <x-adminlte-info-box title="TSM" text="{{$data[3]['value']}}" icon="fas fa-lg fa-motorcycle text-light" icon-theme="gradient-orange"/>
                </div>
                <div class="col-md-3">
                    <x-adminlte-info-box title="TITL" text="{{$data[4]['value']}}" icon="fas fa-lg fa-bolt text-light" icon-theme="gradient-yellow"/>
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
            var subValues = data.map(item => item.sub_value);

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
                        data: subValues,
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
    <script> console.log('Hi!'); </script>
@stop
