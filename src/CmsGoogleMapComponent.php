<?php

namespace skeeks\cms\gmap;
use skeeks\cms\gmap\assets\CmsGoogleMapAsset;
use yii\helpers\ArrayHelper;

/**
 * Class CmsGoogleMapComponent
 * @package skeeks\cms\gmap
 */
class CmsGoogleMapComponent extends \skeeks\cms\base\Component
{
    /**
     * @var array
     */
    public $googleMapApiKey;

    /**
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('cms/gmap', 'Google Map'),
            'image' => [
            CmsGoogleMapAsset::class, 'icons/icons-gmap-100.png'
            ],
        ]);
    }

    /**
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['googleMapApiKey'], 'string'],
        ]);
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'googleMapApiKey' => \Yii::t('cms/gmap', 'Google Map Api Key'),
        ]);
    }

    /**
     * @param \yii\widgets\ActiveForm $form
     * @return string|void
     */
    public function renderConfigFormFields(\yii\widgets\ActiveForm $form)
    {

        $result = $form->fieldSet(\Yii::t('cms/gmap', 'Settimg'));
        $result .= $form->field($this, 'googleMapApiKey');
        $result .= $form->fieldSetEnd();
        return $result;
    }
}