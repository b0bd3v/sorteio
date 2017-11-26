<?php

/**
 * This is the model class for table "apostas".
 *
 * The followings are the available columns in table 'apostas':
 * @property integer $id
 * @property integer $sorteio
 * @property integer $apostador
 * @property integer $numero_apostado
 */
class Aposta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'apostas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('sorteio, apostador', 'numerical', 'integerOnly'=>true),
			array('numero_apostado', 'safe'),
			array('apostador', 'maximoApostas'),
			array('apostador', 'apostaUnica'),
			array('id, sorteio, apostador, numero_apostado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * Verificar se o apostador nao atingiu o limite de apostas
	 */
	public function maximoApostas($atributo, $parametro)
	{

		$usuario = Usuario::model()->findByPk($this->getAttribute('apostador'));
		
		
		if($usuario->idade <= 18){
			$totalPermitido = 6;
		}elseif ($usuario->idade <= 30) {
			$totalPermitido = 8;
		}elseif ($usuario->idade <= 50) {
			$totalPermitido = 10;
		}elseif ($usuario->idade <= 70) {
			$totalPermitido = 11;
		}elseif ($usuario->idade > 70) {
			$totalPermitido = 12;
		}

		$totalNumerosApostados = explode(',', $this->getAttribute('numero_apostado'));

		if(count($totalNumerosApostados) < 1){
			$this->addError($atributo, 'Você deve escolher um número!');	
			return;
		}
		
		if(count($totalNumerosApostados) < $totalPermitido){
			$this->addError($atributo, 'Você deve escolher <strong>' . $totalPermitido . '</strong> números!');	
			return;
		}

		if(count($totalNumerosApostados) > $totalPermitido){
			$this->addError($atributo, 'Você ultrapassou o limite de números(' . $totalPermitido . ') para sua aposta! ');
		}
	}

	/**
	 * Verificar se o apostador já apostou no mesmo sorteio
	 */
	public function apostaUnica($atributo, $parametro)
	{
		if(Aposta::model()->exists("apostador = " . $this->getAttribute('apostador') . " AND sorteio = " . $this->getAttribute('sorteio'))){
			$this->addError($atributo, 'Você já apostou nesse sorteio! Aguarde o próximo.');
		}

	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'apostador'=>array(self::BELONGS_TO, 'Usuario', 'id'),
			'sorteio'=>array(self::BELONGS_TO, 'Sorteio', 'id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sorteio' => 'Sorteio',
			'apostador' => 'Apostador',
			'numero_apostado' => 'Numero Apostado',
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
		$criteria->compare('sorteio',$this->sorteio);
		$criteria->compare('apostador',$this->apostador);
		$criteria->compare('numero_apostado',$this->numero_apostado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aposta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
