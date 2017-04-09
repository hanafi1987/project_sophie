<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="sophie">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php $this->beginContent('@frontend/views/layouts/split/header.php'); ?>
<?php $this->endContent(); ?>
<section id="content">
    <div class="container">
        <?= $content ?>
    </div>
</section>
<?php $this->beginContent('@frontend/views/layouts/split/footer.php'); ?>
<?php $this->endContent(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>