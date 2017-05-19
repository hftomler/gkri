<?php

use yii\bootstrap\Alert;
use yii\web\View;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';

$this->registerJsFile('@web/js/gifs.js', ['depends' => [\yii\web\JqueryAsset::className()], 'position' => View::POS_END]);
$this->registerJsFile('@web/js/votar.js', ['depends' => [\yii\web\JqueryAsset::className()], 'position' => View::POS_END]);
$this->registerJsFile('@web/js/back-to-top.js', ['depends' => [\yii\web\JqueryAsset::className()], 'position' => View::POS_END]);
?>
<a href="#" id="btn-arriba"><i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i></a>
<div class="container">
    <?php
    if (Yii::$app->session->getFlash('upload')) {
        echo Alert::widget([
            'options' => ['class' => 'alert-info'],
            'body' => Yii::$app->session->getFlash('upload'),
        ]);
    } ?>
    <?php if(isset($categoria)) : ?>
        <?php if ($categoria === null) : ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_view.php',
            'layout' => "{items}\n{pager}",
        ]) ?>
        <?php else : ?>
            <?php if($existeCategoria) : ?>
            <div class="busqueda">
                <h4>Búsqueda</h4>
                <h5>Estos son los posts con categoría: <?= $categoria ?></h5>
            </div>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => '_view.php',
                'layout' => "{items}\n{pager}",
            ]) ?>
            <?php else : ?>
            <h5>No existe la categoria que ha especificado: <?= $categoria ?></h5>
            <?php endif; ?>
        <?php endif; ?>
    <?php else : ?>
        <?php if(isset($titulo)) : ?>
            <?php if ($titulo === null) : ?>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => '_view.php',
                    'layout' => "{items}\n{pager}",
                ]) ?>
            <?php else : ?>
            <div class="busqueda">
                <h4>Búsqueda</h4>
                <h5>Estos son los posts cuyo título empiezan por: "<?= $titulo ?>"</h5>
            </div>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => '_view.php',
                'layout' => "{items}\n{pager}",
            ]) ?>
            <?php endif; ?>
        <?php else : ?>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => '_view.php',
                'layout' => "{items}\n{pager}",
            ]) ?>
        <?php endif; ?>
    <?php endif; ?>

</div>
