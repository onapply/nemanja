<?php
	//sending data to views/layouts/main.php
	$this->params['favourite_film'] = "Star Wars";
	$this->params['breadcrumbs'][] = "onapply";
	//echo "It is just an ".gettype($this->params);
	//echo '<pre>';print_r($this->params);echo '</pre>';
?>

<h2>My name is <?= $name?>.</h2>
<h2>I am <?= $age?> years old.</h2>
<h2>I live in <?= $city;?>.</h2>
echo "Hello world from 000webhost YII2 app controller :)";