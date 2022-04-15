<?php
namespace ithings\yii2fullcalendar;

use ithings\yii2fullcalendar\asset\FullcalendarAsset;
use ithings\yii2fullcalendar\asset\FullcalendarSchedulerAsset;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class FullCalendar extends Widget
{
    /**
     * @var int the html id of the calendar
     */
    public $id = "fullcalendar";

    /**
     * @var bool use the scheduler plugins
     */
    public $scheduler = false;

    /**
     * @var string the locale used
     */
    public $locale = 'it';

    /**
     * @var array html options
     */
    public $options;

    /**
     * @var array the fullCalendar options
     */
    public $clientOptions;

    public function run()
    {
        parent::run();

        $this->options['id'] = $this->id;

        echo Html::beginTag('div', $this->options) . "\n";
        echo Html::endTag('div')."\n";
        $this->registerPlugin();

        $view = $this->getView();
        $this->clientOptions['locale'] = $this->locale;
        $jsOptions = Json::encode($this->clientOptions);
        $js = <<<JS

            const calendarEl = document.getElementById('$this->id');
    
            const calendar = new FullCalendar.Calendar(calendarEl, $jsOptions);
    
            calendar.render();
JS;
        $view->registerJs(new JsExpression($js),$view::POS_END);
    }

    protected function registerPlugin(){
        $view = $this->getView();
        if($this->scheduler){
            FullcalendarSchedulerAsset::register($view);
        }else{
            FullcalendarAsset::register($view);
        }
    }
}