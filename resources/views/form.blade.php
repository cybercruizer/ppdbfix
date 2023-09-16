<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Form</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/Navbar-vmnt.css') }}">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md sticky-top bg-info navigation-clean-search" style="padding: 5px;background: rgb(25,111,190);">
        <div class="container-fluid"><a class="navbar-brand" style="color:#eeeeee;" href="#">Form PPDB 2024/ 2025</a><button class="navbar-toggler" data-toggle="collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
    </nav>
    <form method="post" action="/pendaftar/store">
        {{ csrf_field() }}
    <div class="container">
        <div class="card" style="margin-top: 20px;">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header bg-info">
                <h5 class="text-white mb-0">DATA CALON SISWA</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive border rounded">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jurusan</td>
                                <td><select class="border rounded-pill shadow-sm form-control-lg" name="jurusan" id="jurusan">
                                        <option value="TKJ">Teknik Komputer dan Jaringan</option>
                                        <option value="TPM">Teknik Pemesainan</option>
                                        <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                                        <option value="TKR">Teknik Kendaraan Ringan</option>
                                        <option value="TSM">Teknik Sepeda Motor</option>
                                        <option value="PHT">Perhotelan</option>
                                        <option value="KUL">Kuliner</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Nomor pendaftaran</td>
                                <td><input class="border rounded-pill shadow-sm form-control-lg" type="text" name="no_pendaf" id="no_pendaf" style="width: 100%;" value="{{old('no_pendaf')}}"></td>
                            </tr>

                            <tr>
                                <td>Alasan memilih jurusan</td>
                                <td><input value="{{old('alasan')}}" class="border rounded-pill shadow-sm form-control-lg" type="text" name="alasan" style="width: 100%;"></td>
                            </tr>
                            <tr>
                                <td>Nama lengkap</td>
                                <td><input class="border rounded-pill shadow-sm form-control-lg" type="text" name="nama" style="width: 100%;" value="{{old('nama')}}"></td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td><input value="{{old('nisn')}}" class="border rounded-pill shadow-sm form-control-lg" type="text" name="nisn" style="width: 100%;"></td>
                            </tr>
                            <tr>
                                <td>Tempat &amp; tanggal lahir</td>
                                <td><input value="{{old('tempat_lahir')}}" class="border rounded-pill shadow-sm form-control-lg" type="text" name="tempat_lahir" style="width: 300px;" placeholder="Kabupaten/ Kota">&nbsp;&nbsp;<input class="border rounded-pill form-control-lg" type="date" name="tgl_lahir"></td>
                            </tr>
                            <tr>
                                <td>Jenis kelamin</td>
                                <td><select class="border rounded shadow-sm form-control-lg" name="jenis_kelamin">
                                        <option value="L" selected="">Laki- Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td><select class="border rounded shadow-sm form-control-lg d-xl-flex" name="agama">
                                        <option value="Islam" selected="">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td colspan="2">Anak ke&nbsp;<input class="border rounded-pill shadow-sm form-control-lg" type="text" name="anak_ke" style="width: 100px;">&nbsp;dari&nbsp;<input class="border rounded-pill shadow-sm form-control-lg" type="text" name="dari" style="width: 100px;">&nbsp;bersaudara</td>
                            </tr>
                            <tr>
                                <td>Alamat lengkap</td>
                                <td><textarea value="{{old('alamat')}}" class="shadow-sm form-control-lg h-100" style="width: 100%;" name="alamat" placeholder="Nama Jalan, RT, RW, Dusun, Desa, Kecamatan" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah (SMP)</td>
                                <td><input value="{{old('asal_sekolah')}}" class="border rounded-pill shadow-sm form-control-lg" type="text" name="asal_sekolah" style="width: 100%;"></td>
                            </tr>
                            <tr>
                                <td>Alamat Sekolah (SMP)</td>
                                <td><textarea value="{{old('alamat_sekolah')}}" class="shadow-sm form-control-lg h-100" style="width: 100%;" name="alamat_sekolah" placeholder="Nama Jalan, RT, RW, Dusun, Desa, Kecamatan" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td>Nomor Telp / HP</td>
                                <td><input value="{{old('no_telp')}}" class="border rounded-pill shadow-sm form-control-lg" type="text" name="no_telp" style="width: 100%;"></td>
                            </tr>
                            <tr>
                                <td>Hobi</td>
                                <td>
                                    <div class="border rounded shadow-sm btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-primary active">
                                            Olahraga
                                            <input type="radio" id="btnradio-20" name="hobi" value="1">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Kesenian
                                            <input type="radio" id="btnradio-21" name="hobi" value="2">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Membaca
                                            <input type="radio" id="btnradio-22" name="hobi" value="3">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Menulis
                                            <input type="radio" id="btnradio-23" name="hobi" value="4">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Lainnya
                                            <input type="radio" id="btnradio-24" name="hobi" value="5">
                                        </label>
                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Jarak ke sekolah</td>
                                <td>
                                    <div class="border rounded shadow-sm btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-primary active">
                                            0-1 km
                                            <input type="radio" id="btnradio-15" name="jarak"  value="1">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            1-3 km
                                            <input type="radio" id="btnradio-14" name="jarak" value="2">
                                        </label><label class="btn btn-outline-primary">
                                            3-5 km
                                            <input type="radio" id="btnradio-16" name="jarak" value="3">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            5-10 km
                                            <input type="radio" id="btnradio-17" name="jarak" value="4">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            lebih dari 10 km
                                            <input type="radio" id="btnradio-18" name="jarak" value="5">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Transportasi</td>
                                <td>
                                    <div class="border rounded shadow-sm btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-primary active">
                                            Jalan kaki
                                            <input type="radio" id="btnradio-2" name="transportasi" value="1">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Sepeda
                                            <input type="radio" id="btnradio-3" name="transportasi" value="2">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Motor
                                            <input type="radio" id="btnradio-4" name="transportasi" value="3">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Angkutan
                                            <input type="radio" id="btnradio-5" name="transportasi" value="4">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Lainnya
                                            <input type="radio" id="btnradio-6" name="transportasi" value="5">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sumber informasi SMK</td>
                                <td>
                                    <div class="border rounded shadow-sm btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-primary active">
                                            Teman
                                            <input type="radio" id="btnradio-7" name="info" value="1">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Internet
                                            <input type="radio" id="btnradio-8" name="info" value="2">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Baliho
                                            <input type="radio" id="btnradio-9" name="info" value="3">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Radio
                                            <input type="radio" id="btnradio-10" name="info" value="4">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Guru
                                            <input type="radio" id="btnradio-11" name="info" value="5">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Surat Kabar
                                            <input type="radio" id="btnradio-12" name="info" value="6">
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            Spanduk
                                            <input type="radio" id="btnradio-13" name="info" value="7">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="mb-0 text-white">DATA ORANG TUA/ WALI</h5>
                    </div>
                    <div class="card-body" style="margin-bottom: 0;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama ayah</td>
                                        <td><input value="{{old('nama_ayah')}}" class="border rounded-pill shadow-sm form-control-lg" type="text" name="nama_ayah" style="width: 100%;"></td>
                                    </tr>
                                    <tr>
                                        <td>Nama ibu</td>
                                        <td><input value="{{old('nama_ibu')}}"class="border rounded-pill shadow-sm form-control-lg" type="text" name="nama_ibu" style="width: 100%;"></td>
                                    </tr>
                                    <tr>
                                        <td>No Telp/ HP</td>
                                        <td><input value="{{old('telp_ortu')}}" class="border rounded-pill shadow-sm form-control-lg" type="text" name="telp_ortu" style="width: 100%;"></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat orang tua</td>
                                        <td><textarea value="{{old('alamat_ortu')}}" class="shadow-sm form-control-lg h-100" type="textarea" name="alamat_ortu" style="width: 100%;" rows="3"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan ayah</td>
                                        <td><select class="border rounded shadow-sm form-control-lg" name="kerja_ayah">
                                                <option value="1" selected="">PNS</option>
                                                <option value="2">TNI / POLRI</option>
                                                <option value="3">Guru</option>
                                                <option value="4">Wiraswasta</option>
                                                <option value="5">Petani</option>
                                                <option value="6">Buruh</option>
                                                <option value="7">Pegawai Swasta</option>
                                                <option value="8">Pedagang</option>
                                                <option value="9">Lainnya</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan ibu</td>
                                        <td><select class="border rounded shadow-sm form-control-lg" name="kerja_ibu">
                                                <optgroup label="kerja_ayah">
                                                    <option value="1" selected="">PNS</option>
                                                    <option value="2">TNI / POLRI</option>
                                                    <option value="3">Guru</option>
                                                    <option value="4">Wiraswasta</option>
                                                    <option value="5">Petani</option>
                                                    <option value="6">Buruh</option>
                                                    <option value="7">Pegawai Swasta</option>
                                                    <option value="8">Pedagang</option>
                                                    <option value="9">Lainnya</option>
                                                </optgroup>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Gaji ayah</td>
                                        <td><select class="border rounded shadow-sm form-control-lg" name="gaji_ayah">
                                                <optgroup label="gaji_ayah">
                                                    <option value="1" selected="">Kurang dari 500.000</option>
                                                    <option value="2">500.000 - 1.000.000</option>
                                                    <option value="3">1.000.000 - 3.000.000</option>
                                                    <option value="4">3.000.000 - 5.000.000</option>
                                                    <option value="5">Lebih dari 5.000.000</option>
                                                </optgroup>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Gaji ibu</td>
                                        <td><select class="border rounded shadow-sm form-control-lg" name="gaji_ibu">
                                                <optgroup label="gaji_ibu">
                                                    <option value="1" selected="">Kurang dari 500.000</option>
                                                    <option value="2">500.000 - 1.000.000</option>
                                                    <option value="3">1.000.000 - 3.000.000</option>
                                                    <option value="4">3.000.000 - 5.000.000</option>
                                                    <option value="5">Lebih dari 5.000.000</option>
                                                </optgroup>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Apakah tinggal dgn wali?</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="container mt-4">
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="showForm">
                                                  <label class="form-check-label" for="showForm">
                                                    Centang tinggal dengan wali. Jika tinggal dengan orang tua, tidak usah dicentang
                                                  </label>
                                                </div>
                                                <div id="formInputs" style="display:none;">
                                                  <div class="form-group">
                                                    <label for="nama">Nama wali:</label>
                                                    <input type="text" class="form-control" id="nama" name="nama_wali">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="alamat">Alamat wali:</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat_wali">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="nomor_telepon">Nomor Telepon wali:</label>
                                                    <input type="text" class="form-control" id="nomor_telepon" name="telp_wali">
                                                  </div>
                                                </div>
                                              </div>
                                        </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p style="margin-top: 20px;">Pastikan data sudah terisi dengan lengkap, kemudian klik tombol "KIRIM FORM" di bawah ini :</p>
                <button class="btn btn-primary btn-lg font-weight-bold border rounded shadow-sm" type="submit" style="margin-top: 1px;"><i class="fas fa-paper-plane"></i>&nbsp;KIRIM FORM</button>
            </div>
        </div>
    </div>
</form>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const jurusanSelect = document.getElementById("jurusan");
            const nomorPendaftaranInput = document.getElementById("no_pendaf");

            jurusanSelect.addEventListener("change", function() {
                const selectedOption = jurusanSelect.value;
                nomorPendaftaranInput.value = selectedOption + "-";
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          const showFormCheckbox = document.getElementById("showForm");
          const formInputsContainer = document.getElementById("formInputs");

          showFormCheckbox.addEventListener("change", function () {
            formInputsContainer.style.display = this.checked ? "block" : "none";
          });
        });
      </script>
</body>

</html>
