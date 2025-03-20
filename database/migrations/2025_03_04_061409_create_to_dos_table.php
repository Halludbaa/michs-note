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
        Schema::create("todo_list", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("title", 100);
            $table->string("description", 10_000)->nullable();
            $table->foreignUuid("user_id")->constrained("users", "id")->cascadeOnDelete();
            $table->timestamps();
        });

        // Schema::create('groups', function (Blueprint $table) {
        //     $table->uuid("id")->primary();
        //     $table->string("name", 100);
        //     $table->foreignUuid("user_id")->constrained("users", "id")->cascadeOnDelete();
        //     $table->timestamps();
        // });

        Schema::create('to_dos', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("task", 255)->nullable();
            $table->string("description", 10_000)->nullable();
            $table->enum("status", ["pending", "completed"])->default("pending");
            $table->foreignUuid("todo_list_id")->constrained("todo_list", "id")->cascadeOnDelete();
            // $table->foreignUuid("group_id")->nullable()->constrained("groups", "id")->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_dos');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('todo_list');
    }
};
