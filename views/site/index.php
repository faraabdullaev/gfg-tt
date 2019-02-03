<?php
/* @var $this yii\web\View */
/* @var $brands array */
/* @var $sortFields array */

/* @var $model \app\models\ProductSearchForm */


use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Search Service Testing UI';
?>
<div class="site-index">
    <div class="row">
        <p>Search Filters:</p>

        <?php $form = ActiveForm::begin([
            'id' => 'search-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

        <div class="col-lg-6">
            <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'brand')->checkboxList($brands, [
                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <?= $form->field($model, 'price')->input('number', ['min' => 0.0, 'step' => 0.5]) ?>

            <?= $form->field($model, 'stock')->input('number', ['min' => 0, 'step' => 1]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'sortBy')->radioList($sortFields) ?>
            <?= $form->field($model, 'page')->input('number', ['min' => 1, 'step' => 1]) ?>
        </div>

        <?= $form->field($model, 'basicAccessToken')->hiddenInput()->label('') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div id="results" style="display: none">
        <div class="info">
            <p>URL: <span id="url"></span></p>
            <p>Status: <span id="status"></span></p>
            <p>Code: <span id="code"></span></p>
            <p>Page count: <span id="count"></span></p>
            <p>Current page: <span id="current"></span></p>
            <p>Total count: <span id="total"></span></p>
        </div>
        <pre></pre>
    </div>
</div>