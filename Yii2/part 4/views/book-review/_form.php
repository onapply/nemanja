<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookReviews */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
	<div class="col-md-12">
		<div class="book-reviews-form">

			<?php $form = ActiveForm::begin([
				'enableAjaxValidation' => true,
				'validationUrl' => 'neca'
			]); ?>

			<?= $form->field($model, 'book_titile')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'amazon_url')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'review')->textarea([
															'rows' 	=> 6, 
															'style'	=>'background:black;color:white;',
															//'class'	=> 'onapply',
															//'id' 	=> 'onapply'
														]) ?>

			<div class="form-group">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>

		</div>
	</div>
</div>