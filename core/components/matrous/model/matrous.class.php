<?php

require_once "php-obscene-censor-rus/src/ObsceneCensorRus.php";

class Matrous
{
    /** @var modX $modx */
    public $modx;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/matrous/';
        $assetsUrl = MODX_ASSETS_URL . 'components/matrous/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('matrous', $this->config['modelPath']);
        $this->modx->lexicon->load('matrous:default');
    }

    public function checkText($text){
        if($text){
            Wkhooy\ObsceneCensorRus::filterText($text);
            return $text ;
        }
    }

}