<?php

use Domain\User\Models\User;
use Domain\Project\Models\Project;
use Domain\Task\States\Open;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default(Open::CODE);
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('estimate_time')->nullable();
            $table->dateTime('due_at')->nullable();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Project::class);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
