<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MCApplicants */

$this->title = 'Apply';
$this->params['breadcrumbs'][] = ['label' => 'Mcapplicants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcapplicants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
				'model' => $model,
				'model_job' => $model_job,
			]);  ?>

</div>
