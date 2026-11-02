
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('studentid')
                ->nullable()
                ->unique()
                ->after('id');

            $table->string('role')->default('student')->after('password');

            $table->foreign('studentid')
                ->references('studentid')
                ->on('students')
                ->nullOnDelete();
        });

        // Keep existing accounts as Admin
        DB::table('users')->update(['role' => 'admin']);
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['studentid']);
            $table->dropUnique(['studentid']);
            $table->dropColumn(['studentid', 'role']);
        });
    }
};
