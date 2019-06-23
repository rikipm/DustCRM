<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

/* @var $content string*/
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo $this->title?></h1>
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>