<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MCJobsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mocca Chino Job Listings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcjobs-index">

    <h1>
		<?= Html::encode($this->title) ?>		
        <?php
		if(!Yii::$app->user->getIsGuest())
		{
			echo Html::a('Add a job listing', ['create'], ['class' => 'btn btn-success']);
		}
		echo '<br/>';
		echo Html::a('View all applicants', ['m-c-applicants/index'], ['class' => 'btn btn-default']);
		?>		
	</h1>
	<?php
		foreach($allJobs as $job)
		{
			echo '<div class = "job_posting_div">';
			echo '<a href="../m-c-jobs/view?id='.$job['job_id'].'"><div class = "job_title">'.$job['name'].'</a></div>';
			echo '<div class = "job_description">'.substr ( $job['description'], 0, 100).'...</div>';
			
			echo Html::a('Apply', ['m-c-applicants/create?id='.$job['job_id'].''], ['class' => 'btn btn-success']).' '; 
			echo Html::a('View', ['view?id='.$job['job_id'].''], ['class' => 'btn btn-primary']).' '; 
			echo Html::a('Applicants', ['m-c-applicants/index?id='.$job['job_id'].''], ['class' => 'btn btn-primary']).' '; 
			if(!Yii::$app->user->getIsGuest())
			{		
				echo Html::a('Update', ['update?id='.$job['job_id'].''], ['class' => 'btn btn-default']).' '; 
				echo Html::a('Delete', ['delete-job?id='.$job['job_id'].''], ['class' => 'btn btn-danger']).' '; 
			}	
			echo '</div>'; 
		}	
	?>		
	
	
</div>

<?php
use app\assets\MoccaChinoAsset;
MoccaChinoAsset::register($this);
?>