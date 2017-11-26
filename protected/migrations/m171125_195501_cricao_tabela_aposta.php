<?php

class m171125_195501_cricao_tabela_aposta extends CDbMigration
{
	public function up()
	{
		$this->createTable('apostas', array(
            'id' => 'pk',
            'sorteio' => 'integer',
            'apostador' => 'integer',
            'numero_apostado' => 'string'
        ));
	}

	public function down()
	{
		$this->dropTable('apostas');
	}

}