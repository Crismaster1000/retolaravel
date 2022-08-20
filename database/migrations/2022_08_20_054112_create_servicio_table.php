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

        $schema->create('servicio', function (CustomBlueprint $table) {
            $table->increments('id_servicio');
            $table->varchar('codigo_servicio', 50);
            $table->varchar('nombre_servicio', 50);
            $table->varchar('area_servicio', 50);
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
        Schema::dropIfExists('servicio');
    }
};
