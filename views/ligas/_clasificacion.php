<?php

use yii\grid\GridView;
use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $clasificacion Array de equipos */
/* @var $equipo Id con el equipo que estar mirando*/
Yii::$app->params['equipo'] = $equipo;
?>

<div class="clasificacion">
    <div class="col-md-5">
        <h2>Clasificacion</h2>
        <?= GridView::widget([
            'dataProvider' => $clasificacion,
            'summary' => '',
            'rowOptions' => function ($model, $key, $index, $grid) {
                if ($model['id'] == Yii::$app->params['equipo']) {
                    return ['class' => 'info'];
                }
            },
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'header' => 'Posicion',

                ],
                [
                    'attribute'=> 'nombre',
                    'value' => function ($data) {

                        return Html::a(Html::encode($data['nombre']), ['equipos/view', 'id' => $data['id']]);
                    },
                    'format' => 'html',
                ],
                'pj',
                'pg',
                'pe',
                'pp',
                'gf',
                'gc',
                'dif',
                'pts'
            ]
        ])?>
    </div>


</div>
