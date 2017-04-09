<?php
use backend\assets\AdminAsset;
use yii\helpers\Html;

$asset = backend\assets\AdminAsset::register($this);
$baseUrl = $asset->baseUrl;
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
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
<?php $this->beginBody() ?>
<?php $this->beginContent('@backend/views/layouts/split/header.php'); ?>
<?php $this->endContent(); ?>
<div class="clearfix"></div>
<div class="page-container">
    <?php $this->beginContent('@backend/views/layouts/split/sidebar.php'); ?>
    <?php $this->endContent(); ?>
    <div class="page-content-wrapper">
        <div class="page-content">
            <?= $content ?>
        </div>
    </div>

</div>
<?php $this->beginContent('@backend/views/layouts/split/footer.php'); ?>
<?php $this->endContent(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
