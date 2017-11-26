<?php
/* @var $this ApostaController */
/* @var $model Aposta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aposta-apostar-form'	
)); ?>
	
	<p class="note">Escolha um número para sua aposta.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo CHtml::hiddenField('Aposta[sorteio]', $this->ultimoSorteio->id); ?>
		
	<div class="row">
		<?php echo CHtml::tag('strong', array(), 'Sorteio #' . $this->ultimoSorteio->id); ?>
	</div>
	<div class="row buttons">
	<?php 
		if(isset($_POST['Aposta']['numero_apostado'])){
			$numerosPostados = $_POST['Aposta']['numero_apostado'];
		}
	 ?>
	<?php for($cont = 0; $cont < 20; $cont++):?>
		<div style="text-align:center; margin-right:3px; margin-bottom:0px; background-color: gray; height: 43px; width: 43px; float: left;">
			<span style="color:white; font-size: 20px;">
				<?php echo CHtml::label($cont, "ckb" . $cont); ?>
			</span>
			<?php echo CHtml::checkBox('Aposta[numero_apostado][' . $cont . ']', (isset($numerosPostados[$cont])), array('id' => "ckb" . $cont)); ?>
		</div>
		<?php if($cont == 9): ?> 
		
		<br>
		<br>
		<br>

		<?php endif;?>
	<?php endfor;?>
	</div>
	<div class="row buttons">
		<br><br><br>
		<?php echo CHtml::submitButton('Apostar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->