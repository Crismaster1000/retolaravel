<?php

use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Schemas\Blueprints\CustomBlueprint;
use App\Schemas\Grammars\CustomGrammar;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->setSchemaGrammar(new CustomGrammar());

        $schema = DB::connection()->getSchemaBuilder();

        $schema->blueprintResolver(function($table, $callback) {
            return new CustomBlueprint($table, $callback);
        });

        $schema->create('proveedor', function (CustomBlueprint $table) {
            $table->increments('id_proveedor');
            $table->varchar('nombre_empresa', 50);
            $table->varchar('representante', 50);
            $table->varchar('telefono', 50);
            $table->varchar('correo', 50);
            $table->varchar('tipo_servicio', 50);
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
        Schema::dropIfExists('proveedor');
    }
};
