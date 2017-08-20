<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true, 'id' => 'onapply']) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!--jQuery goes here ;)-->
<?php
	$this->registerJs(
		
		"$('#onapply').on('keydown', function() 
			{ 
				var zipId = (  $(this).val()  )? $(this).val() : 1;
				$.get('../locations/get-city-province', { zipId : zipId}, function(data){
					
					//alert(data);
					var array = $.parseJSON(data);
					//alert(array['city']);
					
					$('#customers-city').attr('value', array['city']);
					$('#customers-province').attr('value', array['province']);
				});
				
			});"
	);
?>


<?php
/*
Template 1 -> I couldnt make it work


 Html::a(	'Your Link name',
			'controller/action', 
			[
				'title' => Yii::t('yii', 'Close'),
				'onclick'=>"$('#close').dialog('open');//for jui dialog in my page
				$.ajax(
				{
					type     : 'POST',
					cache    : false,
					url  	 : 'controller/action',
					success  : function(response) 
					{
						$('#close').html(response);
					}
				});
				return false;",
            ]
		);

Template 2

$script = <<< JS
	$('#el').on('click', function(e) {
		$.ajax({
		   url: '/path/to/action',
		   data: {id: 14, 'other': '<other>'},
		   success: function(data) {
			   // process data
		   }
		});
	});
JS;
$this->registerJs($script, $position); 
// where $position can be View::POS_READY (the default), 
// or View::POS_HEAD, View::POS_BEGIN, View::POS_END
i.e.
$script = <<< JS
	$('#onapply').on('click', function(e) {
		
		var zipId = (  $(this).val()  )? $(this).val() : 1;
		$.ajax({
		   url: '../locations/get-city-province',
		   data: {zipId: zipId},
		   success: function(data) {
			   //alert(data);
				var array = $.parseJSON(data);
				//alert(array['city']);
				
				$('#customers-city').attr('value', array['city']);
				$('#customers-province').attr('value', array['province']);
		   }
		});
	});
JS;
$this->registerJs($script, View::POS_READY);
*/


?>