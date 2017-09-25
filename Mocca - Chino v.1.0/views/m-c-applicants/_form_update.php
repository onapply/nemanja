<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MCApplicants */
/* @var $form yii\widgets\ActiveForm */
$applicant_data = $model_applicant->find()->where(['applicant_id' => $model_applicant->_id])->one();

?>

<div class="mcapplicants-form">

    <div class="form">
	 
		<?php $form = ActiveForm::begin(); ?>
	 
			<?= $form->field($model_DM, 'first_name')->textInput(['value' => $applicant_data['first_name']])?>
			<?= $form->field($model_DM, 'last_name')->textInput(['value' => $applicant_data['last_name']]) ?>
			<?= $form->field($model_DM, 'email')->textInput(['value' => $applicant_data['email']]) ?>
			<?= $form->field($model_DM, 'motivation')->textArea(['value' => $applicant_data['motivation'], 'rows' => '16']) ?>
	 			
			<div id="job_questions"></div>
				
			<div class="form-group">
				<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			</div>
		
		<?php ActiveForm::end(); ?>
		
		 
	</div><!-- form -->

</div>

<?php
	$this->registerJs('
		
		var questions = '.json_encode($model_job->job_questions()).';
		var options = '.json_encode($model_job->job_question_options()).';
		var answers = '.json_encode($model_applicant->get_answers($model_applicant->_id)).';console.log(answers);

	',  \yii\web\View::POS_HEAD);
?>
<?php
use app\assets\ApplicantUpdateAsset;
ApplicantUpdateAsset::register($this);