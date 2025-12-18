<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('content_roles', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');
            $table->foreignId('person_id')->constrained('persons')->onDelete('cascade');

            $table->enum('role', [
                'editor_konten',
                'editor_cover',
                'narator',
                'presenter',
                'penulis_naskah',
                'narasumber',
                'kameramen',
                'switcher'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_roles');
    }
};
