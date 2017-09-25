<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MCApplicantStatusesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mcapplicant Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcapplicant-statuses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mcapplicant Statuses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'status_id',
            'job_id',
            'text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
