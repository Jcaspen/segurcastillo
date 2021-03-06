<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->textInput(['maxlength' => true, 'readonly'=>true]) ?>

    <?= $form->field($model, 'child')->dropdownList(['eliminarPoliza' => 'Eliminar pólizas',
                                                     'modificarPoliza' => 'Modificar pólizas',
                                                     'emitirPoliza' => 'Emitir pólizas',
                                                     'controlComunidad' => 'Comunidad',
                                                     'controlPlanp' => 'Planes de pensiones',
                                                     'controlEmpresa' => 'Empresas',
                                                     'controlPermisos' => 'Asignar permisos',
                                                     'controlAyuda' => 'Controla ayudas',
                                                     'controlSiniestros' => 'Controla Siniestros',
                                                     'controlReclamaciones' => 'Controla Reclamaciones',
                                                     'emitirPlanp' => 'Emitir planes de pensiones',
                                                     'crearUsuario' => 'Crear usuarios',
                                                     'modificarUsuario' => 'Modificar usuario',
                                                     'borrarUsuario' => 'Eliminar usuario']) ?>

    <div class="form-group">
        <?= Html::submitButton('Asignar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
