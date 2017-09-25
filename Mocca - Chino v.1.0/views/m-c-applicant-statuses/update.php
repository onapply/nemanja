<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MCApplicantStatuses */

$this->title = 'Update Mcapplicant Statuses: ' . $model->status_id;
$this->params['breadcrumbs'][] = ['label' => 'Mcapplicant Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->status_id, 'url' => ['view', 'id' => $model->status_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcapplicant-statuses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
