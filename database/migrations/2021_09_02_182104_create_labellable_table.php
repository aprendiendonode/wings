<?php

use Domain\Label\Models\Label;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabellableTable extends Migration
{
    public function up()
    {
        Schema::create('labellable', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Label::class);
            $table->morphs('labellable');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('labellable');
    }
}
