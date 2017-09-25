<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MCJobs */

$this->title = 'Create Mcjobs';
$this->params['breadcrumbs'][] = ['label' => 'Mcjobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if(  !empty($model->getErrors() )  )
{
	foreach(  $model->getErrors() as $key => $value  )
	{
		echo '<h1>'.print_r($value).'</h1>'; 
	}
}
?>
<div class="mcjobs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'model' => $model,
    ]) ?>

</div>