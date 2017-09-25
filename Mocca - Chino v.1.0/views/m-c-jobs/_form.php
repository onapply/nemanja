<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\assets\JobCreateAsset;
JobCreateAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\MCJobs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcjobs-form">

  
	<div class="form">
	 
		<?php $form = ActiveForm::begin(); ?>
	 
			<?= $form->field($model, 'name') ?>
			<?= $form->field($model, 'description')->textArea(['rows' => '16']) ?>
	 
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
		
		var model = '.json_encode($model).';
	
	',  \yii\web\View::POS_HEAD);
?>


 