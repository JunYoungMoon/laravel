<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // 여기에 업데이트할 컬럼들을 정의합니다.
            $table->decimal('tzrop_using', 32, 8)->default(0.00000000)->nullable();
            $table->decimal('tzrop_available', 32, 8)->default(0.00000000)->nullable();
            $table->string('tzrop_wallet')->nullable();
            $table->tinyInteger('tzrop_favor')->default(0)->nullable();
            $table->decimal('egx_using', 32, 8)->default(0.00000000)->nullable();
            $table->decimal('egx_available', 32, 8)->default(0.00000000)->nullable();
            $table->string('egx_wallet')->nullable();
            $table->tinyInteger('egx_favor')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 롤백할 경우 여기에 해당하는 업데이트를 롤백하는 코드를 작성합니다.
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tzrop_using');
            $table->dropColumn('tzrop_available');
            $table->dropColumn('tzrop_wallet');
            $table->dropColumn('tzrop_favor');
            $table->dropColumn('egx_using');
            $table->dropColumn('egx_available');
            $table->dropColumn('egx_wallet');
            $table->dropColumn('egx_favor');
        });
    }
};
