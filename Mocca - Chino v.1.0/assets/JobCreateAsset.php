<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
 
namespace app\assets;
  
use yii\web\AssetBundle;
 
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class JobCreateAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/mocca_chino.css',
        'css/site.css',
	];
    public $js = [
		'js/job_create.js',
    ];
    public $depends = [
            'yii\web\YiiAsset',
            'yii\bootstrap\BootstrapAsset',
        ];
}