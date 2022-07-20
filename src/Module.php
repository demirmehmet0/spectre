<?php

namespace diginova\spectre;

class Module extends \portalium\base\Module
{
    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'spectre/default',
            ]
        ],
    ];
    
    public static function moduleInit()
    {
        self::registerTranslation('spectre','@diginova/spectre/messages',[
            'spectre' => 'spectre.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('spectre', $message, $params);
    }
}