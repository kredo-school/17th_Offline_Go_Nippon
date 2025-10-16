<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
           
            $table->uuid('id')->primary(); 
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            $table->string('title', 50);
            
            $table->string('prefecture', 50);
        
            $table->date('visited_at'); 
            
            $table->string('cost', 10)->default('0'); 
            
            $table->string('image', 255)->nullable(); 
            
            $table->text('content');
            
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};