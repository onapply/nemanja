<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MCJobs */

$job_data = $model->get_job_data($model->_id);

$this->title = 'Update Mcjobs: ' . $job_data['name'];
$this->params['breadcrumbs'][] = ['label' => 'Mcjobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $job_data['name'], 'url' => ['view', 'id' => $job_data['job_id']]];
$this->params['breadcrumbs'][] = 'Update';

if(  !empty($model->getErrors() )  )
{
	foreach(  $model->getErrors() as $key => $value  )
	{
		echo '<h1>'.$value.'</h1>';
	}
}

?>
<div class="mcjobs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    
	<?= $this->render('_form_update', [
		'model' => $model,
	]) ?>

</div>
