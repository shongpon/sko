<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Push';
$this->params['breadcrumbs'][] = $this->title;

$options = [
    'item' => function($index, $label, $name, $checked, $value) {

        // check if the radio button is already selected
        $checked = ($checked) ? 'checked' : '';

        $return = '<label class="radio-inline">';
        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . '>';
        $return .= $label;
        $return .= '</label>';

        return $return;
    }
]
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

<p>You have entered the following information:</p>

<ul>
    <li><label>Sex</label>: <?= Html::encode($model->sex) ?></li>
    <li><label>Age</label>: <?= Html::encode($model->age) ?></li>
</ul>


    <p>Please fill out the following fields to Push Notification Service:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>
                <?=$form->field($model, 'sex')
                        ->radioList(
                            ['all' => ' ทุกเพศ ', 'male' => ' ชาย ', 'female' => ' หญิง '],
                            ['item' => function ($index, $label, $name, $checked, $value) {
                                return '<label class="radio-inline">' . Html::radio($name, $checked, ['value'  => $value]) . $label . '</label>';
                                }
                            ]
                        )
                    ->label('เพศ');
                ?>

                <?= $form->field($model, 'age')->label('อายุ') ?>
                <?= $form->field($model, 'provcode')->dropdownList(['00' => 'ทุกจังหวัด', '27' => 'สระแก้ว', '10' => 'กรุงเทพฯ']) ?>
                <?= $form->field($model, 'distcode') ?>
                <?= $form->field($model, 'subdistcode') ?>
                <?= $form->field($model, 'hoscode') ?>
                <?= $form->field($model, 'msg')->textArea(['rows' => 6])->label('ข้อความ')  ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
