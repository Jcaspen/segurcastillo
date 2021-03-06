<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\data\Pagination;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alta Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
    <div class="text-center">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'poliza',
            'cif',
            [
          'attribute' => 'tomador_dni',
          'value' => function ($model) {
              return Html::a(
                  Html::encode($model->tomador_dni),
                  ['clientes/view', 'id' => $model->id]
              );
          },
          'format' => 'raw',
        ],
            'prima',
            'agente',
            [
               'class' => 'yii\grid\ActionColumn',
               'header' => 'Acciones',
               'buttons' => [
                   'view' => function ($url, $model, $key) {
                       return Html::a(
                           'Imprimir',
                           ['empresas/report', 'id' => $key],
                       );
                   },
                   'update' => function ($url, $model, $key) {
                       return Html::a(
                           'Modificar',
                           ['empresas/update', 'id' => $key],
                       );
                   },
                   'delete' => function ($url, $model, $key) {
                       return Html::a(
                           'Eliminar',
                           ['empresas/delete', 'id' => $key],
                           [
                               'data-method' => 'POST',
                               'data-confirm' => '¿Seguro que desea eliminar la póliza?',
                           ]
                       );
                   },
               ],
           ],
        ],
    ]); ?>
</div>
