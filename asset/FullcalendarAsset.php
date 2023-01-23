<?php
namespace ithings\yii2fullcalendar\asset;

use yii\web\AssetBundle;
use yii\web\View;

class FullcalendarAsset extends AssetBundle
{
    public $sourcePath = '@npm';

    public $js = [
        'fullcalendar/index.global.js',
        'fullcalendar--bootstrap5/index.global.js',
    ];

    public $jsOptions=[
        'position'=>View::POS_HEAD
    ];

    public $cssOptions=[
        'position'=>View::POS_HEAD
    ];

    public $depends = [
    ];
}
