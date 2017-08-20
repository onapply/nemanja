<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookReview */
/* @var $form ActiveForm */
?>
<div class="book-review-_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'book_titile') ?>
        <?= $form->field($model, 'author') ?>
        <?= $form->field($model, 'amazon_url') ?>
        <?= $form->field($model, 'review')->textarea(['rows' => 6]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- book-review-_form -->
