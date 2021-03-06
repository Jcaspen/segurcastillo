<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alta Autos', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Alta Bicicletas', ['createbc'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Alta Embarcaciones', ['createem'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
    <div class="text-center">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'poliza',
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
            'matricula',
            'tipo_auto',
            'marca',
            'modelo',
            //'tipo_poliza',
            //'capital_asegurado',
            'prima',
            'agente',


            [
               'class' => 'yii\grid\ActionColumn',
               'header' => 'Acciones',
               'buttons' => [
                   'view' => function ($url, $model, $key) {
                       return Html::a(
                           'Imprimir',
                           ['autos/report', 'id' => $key],
                       );
                   },
                   'update' => function ($url, $model, $key) {
                       return Html::a(
                           'Modificar',
                           ['autos/update', 'id' => $key],
                       );
                   },
                   'delete' =>function ($url, $model, $key) {
                       return Html::a(
                           'Eliminar',
                           ['autos/delete', 'id' => $key],
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
