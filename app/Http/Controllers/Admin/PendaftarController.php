<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Guru;
use App\Models\Siswa;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use App\Models\Bendahara\Tagihan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->perhalaman=20; //Data yang ditampilkan per halaman
    }

    public function index()
    {
        $siswa = Siswa::orderBy('id','DESC')->paginate($this->perhalaman);
        $title = 'Data Pendaftar';
        return view('pendaftar',['siswa'=>$siswa,'title'=>$title]);
    }
    public function pondok()
    {
        $siswa= Siswa::where('no_pendaf', 'LIKE', '%'.'PDK'.'%')->orderBy('id','DESC')->paginate($this->perhalaman);
        return view("ap_index",['siswa'=>$siswa,'title'=>'Pendaftar Pondok']);

    }

    public function perjurusan($jurusan)
    {
        $siswa = Siswa::where('jurusan',$jurusan)->paginate($this->perhalaman);
        if($jurusan=='PHT') {
            $jurusan='PERHOTELAN';
        } else if ($jurusan=='KUL') {
            $jurusan = 'KULINER';
        }
        $title = 'Data Pendaftar '.strtoupper($jurusan);
        return view('pendaftar',['siswa'=>$siswa,'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa= Siswa::find($id);
        $ortu= $siswa ->ortu;
        $guru= Guru::select('id','nama')->get()->pluck('nama','id');
        return view('pendaftar_edit',['siswa'=>$siswa,'ortu'=>$ortu,'guru'=> $guru]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrfail($id);
        $siswa -> nama = $request->input('nama');
        $siswa -> no_pendaf = $request->input('no_pendaf');
        $siswa -> jurusan = $request->input('jurusan');
        //$siswa -> alasan = $request->input('alasan');
        //$siswa -> nisn = $request->input('nisn');
        $siswa -> tempat_lahir = $request->input('tempat_lahir');
        $siswa -> tgl_lahir = $request->input('tgl_lahir');
        $siswa -> jenis_kelamin = $request->input('jenis_kelamin');
        //$siswa -> agama = $request->input('agama');
        //$siswa -> anak_ke = $request->input('anak_ke');
        //$siswa -> dari = $request->input('dari');
        $siswa -> alamat = $request->input('alamat');
        $siswa -> asal_sekolah = $request->input('asal_sekolah');
        //$siswa -> alamat_sekolah = $request->input('alamat_sekolah');
        $siswa -> no_telp = $request->input('no_telp');
        //$siswa -> hobi = $request->input('hobi');
        //$siswa -> jarak = $request->input('jarak');
        //$siswa -> transport = $request->input('transportasi');
        //$siswa -> informasi = $request->input('info');
        $siswa->rekomendator = $request->input('rekomendator');
        $siswa -> kategori = $request->input('kategori');
        $siswa-> guru_id = $request->input('guru_id');
        $siswa -> pondok = $request->input('pondok');
        $siswa -> save();

        $ortu= $siswa->ortu;
        $ortu -> nama_ayah = $request->input('nama_ayah');
        $ortu -> nama_ibu = $request->input('nama_ibu');
        //$ortu -> telp = $request->input('telp_ortu');
        //$ortu -> alamat_ortu = $request->input('alamat_ortu');
        //$ortu -> kerjaayah_id = $request->input('kerja_ayah');
        //$ortu -> kerjaibu_id = $request->input('kerja_ibu');
        //$ortu -> gajiayah_id = $request->input('gaji_ayah');
        //$ortu -> gajiibu_id = $request->input('gaji_ibu');
        //$ortu -> nama_wali = $request->input('nama_wali');
        //$ortu -> alamat_wali = $request->input('alamat_wali');
        //$ortu -> telp_wali = $request->input('telp_wali');
        $ortu -> save();

        $tagihan = $siswa->tagihan;
        $nominal_bayar = 1000000; //Ganti sesuai gelombang
        //if ( $request->input('kategori') == 'REG' ) {
        //    $tagihan->nominal = $nominal_bayar;
        //} else if ($request->input('kategori') == 'AP50'|| $request->input('kategori') == 'KB'|| $request->input('kategori') == 'KB2') {
        //    $tagihan->nominal = $nominal_bayar*50/100;
        //} else if ($request->input('kategori') == 'AP100') {
        //    $tagihan->nominal = 0;
        //}
        $tagihan -> siswa_id = $siswa->id;
        $tagihan -> nama_tagihan = "ppdb";
        $tagihan -> nominal = $nominal_bayar;
        $tagihan -> save();
        alert()->success('Sukses!','Data berhasil diubah');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $siswa=Siswa::with('tagihan')->findOrFail($id);
        $siswa->tagihan()->delete();
        //foreach ($siswa->tagihan() as $tgh) {
        //        $tgh->delete();
        //};
        $siswa->ortu->delete();
        $siswa->delete();
        alert()->success('Sukses!','Data berhasil dihapus');
        return redirect()->back();
    }
    public function cari(Request $request)
	{
        // menangkap data pencarian
		$cari = $request->cari;
        $title = 'Hasil Pendarian';

    		// mengambil data dari table pegawai sesuai pencarian data
		$siswa = Siswa::where('nama','like',"%".$cari."%")->paginate($this->perhalaman);

    		// mengirim data pegawai ke view index
		return view('pendaftar',['siswa' => $siswa,'title'=>$title]);

	}
    public function exportExcel ()
    {
        return Excel::download(new SiswaExport, 'Data Pendaftar.xlsx');
    }
}
