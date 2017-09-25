<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MCJobs */
/* @var $form yii\widgets\ActiveForm */


$job_data = $model->get_job_data($model->_id);
?>

<div class="mcjobs-form">

  
	<div class="form">
	 
		<?php $form = ActiveForm::begin(); ?>
	 
			<?= $form->field($model, 'name')->textInput(['value' => $job_data['name']]) ?>
			<?= $form->field($model, 'description')->textArea(['value' => $job_data['description'], 'rows' => '16']) ?>
	 
			<div id="additional"></div>				
			
			<div class="controls">
				<?= Html::button("Add Free Text Question", ['class' => 'btn btn-primary', 'id' => 'button-add-free-text']); ?>
				<?= Html::button("Add Checkbox Question", ['class' => 'btn btn-default', 'id' => 'button-add-checkbox']); ?>
			</div>			 
			<div class="form-group">
				<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
			</div>
		
		<?php ActiveForm::end(); ?>
		
		 
	</div><!-- form -->


</div>

<?php
	$this->registerJs('
		
		var questions = '.json_encode($model->job_questions()).';
		var options = '.json_encode($model->job_question_options()).';
	
	',  \yii\web\View::POS_HEAD);
?>
<?php
use app\assets\JobUpdateAsset;
JobUpdateAsset::register($this);


 