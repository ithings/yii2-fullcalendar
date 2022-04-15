<?php
namespace ithings\yii2fullcalendar\asset;

use yii\web\AssetBundle;
use yii\web\View;

class FullcalendarSchedulerAsset extends AssetBundle
{
    public $sourcePath = '@npm';
    public $css = [
        'fullcalendar-scheduler/main.css',
    ];
    public $js = [
        'fullcalendar-scheduler/main.js',
    ];

    public $jsOptions=[
        'position'=>View::POS_HEAD
    ];

    public $cssOptions=[
        'position'=>View::POS_HEAD
    ];

    public $depends = [
    ];

    public function init()
    {
        parent::init();

        //load locales based on Yii $app language
        $split = explode('-',\Yii::$app->language);
        if(is_array($split) && count($split)>0){
            $this->js[] = 'fullcalendar-scheduler/locales/'.$split[0].'.js';
        }
    }
}
