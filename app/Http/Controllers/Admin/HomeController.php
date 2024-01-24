<?php

namespace App\Http\Controllers\Admin;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Bendahara\Payment;
use App\Http\Controllers\Controller;

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
        $siswa= Siswa::get();
        $siswadu=Siswa::has('payments')->count();
        $tkj = $siswa->where('jurusan','TKJ')->count();
        $tsm = $siswa->where('jurusan','TSM')->count();
        $tkr = $siswa->where('jurusan','TKR')->count();
        $titl = $siswa->where('jurusan','TITL')->count();
        $tpm = $siswa->where('jurusan','TPM')->count();
        $kuliner = $siswa->where('jurusan','KUL')->count();
        $perhotelan = $siswa->where('jurusan','PHT')->count();

        $tkjdu = Siswa::where('jurusan','TKJ')->whereHas('payments')->count();
        $tsmdu = Siswa::where('jurusan','TSM')->whereHas('payments')->count();
        $tkrdu = Siswa::where('jurusan','TKR')->whereHas('payments')->count();
        $titldu = Siswa::where('jurusan','TITL')->whereHas('payments')->count();
        $tpmdu = Siswa::where('jurusan','TPM')->whereHas('payments')->count();
        $kulinerdu = Siswa::where('jurusan','KUL')->whereHas('payments')->count();
        $perhotelandu = Siswa::where('jurusan','PHT')->whereHas('payments')->count();

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
        return view('home', compact(['siswa','siswadu','data']));
    }
}
