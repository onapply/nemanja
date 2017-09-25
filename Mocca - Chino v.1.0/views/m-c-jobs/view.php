<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MCJobs */

$job_data = $model->get_job_data($model->_id);

$this->title = $job_data['name'];
$this->params['breadcrumbs'][] = ['label' => 'Mcjobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcjobs-view">

    <p>
		<?php 
		if(!Yii::$app->user->getIsGuest())
		{
		?>
			<?= Html::a('Update', ['update', 'id' => $job_data['job_id']], ['class' => 'btn btn-primary']) ?>
			<?= Html::a('Delete', ['delete', 'id' => $job_data['job_id']], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => 'Are you sure you want to delete this item?',
					'method' => 'post',
				],
			]) ?>
		<?php
		}
		?> 
    </p>
	
    <h1><?= Html::encode($this->title) ?></h1>

    <h2><?= Html::encode($job_data['description']) ?></h2>
	
	<div id = "additional"></div>
	
	<?=Html::a('Apply', ['m-c-applicants/create?id='.$job_data['job_id'].''], ['class' => 'btn btn-success']).' '?>
</div>



<?php
	$this->registerJs('
		
		var questions = '.json_encode($model->job_questions()).';
		var options = '.json_encode($model->job_question_options()).';
	
	',  \yii\web\View::POS_HEAD);
?>
<?php
use app\assets\JobViewAsset;
JobViewAsset::register($this);
