<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 02.03.2016
 */

namespace skeeks\cms\gmap\related;

use kolyunya\yii2\widgets\MapInputWidget;
use skeeks\cms\components\Cms;
use skeeks\cms\relatedProperties\PropertyType;
use skeeks\cms\ya\map\widgets\YaMapInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * Class YaMap
 * @package skeeks\cms\ya\map\related
 */
class GMap extends PropertyType
{
    public $code = self::CODE_STRING;
    public $name = "";

    public $height = 400; //px
    public $zoom = 5;
    public $center = '50.4021702,30.3926086';

    public function init()
    {
        parent::init();

        if (!$this->name) {
            $this->name = 'Google Map (выбор одной координаты)';
        }
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
            [
                'height' => \Yii::t('cms/gmap', 'Map height'),
                'zoom'   => \Yii::t('cms/gmap', 'Map zoom'),
                'center' => \Yii::t('cms/gmap', 'Map center')
            ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
            [
                ['height', 'integer'],
                ['zoom', 'integer'],
                ['center', 'string'],
            ]);
    }

    /**
     * @return string
     */
    public function renderConfigForm(ActiveForm $activeForm)
    {
        echo $activeForm->field($this, 'height');
        echo $activeForm->field($this, 'zoom');
        echo $activeForm->field($this, 'center');
    }


    public function renderForActiveForm()
    {
        $field = parent::renderForActiveForm();
        $mapId = 'sx-map-' . $field->attribute;

        $getCenter = function ($ltlng) {
            $center = explode(',', $ltlng);
            $center = array_map('trim', $center);
            if (count($center) !== 2) {
                $center = [50.4021702, 30.3926086]; // default city
            }
            return $center;
        };

        $center = $getCenter($this->center);

        $field->widget(MapInputWidget::className(),
            [
                'key'             => \Yii::$app->googleMap->googleMapApiKey,
                'width'           => '100%',
                'height'          => $this->height . 'px',
                'mapType'         => 'roadmap',
                'zoom'            => $this->zoom,
                'animateMarker'   => true,
                'alignMapCenter'  => false,
                'enableSearchBar' => true,
            ]
        );

        $opts['mapId'] = $mapId;

        return $field;
    }

    /**
     * @return \yii\widgets\ActiveField
     */
    public function renderForActiveForm1()
    {

    }
}
