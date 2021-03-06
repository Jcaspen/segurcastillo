<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\Autos */

$this->title = 'Modificar Autos: ' . $model->tomador_dni;
$this->params['breadcrumbs'][] = ['label' => 'Autos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar';
?>

    <div class="autos-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="autos-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'caballos')->textInput() ?>

            <?= $form->field($model, 'capital_asegurado')->textInput() ?>

            <?= $form->field($model, 'prima')->textInput() ?>

            <?php
                     $js = <<<EOT
                        $(':button').click(function (event) {
                            var capital = document.getElementById("autos-capital_asegurado").value;
                            var caballos= document.getElementById("autos-caballos").value;
                            var prima= capital * caballos;
                            var prima2= prima /2000;
                            document.getElementById("autos-prima").value=Math.round(prima2);
                        });


            EOT;
            $this->registerJs($js);
            ?>
            <div class="form-group">
                <?= Html::Button('Recalcular Prima', ['class' => 'btn btn-info']) ?>
                <?= Html::a('Imprimir Póliza', ['report'], ['class' => 'btn btn-info']) ?>

                <p>

                </p>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
