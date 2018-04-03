<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */

$this->title = $model->nombre;
$this->registerCssFile('/css/equipo.css');
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= Html::encode($this->title) ?> <?=Html::encode($model->liga->nombre)?>
                    de <?=Html::encode($model->liga->pais->nombre) ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-1">
                <?=Html::img($model->url, ['class' => 'img-equipo'])?>
            </div>
            <?php echo $this->render('/ligas/_clasificacion', ['clasificacion' => $clasificacion, 'equipo' => $model->id]); ?>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProviderJugadores,
        'filterModel' => $searchModelJugadores,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'columns' => [
            [
                'attribute' => 'posicion',
                'value' => 'posicion.nombre',
            ],
            [
                'attribute' => 'nombre',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->nombre), ['/jugadores/view', 'id' => $data->id]);
                },
                'format' => 'html',
            ],

            'dorsal',

        ],
    ]); ?>

</div>