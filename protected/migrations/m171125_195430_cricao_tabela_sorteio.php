<?php

class m171125_195430_cricao_tabela_sorteio extends CDbMigration
{
	public function up()
	{
		$this->createTable('sorteios', array(
            'id' => 'pk',
            'finalizado' => 'boolean',
            'vencedor' => 'integer',
            'numeros' => 'string'            
        ));

		// Adiciona um sorteio finalizado
		$this->insert('sorteios', array(
			'finalizado' => 1,
			'numeros' => '3,5,0,1,7,9'		
			));

		// Adiciona o primeiro sorteio
		$this->insert('sorteios', array(
			'finalizado' => 0,
			
			));
	}

	public function down()
	{
		$this->dropTable('sorteios');
	}
}