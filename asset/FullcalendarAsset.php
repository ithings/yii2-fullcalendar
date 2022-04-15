<?php
namespace ithings\yii2fullcalendar\asset;

use yii\web\AssetBundle;
use yii\web\View;

class FullcalendarAsset extends AssetBundle
{
    public $sourcePath = '@npm';
    public $css = [
        'fullcalendar/main.css',
    ];
    public $js = [
        'fullcalendar/main.js',
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
            $this->js[] = 'fullcalendar/locales/'.$split[0].'.js';
        }
    }
}
