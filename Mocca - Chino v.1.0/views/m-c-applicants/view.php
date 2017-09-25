<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MCApplicants */

$this->title = 'Applicant';
$this->params['breadcrumbs'][] = ['label' => 'Mcapplicants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="mcapplicants-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model_applicant->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['neca', 'id' => $model_applicant->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>
	
	<br/>
	
	<div class='question_text field-dynamicmodel-name required'>
		First name:
		<div class='question_answer' id='mcapplicantsdm-che'>
			<?=$model_applicant->_first_name?>
		</div>
	</div>
	
	<br/> 
	
	<div class='question_text field-dynamicmodel-name required'>
		Last name:
		<div class='question_answer' id='mcapplicantsdm-che'>
			<?=$model_applicant->_last_name?>
		</div>
	</div>
	
	<br/>
	
	<div class='question_text field-dynamicmodel-name required'>
		Email:
		<div class='question_answer' id='mcapplicantsdm-che'>
			<?=$model_applicant->_email?>
		</div>
	</div>
	
	<br/>
	
	<div class='question_text field-dynamicmodel-name required'>
		Motivation:
		<div class='question_answer' id='mcapplicantsdm-che'>
			<?=$model_applicant->_motivation?>
		</div>
	</div>
	
	<br/>

</div>
<div id = "q_and_a"></div>
<h1><?= Html::encode("Change status") ?></h1>

<?= $this->render('_form_change_status', [
		'model_applicant'	=> $model_applicant,
		'model_job' 		=> $model_job,
		'model_DM' 			=> $model_DM,
]); ?>

<?php
	$this->registerJs('
		
		var questions = '.json_encode($model_job->job_questions()).';
		var options = '.json_encode($model_job->job_question_options()).';
		var answers = '.json_encode($model_applicant->get_answers($model_applicant->_id)).';
	
	',  \yii\web\View::POS_HEAD);
?>
<?php
use app\assets\ApplicantViewAsset;
ApplicantViewAsset::register($this);