<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vygr_permission_role', function (Blueprint $table) {
            $table->bigInteger('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')->on('vygr_permissions')->onDelete('cascade');
            $table->bigInteger('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('vygr_roles')->onDelete('cascade');
            $table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vygr_permission_role');
    }
}
