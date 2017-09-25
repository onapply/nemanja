<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\MCApplicants;
use app\models\MCApplicantsDM;
use app\models\MCJobs;
use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $model app\models\MCApplicants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcapplicants-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model_applicant, 'status')->dropDownList(
		ArrayHelper::map(MCApplicants::getStatuses(), 'status_id', 'text'),
		[ 'id' => 'status']
		) ?>	
    
	
	<?=Button::widget([
		'label' => 'Search',
		'options' => ['id' => 'onapply', 'class' => 'btn-lg'],
	]);?>
		
    <?php ActiveForm::end(); ?>

</div>

<?php
use app\assets\ApplicantSearchAsset;
ApplicantSearchAsset::register($this);