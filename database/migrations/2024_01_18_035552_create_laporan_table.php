<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateLaporanTable extends Migration
{
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nama');
            $table->enum('kategori', [
                'Fasilitas Umum',
                'Kebersihan',
                'Keamanan',
                'Hak Asasi',
                'Kurikulum',
                'Pelayanan Guru',
                'Disiplin Siswa',
                'Kesehatan',
                'Kegiatan Ekstrakurikuler',
                'Pungutan Liar',
                'Bullying',
                'Pelanggaran Tata Tertib',
                'Kualitas Makanan Kantin',
                'Perlindungan Lingkungan',
                'Penggunaan Narkoba',
                'Pelecehan Seksual',
                'Kedisiplinan Guru',
                'Sistem Evaluasi',
                'Sarana Prasarana',
                'Kualitas Pembelajaran',
                'Sistem Informasi Sekolah',
                'Kesejahteraan Siswa',
                'Kualitas Bimbingan Konseling',
                'Pelayanan Administrasi'
            ]);
            $table->text('isi_laporan');
            $table->date('tanggal_laporan');
            $table->string('foto');
            $table->string('alamat');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
