<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;
use yii\filters\AccessControl;
use cinghie\cookieconsent\widgets\CookieWidget;

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
    if (\Yii::$app->user->can('crearUsuario')){
    NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-dark bg-dark navbar-expand-md fixed-top',
        ],
        'collapseOptions' => [
            'class' => 'justify-content-center',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Roles y permisos', 'url' => ['/auth-item/index']],
            ['label' => 'Usuarios', 'url' => ['/usuarios/index']],
            ['label' => 'Permisos asignados', 'url' => ['/auth-item-child/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Conectar', 'url' => ['/site/login']]
            ) : (
                '<li class="nav-item">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-dark nav-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
}else {
    NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-dark bg-dark navbar-expand-md fixed-top',
        ],
        'collapseOptions' => [
            'class' => 'justify-content-center',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            Yii::$app->user->can('emitirPoliza') ? (
            ['label' => 'Home', 'url' => ['/site/indexx']]
            ) : (['label' => 'Home', 'url' => ['/site/index']]),
            ['label' => 'Contacto', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Conectar', 'url' => ['/site/login']]
            ) : (
                '<li class="nav-item">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-dark nav-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
    ]);
    NavBar::end();
}
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="float-left">&copy; SegurCastillo <?= date('Y') ?></p>

        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
