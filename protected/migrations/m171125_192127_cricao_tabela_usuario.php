<?php

class m171125_192127_cricao_tabela_usuario extends CDbMigration
{
	public function up()
	{
		$this->createTable('usuarios', array(
            'id' => 'pk',
            'nome' => 'string NOT NULL',
            'login' => 'string NOT NULL',
            'senha' => 'string NOT NULL',
            'idade' => 'idade'
        ));
		
		// Exemplo até 18
		$this->insert('usuarios',array('nome'=>'Cleiton', 'login' => 'cleiton', 'senha' => 'cleiton', 'idade' => 17));
		
		// Exemplo 18 e 30
		$this->insert('usuarios',array('nome'=>'Carlos', 'login' => 'carlos', 'senha' => 'carlos', 'idade' => 23));
		
		// Exemplo 30 e 50
		$this->insert('usuarios',array('nome'=>'Roberto Martins', 'login' => 'roberto', 'senha' => 'roberto', 'idade' => 32));
		
		// Exemplo 50 e 70
		$this->insert('usuarios',array('nome'=>'Ronaldo', 'login' => 'ronaldo', 'senha' => 'ronaldo', 'idade' => 56));
		
		// Exemplo acima 70
		$this->insert('usuarios',array('nome'=>'Reginaldo', 'login' => 'reginaldo', 'senha' => 'reginaldo', 'idade' => 81));
	}

	public function down()
	{
		$this->dropTable('usuarios');
	}

}