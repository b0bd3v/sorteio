<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bem vindo ao sistema <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php if (Yii::app()->user->isGuest): ?>
	<p>Faça login para liberar as apostas. 
	<?php echo CHtml::link("Clique aqui", CHtml::normalizeUrl(array("site/login"))) ?></p>
<?php else: ?>

	<?php 
		$ultimoSorteio = Sorteio::model()->findAll(array('order' => 'id DESC','limit' => 1));
		$ultimoSorteio = $ultimoSorteio[0];

		if(
			count(
				$ultimoSorteioConcluido = Sorteio::model()->findAllByAttributes(
					array( 'finalizado' => 1 ), 
					array('order' => 'id DESC','limit' => 1)
				)
			) > 0
		){
			$ultimoSorteioConcluido = $ultimoSorteioConcluido[0];	
		}
	 ?>
	Estamos no sorteio <strong>#<?php echo $ultimoSorteio->id; ?></strong>. <?php echo CHtml::link("Apostar", CHtml::normalizeUrl(array("apostar/index"))) ?> 
	<?php if(is_object($ultimoSorteioConcluido)):?>
		<?php 
			if($ultimoSorteioConcluido->vencedor == 0){
				$nomeVencedor = 'Não há vencedor';	
			}else{
				$nomeVencedor = Usuario::model()->findByPk($ultimoSorteioConcluido->vencedor)->nome; 
			}
			?>
		<br><br>
		Último sorteio finalizado <strong>#<?php echo $ultimoSorteioConcluido->id; ?></strong>. <br>
		O números sorteados foram <strong><?php echo $ultimoSorteioConcluido->numeros; ?></strong> e <strong><?php echo ($ultimoSorteioConcluido->vencedor == 0)? 'não há vencedor' : 'o vencedor foi ' . $nomeVencedor; ?></strong>.
	<?php endif; ?>	
<?php endif; ?>
