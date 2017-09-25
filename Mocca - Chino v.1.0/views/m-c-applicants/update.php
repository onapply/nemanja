<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MCApplicants */

$this->title = 'Apply';
$this->params['breadcrumbs'][] = ['label' => 'Mcapplicants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

// $data['model'] = $model;
 // echo '<pre>';print_r($questions);echo '</pre>';
 // echo '<pre>';print_r($options);echo '</pre>';
?>
<div class="mcapplicants-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form_update', [
				'model_applicant'	=> $model_applicant,
				'model_job' 		=> $model_job,
				'model_DM' 			=> $model_DM,
				'model_answers'		=> $model_answers,
			]); ?>

</div>
