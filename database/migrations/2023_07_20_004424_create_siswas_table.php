<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {

		$table->bigInteger('id',20)->unsigned();
		$table->string('no_pendaf');
		$table->string('nama');
		$table->string('nisn')->nullable()->default('NULL');
		$table->string('tempat_lahir')->nullable()->default('NULL');
		$table->date('tgl_lahir')->nullable()->default('NULL');
		$table->enum('jenis_kelamin',['L','P']);
		$table->enum('agama',['Islam','Kristen','Katholik','Hindu','Budha'])->nullable()->default('NULL');
		$table->string('alamat');
		//$table->integer('desa_id',11)->nullable()->default('NULL');
		$table->string('asal_sekolah');
		$table->string('alamat_sekolah')->nullable()->default('NULL');
		$table->string('no_telp');
		$table->char('jurusan',5);
		$table->integer('ortu_id',11)->nullable()->default('NULL');
		$table->string('rekomendator',50)->nullable()->default('NULL');
		$table->enum('kategori',['REG','AP50','AP100','KB','KB2'])->default('REG');
		$table->tinyInteger('pondok',1)->default('0');
		$table->integer('guru_id',11)->nullable()->default('NULL');
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
