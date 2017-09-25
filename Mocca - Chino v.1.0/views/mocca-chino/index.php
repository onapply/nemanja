<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MCJobs */

?>

<div class="row">
	<div class="admin_line">
		<?php
			if(!Yii::$app->user->getIsGuest())
			{		
				//echo Html::a('Create Job - Posting', ['m-c-jobs/create'], ['class' => 'btn btn-danger']).' ';
			}
		?>	
	</div>
	<div class="aaa">
		<div class="text col-lg-6 col-md-6 col-sm-6 col-xs-8">
			<h1 class="welcome">Welcome to MoccaChino</h1>	
			<h2 class="mantra">A company that brews the best Mocca café in the world</h2>
			
			<h3 class="miracle">Miracles do happen - we have open positions<br/> Click here to find more</h3>
			<a href="../m-c-jobs/index"><div class="open-position">Open Positions</div></a>
		</div>
	</div>
	
	<div class="cool_cont">
		<div class="cool col-lg-3 col-md-3 col-sm-3 col-xs-12"> 
			<h4><img src="../img/coffee.jpg"></h4>
			The best quality Mocca Chino in the world
		</div>
		
		
		<div class="cool col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h4><img src="../img/frankfurt.gif"></h4>
			The hottest location in the best Europe city
		</div>
		
		<div class="cool col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<h4><img src="../img/money.png"></h4> 
			Super affordable
		</div>
	</div>
</div>    


<?php
use app\assets\MoccaChinoAsset;
MoccaChinoAsset::register($this);
?>