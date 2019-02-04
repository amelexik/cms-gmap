<?php

namespace skeeks\cms\gmap;
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
    public function renderConfigForm(\yii\widgets\ActiveForm $form)
    {

        echo $form->fieldSet(\Yii::t('cms/gmap', 'Settimg'));
        echo $form->field($this, 'googleMapApiKey');
        echo $form->fieldSetEnd();
    }
}