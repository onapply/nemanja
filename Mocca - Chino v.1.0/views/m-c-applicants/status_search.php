<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MCApplicantsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Search applicants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcapplicants-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form_search_status', [
			'model_applicant'	=> $model_applicant,
	]); ?>

    
	<div id = "applicants" class="applicants"></div>
</div>

