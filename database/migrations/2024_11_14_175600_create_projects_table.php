<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Projects\Status as EStatus;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects.projects', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name', 100);
            $table->text('description', 255)->nullable();
            $table->string('category', 100);
            $table->integer('rating')->nullable();
            $table->integer('clicks')->nullable();
            $table->string('image', 2048)->nullable();
            $table->string('download', 2048)->nullable();
            $table->enum('status', array_column(EStatus::cases(), 'value'));
            $table->bigInteger('price');
            $table->string('currency', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects.projects');
    }
}
