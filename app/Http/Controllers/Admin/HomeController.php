<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $siswa= Siswa::all();
        $tkj = $siswa->where('jurusan','TKJ')->count();
        $tsm = $siswa->where('jurusan','TSM')->count();
        $tkr = $siswa->where('jurusan','TKR')->count();
        $titl = $siswa->where('jurusan','TITL')->count();
        $tpm = $siswa->where('jurusan','TPM')->count();
        $kuliner = $siswa->where('jurusan','KUL')->count();
        $perhotelan = $siswa->where('jurusan','PHT')->count();
        $tkjdu = $siswa->where('du','1')->where('jurusan','TKJ')->count();
        $tsmdu = $siswa->where('du','1')->where('jurusan','TSM')->count();
        $tkrdu = $siswa->where('du','1')->where('jurusan','TKR')->count();
        $titldu = $siswa->where('du','1')->where('jurusan','TITL')->count();
        $tpmdu = $siswa->where('du','1')->where('jurusan','TPM')->count();
        $kulinerdu = $siswa->where('du','1')->where('jurusan','KUL')->count();
        $perhotelandu = $siswa->where('du','1')->where('jurusan','PHT')->count();

        $data = [
            ['label' => 'TKJ', 'value' => $tkj, 'sub_value' => $tkjdu],
            ['label' => 'TPM', 'value' => $tpm, 'sub_value' => $tpmdu],
            ['label' => 'TKR', 'value' => $tkr, 'sub_value' => $tkrdu],
            ['label' => 'TSM', 'value' => $tsm, 'sub_value' => $tsmdu],
            ['label' => 'TITL', 'value' => $titl, 'sub_value' => $titldu],
            ['label' => 'KUL', 'value' => $kuliner, 'sub_value' => $kulinerdu],
            ['label' => 'PHT', 'value' => $perhotelan, 'sub_value' => $perhotelandu],
        ];
        //dd($data);
        return view('home', compact('data'));
    }
}
