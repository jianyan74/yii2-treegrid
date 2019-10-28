<?php

namespace jianyan\treegrid;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the [jQuery TreeGrid plugin library](https://github.com/maxazan/jquery-treegrid)
 */
class TreeGridAsset extends AssetBundle
{
    public $js = [
        'js/jquery.treegrid.min.js',
    ];

    public $css = [
        'css/jquery.treegrid.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/resources';
        parent::init();
    }
}