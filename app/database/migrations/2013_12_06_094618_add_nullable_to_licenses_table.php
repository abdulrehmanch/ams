<?php

use Illuminate\Database\Migrations\Migration;

class AddNullableToLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = DB::getTablePrefix();
        DB::statement('ALTER TABLE ' . $prefix . 'licenses MODIFY order_number varchar(50) null');
        DB::statement('ALTER TABLE ' . $prefix . 'licenses MODIFY notes varchar(255) null');
        DB::statement('ALTER TABLE ' . $prefix . 'licenses MODIFY license_name varchar(100) null');
        DB::statement('ALTER TABLE ' . $prefix . 'licenses MODIFY license_email varchar(120) null');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
