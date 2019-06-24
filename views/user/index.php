<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create user'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'id',
                'contentOptions'=>['style'=>'width: 60px;'], // <-- right here
            ],
            'username',
            [
                'attribute' => 'status',
                'headerOptions' => ['style' => 'width: 70px;'],
                'value' => function($model)
                {
                    return ''; //Hide value
                },
                'contentOptions' => function($model)
                {
                    return $model->status ? ['class' => 'glyphicon glyphicon-ok text-success'] : ['class' => 'glyphicon glyphicon-remove text-danger'];
                }
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'headerOptions'=>['style'=>'width: 70px;'],

            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
