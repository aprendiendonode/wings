<?php

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default(Task::STATUS_OPEN);
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
