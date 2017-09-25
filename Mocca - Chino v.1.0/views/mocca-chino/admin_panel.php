<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MCApplicantsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin panel';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcapplicants-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<?= Html::a('Jobs', ['m-c-jobs/index'], ['class' => 'btn btn-primary'])?>
	<?= Html::a('Add a job posting', ['m-c-jobs/create'], ['class' => 'btn btn-success']);?>
	<?= Html::a('All applicants', ['m-c-applicants/index'], ['class' => 'btn btn-primary'])?>
	<?= Html::a('Search applicants by status', ['m-c-applicants/status-search'], ['class' => 'btn btn-success']) ?>

    </p>
    
</div>