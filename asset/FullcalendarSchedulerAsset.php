<?php
namespace ithings\yii2fullcalendar\asset;

use yii\web\AssetBundle;
use yii\web\View;

class FullcalendarSchedulerAsset extends AssetBundle
{
    public $sourcePath = '@npm';

    public $js = [
        'fullcalendar-scheduler/main.js',
        'fullcalendar--bootstrap5/index.global.js',
    ];

    public $jsOptions=[
        'position'=>View::POS_HEAD
    ];

    public $depends = [
    ];


}
