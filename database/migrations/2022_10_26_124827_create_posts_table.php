<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->text('descripcion')->nullable();
            $table->longText('cuerpo')->nullable();
            $table->enum('estado', [1,2])->default(1);
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('categoria_id');

            //Acá lo ideal es setear el onDelete('set null') para que en la otra tabla setee null
            //Con cascade borra la relación
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

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
        //Si queremos hacer rollback de esta tabla va a tirar error de integridad por la clave foránea 
        //Para solucionar eso hay que eliminar la clave foránea antes de eliminar la tabla
        Schema::table('posts' , function(Blueprint $table) {
            $table->dropForeign('post_categoria_id_foreign');
            $table->dropColumn('categoria_id');
        });
        Schema::dropIfExists('posts');
    }
}
