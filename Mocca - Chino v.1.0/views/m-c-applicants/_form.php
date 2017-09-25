<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MCApplicants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcapplicants-form">

    <div class="form">
	 
		<?php $form = ActiveForm::begin(); ?>
	 
			<?= $form->field($model, 'first_name') ?>
			<?= $form->field($model, 'last_name') ?>
			<?= $form->field($model, 'email') ?>
			<?= $form->field($model, 'motivation')->textArea(['rows' => '16']) ?>
	 
			
			<div id="job_questions"></div>
				
			<div class="form-group">
				<?= Html::submitButton('Apply', ['class' => 'btn btn-primary']) ?>
			</div>
		
		<?php ActiveForm::end(); ?>
		
		 
	</div><!-- form -->

</div>

<?php
	$this->registerJs('
		
		var questions = '.json_encode($model_job->job_questions()).';
		var options = '.json_encode($model_job->job_question_options()).';
	
	',  \yii\web\View::POS_HEAD);
?>
<?php
use app\assets\ApplicantCreateAsset;
ApplicantCreateAsset::register($this);