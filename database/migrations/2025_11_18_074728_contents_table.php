<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('judul');

            $table->foreignId('program_id')->nullable()->constrained('programs')->onDelete('set null');
            $table->foreignId('klasifikasi_id')->nullable()->constrained('classifications')->onDelete('set null');
            $table->foreignId('medsos_id')->nullable()->constrained('social_media')->onDelete('set null');
            $table->foreignId('format_id')->nullable()->constrained('formats')->onDelete('set null');

            $table->string('link')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
