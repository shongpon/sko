<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use app\models\Cprovince;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="campaign-form">

<div class="row">
  <div class="col-md-6">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

<div class="form-group">
<label class="control-label" for="campaign-enddate">ระยะเวลา</label>
    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => 'startdate',
        'attribute2' => 'enddate',
        'language' => 'th',
        'options' => ['placeholder' => 'วันเริ่มโครงการ'],
        'options2' => ['placeholder' => 'วันสิ้นสุด'],
        'form' => $form,
        'type' => DatePicker::TYPE_RANGE,
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>
<div class="help-block"></div>
</div>

    <?= $form->field($model, 'thumbnail_url')->
    input('url', ['placeholder'=>'ระบุ url ที่ถูกต้อง...', 'maxlength' => 255]) ?>


    <?= $form->field($model, 'detail_url')->input('url', ['placeholder'=>'ระบุ url ที่ถูกต้อง...', 'maxlength' => 255]) ?>

    <?= $form->field($model, 'publisher_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'publisher_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hotline_number')->textInput(['maxlength' => 50]) ?>


</div>
  <div class="col-md-6">



<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">กลุ่มเป้าหมาย</h3>
  </div>
  <div class="panel-body">


    <?= $form->field($model, 'target_age_start')->textInput() ?>

    <?= $form->field($model, 'target_age_end')->textInput() ?>
    
    <?=$form->field($model, 'target_sex')->radioList(
            ['0' => ' ทุกเพศ ', '1' => ' ชาย ', '2' => ' หญิง '],
            ['item' => function ($index, $label, $name, $checked, $value) {
                        return '<label class="radio-inline">' . Html::radio($name, $checked, ['value'  => $value]) . $label . '</label>';
                    }
                ]
            )->label('เพศ');?>

    <?= $form->field($model, 'target_provcode')->dropDownList(
    ArrayHelper::map(Cprovince::find()->orderBy('changwatname')->all(),'changwatcode', 'changwatname'), ['prompt'=>'ทุกจังหวัด', 'id'=>'provid']

    )?>



     <?= Html::hiddenInput('distcode', $model->target_distcode, ['id'=>'distcode']); ?>
     <?= Html::hiddenInput('subdistcode', $model->target_subdistcode, ['id'=>'subdistcode']); ?>

    <?= $form->field($model, 'target_distcode')->widget(DepDrop::classname(), [
    'options'=>['id'=>'distid'],
    'pluginOptions'=>[
        'depends'=>['provid'],
        'placeholder'=>'เลือก...',
        'initialize'=>true,
        'params'=>['distcode'],
        'url'=>Url::to(['/campaign/district'])
    ]
]);?>

    <?= $form->field($model, 'target_subdistcode')->widget(DepDrop::classname(), [
    'pluginOptions'=>[
        'depends'=>['distid'],
        'placeholder'=>'เลือก...',
        'initialize'=>true,
        'params'=>['subdistcode'],
        'url'=>Url::to(['/campaign/subdistrict'])
    ]
]); ?>





    <?= $form->field($model, 'target_hospcode')->textInput(['maxlength' => 5]) ?>

<div class="form-group">
<label class="control-label" for="campaign-target_chronic">โรคประจำตัว</label>
   <?=  Select2::widget([
    'model' => $model,
    'attribute' => 'target_chronic',
    'data' => ['dm' => 'DM', 'ht' => 'HT'],
    'options' => [
        'placeholder' => 'ระบุโรคประจำตัว ...', 
        'multiple' => true
    ],
]); ?>
<div class="help-block"></div>


    </div>
  </div>
  </div>

    <input type="hidden" id="campaign-userid" class="form-control" name="Campaign[userid]" value="<?= $model->userid ?>">



    <?= $form->field($model, 'redirect2publisher')->textInput() ?>

    <?= $form->field($model, 'full_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publish')->dropDownList(['1' => 'เผยแพร่', '0' => 'ไม่เผยแพร่']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
    </div>
