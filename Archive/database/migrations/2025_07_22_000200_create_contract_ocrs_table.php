<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contract_ocrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('page_number');
            $table->longText('text_content');
            $table->json('text_blocks')->nullable(); // JSON blocks with bounding box data
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('contract_ocrs');
    }
};
