<?php
/* @var $this ApostarController */

$this->breadcrumbs=array(
	'Apostar',
);
?>
<h1>Sua aposta foi processada com sucesso.</h1>

<p>
	<?php if($this->sorteioFinalizado): ?>
		O sorteio acabou ser realizado. Vá para a home page para verificar se você foi o ganhador.
	<?php else: ?>
		Aguarde o sorteio e confira na sua home page se você foi o ganhador. 	
	<?php endif; ?>
</p>
