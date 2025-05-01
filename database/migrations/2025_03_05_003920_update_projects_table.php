<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up()
    {
        // Add a new ENUM value 'animation'
        DB::statement("ALTER TABLE projects MODIFY COLUMN project_type ENUM('cgi', 'motion_graphic', 'video_production') AFTER video_link");
    }

    public function down()
    {
        // Rollback to previous ENUM values
        DB::statement("ALTER TABLE projects MODIFY COLUMN project_type ENUM('cgi', 'motion_graphic') AFTER video_link");
    }
};
