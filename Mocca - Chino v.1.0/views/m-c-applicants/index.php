<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MCApplicantsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Applicants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcapplicants-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<?= Html::a('Search applicants by status', ['status-search'], ['class' => 'btn btn-success']) ?>

    <p>
		<?php if( $model->_job_id != 0 )
		{
		?>		
			<?= Html::a('Apply', ['create?id='.$model->_job_id.''], ['class' => 'btn btn-success']) ?>
		<?php
		}
		?>
    </p>
    
	<div id = "applicants" class="applicants">
		<?php
			foreach($model->_applicants as $key => $value)
			{
				echo '<a href="../m-c-applicants/view?id='.$value['applicant_id'].'">';
				echo '	<div class="applicant_div">';
				echo 		$value['first_name'].' '.$value['last_name'].'<br/>';
				echo '	</div>';
				echo '</a>';
			}
		?>
		
	</div>
</div>
<?php
use app\assets\ApplicantCreateAsset;
ApplicantCreateAsset::register($this);
?>
