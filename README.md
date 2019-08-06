# jQuery TreeGrid Extension for Yii 2

This is the [jQuery TreeGrid](https://github.com/maxazan/jquery-treegrid) extension for Yii 2. It encapsulates TreeGrid component in terms of Yii widgets,
and thus makes using TreeGrid component in Yii applications extremely easy

由于 [leandrogehlen/yii2-treegrid](https://github.com/leandrogehlen/yii2-treegrid) 不怎么维护 所以建立该项目


[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![Latest Stable Version](https://poser.pugx.org/jianyan74/yii2-treegrid/v/stable.png)](https://packagist.org/packages/jianyan74/yii2-treegrid)
[![Total Downloads](https://poser.pugx.org/jianyan74/yii2-treegrid/downloads.png)](https://packagist.org/packages/jianyan74/yii2-treegrid)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist jianyan74/yii2-treegrid "*"
```

or add

```
"jianyan74/yii2-treegrid": "*"
```

to the require section of your `composer.json` file.

## Usage

**Model**

```php

use yii\db\ActiveRecord;

/**
 * @property string $description
 * @property integer $parent_id
 */
class Tree extends ActiveRecord 
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tree';
    }  
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string'],
            [['parent_id'], 'integer']
        ];
    }
}
```

**Controller**

```php
use yii\web\Controller;
use Yii;
use yii\data\ActiveDataProvider;

class TreeController extends Controller
{

    /**
     * Lists all Tree models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Tree::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
```

**View**

```php
use jianyan\treegrid\TreeGrid;
  
<?= TreeGrid::widget([
    'dataProvider' => $dataProvider,
    'keyColumnName' => 'id',
    'parentColumnName' => 'parent_id',
    'parentRootValue' => '0', //first parentId value
    'pluginOptions' => [
        'initialState' => 'collapsed',
    ],
    'columns' => [
        'name',
        'id',
        'parent_id',
        ['class' => 'yii\grid\ActionColumn']
    ]     
]); ?>
```

## Adding resources

When is necessary  to add other resource files, then should be used the [Dependency Injection](http://www.yiiframework.com/doc-2.0/guide-concept-di-container.html#registering-dependencies) concept.

To use the `saveState` option it's necessary to add `jquery.cookie.js`.

```php
//config/web.php
  
$config = [
  'id' => 'my-app',
  'components' => [
    ...
  ]
  ...
]

Yii::$container->set('jianyan\treegrid\TreeGridAsset',[
    'js' => [
        'js/jquery.cookie.js',
        'js/jquery.treegrid.min.js',
    ]
]);

return $config;
```



