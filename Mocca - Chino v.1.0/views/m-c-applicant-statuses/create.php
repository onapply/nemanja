<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MCApplicantStatuses */

$this->title = 'Create Mcapplicant Statuses';
$this->params['breadcrumbs'][] = ['label' => 'Mcapplicant Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcapplicant-statuses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
