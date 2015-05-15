<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<span class="glyphicon glyphicon-th-large"></span> ระบบรายงานสุขภาพจังหวัดสระแก้ว',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
/*            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Push', 'url' => ['/site/push']],
                ['label' => 'Reports','url' => ['/query/queryfp']],               
                ['label' => 'Campaign', 'url' => ['/campaign/index']],
                ['label' => 'CheckICD', 'url' => ['/checkicds/checkicds']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ]; 
 */
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
             'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
    'items' => [
        ['label' => '<span class="glyphicon glyphicon-home"></span> หน้าแรก', 'url' => ['/site/index']],
        ['label' => '<span class="glyphicon glyphicon-pencil"></span> push', 'url' => ['/site/push']],
        ['label' => '<span class="glyphicon glyphicon-list-alt"></span> รายงาน',
            'items'=>[['label'=>'FP','url'=>['query/queryfp']]]
            ],
        ['label' => '<span class="glyphicon glyphicon-tasks"></span> Campaign', 'url' => ['/campaign/index']],
        ['label' => '<span class="glyphicon glyphicon-ok"></span> CheckICD',
            'items'=>[
                       ['label'=>'A รหัส ICD ตามบริบท','url'=>['checkicds/checkicda1']],
                       ['label'=>'B รหัส ICD ตามแนวมาตราฐาน','url'=>['checkicds/checkicdb3']],
                       ['label'=>'C รหัส ICD ที่ไม่ควรใช้','url'=>['checkicds/checkicdc1']],                
                 ]
            ],
        ['label' => '<span class="glyphicon glyphicon-globe"></span> แผนที่', 'url' => ['/map/map']],
  //    ['label' => '<span class="glyphicon glyphicon-envelope"></span> About', 'url' => ['/site/about']],
        ['label' => '<span class="glyphicon glyphicon-envelope"></span> ติดต่อเรา', 'url' => ['/site/contact']],
        ['label' => '<span class="glyphicon glyphicon-user"></span> ลงชื่อเข้าใช้', 'url' => ['/site/login']],
                   
        
       
             ]]);
            NavBar::end();
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
