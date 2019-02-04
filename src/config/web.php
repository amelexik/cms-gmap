<?php
return [
    'components' => [
        'googleMap' => [
            'class' => 'skeeks\cms\gmap\CmsGoogleMapComponent',
        ],
        'i18n'      => [
            'translations' => [
                'cms/gmap' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/gmap/messages',
                ]
            ]
        ],
        'cms'       =>
            [
                'relatedHandlers' => [
                    'skeeks\cms\gmap\related\GMap' =>
                        [
                            'class' => 'skeeks\cms\gmap\related\GMap'
                        ]
                ],
            ],

    ],
    'modules'    =>
        [
            'googleMap' => [
                'class' => 'skeeks\cms\gmap\CmsGoogleMapModule',

            ]
        ]
];