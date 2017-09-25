<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\MCApplicants;
use app\models\MCApplicantsDM;
use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $model app\models\MCApplicants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcapplicants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model_applicant, 'status')->dropDownList(
		ArrayHelper::map(MCApplicants::getStatuses(), 'status_id', 'text'),
		['options' => [$model_applicant->_status => ['Selected'=>'selected']], 'id' => 'status']
	) ?>	
    
	<?=Button::widget([
		'label' => 'Update Status',
		'options' => ['id' => 'onapply', 'class' => 'btn-lg'],
	]);
	
	// <?= Html::button("Add Another", ['class' => 'btn btn-primary'], 'id' => 'button-add-another'); ?>
	
    <?php ActiveForm::end(); ?>

</div>
<!--jQuery goes here ;)-->
<?php
	$this->registerJs(
		
		"$('#onapply').on('click', function(e) 
			{ 
				e.preventDefault();
				var status =   $('#status').val();
				var applicant_id = ".$model_applicant->_id.";
				$.get('../m-c-applicants/change-status', { status : status, applicant_id : applicant_id}, function(data){					
					alert('Applicant status changed!');
				});
			});"
	);
?>