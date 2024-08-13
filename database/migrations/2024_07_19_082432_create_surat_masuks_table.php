<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('surat_dari');
            $table->date('tgl_terima');
            $table->date('tgl_surat');
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('status')->default('dibuat');
            $table->string('jenis_surat');
            $table->string('klasifikasi_surat');
            $table->string('derajat_surat');
            $table->string('disposisi')->nullable();
            $table->string('diteruskan')->nullable();
            $table->string('cc')->nullable();
            $table->text('isi_surat')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
