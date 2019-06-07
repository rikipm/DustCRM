<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
        echo Menu::widget([
            'options'=>['class'=>'sidebar-menu'],
            'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
            'submenuTemplate'=>"\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
            'activateParents'=>true,
            'items' => [
                [
                    'label'=>Yii::t('app', "User"),
                    'options' => ['class' => 'header']
                ],
                Yii::$app->user->isGuest ? (
                    [
                        'label' => Yii::t('app', 'Login'),
                        'url' => Url::to(['site/login']),
                    ]
                    ) : (
                    [
                        'label' => Yii::t('app', 'Logout').' ('.Yii::$app->user->identity->username.')',
                        'url' => Url::to(['site/logout']),
                        'template' => '<a href="{url}" data-method="post">{icon}<span>{label}</span>{right-icon}{badge}</a>', //POST request
                    ]
                    )
            ],
        ]);
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
