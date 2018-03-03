    <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

class CreateFilesProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('file_name', 50);
            $table->integer('project_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('files_projects', function (Blueprint $table) {
            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_projects');
    }
}
