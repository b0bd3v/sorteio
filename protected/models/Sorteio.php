<?php

/**
 * This is the model class for table "sorteios".
 *
 * The followings are the available columns in table 'sorteios':
 * @property integer $id
 * @property integer $finalizado
 * @property integer $vencedor
 * @property string $numeros
 */
class Sorteio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sorteios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

		return array(
			array('finalizado, vencedor', 'numerical', 'integerOnly'=>true),
			array('numeros', 'safe'),
			array('id, finalizado, vencedor, numeros', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'vencedor'=>array(self::BELONGS_TO, 'Usuario', 'id')
		);
	}

	public function realizarSorteio()
	{
		$numeros = range(0, 19);
		shuffle($numeros);
		$numeros = array_slice($numeros, 0, 6);
		$apostas = Aposta::model()->findAllByAttributes(array(
				'sorteio' => $this->getAttribute('id')
			));
		
		foreach ($apostas as $key => $value) {
			$numerosAposta = explode(',', $value->numero_apostado);
			$numerosAposta = $numeros;
			if(array_intersect($numeros, $numerosAposta)){
				$possiveisApostasVencedoras[] = $value; 
			}
		}
		
		if(isset($possiveisApostasVencedoras) && is_array($possiveisApostasVencedoras)){
			$apostaVencedora = $possiveisApostasVencedoras[0];	
		}
		

		if(isset($apostaVencedora)){
			$this->setAttribute('vencedor', $apostaVencedora->apostador);
		}else{
			$this->setAttribute('vencedor', 0);
		}

		$this->setAttribute('finalizado', 1);
		$this->setAttribute('numeros', implode(',', $numeros));

		$this->save();
		
		// Abrindo o novo sorteio
		$novoSorteio = new Sorteio;
		$novoSorteio->insert();

	}

	public function getQuantidadeApostas()
	{
		return Aposta::model()->countByAttributes(array('sorteio' => $this->getAttribute('id')));
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'finalizado' => 'Finalizado',
			'vencedor' => 'Vencedor',
			'numeros' => 'Números',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('finalizado',$this->finalizado);
		$criteria->compare('vencedor',$this->vencedor);
		$criteria->compare('numeros',$this->numeros,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sorteio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
