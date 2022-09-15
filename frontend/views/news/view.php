<?php
/* @var $this yii\web\View */
/* @var $model app\models\News */
?>
<h1><?= $model->title; ?></h1> <!--- Заголовок новости -->

<p>
    <br>
    <?= $model->content; ?><br> <!-- это контент новости-->
    <!-- должно быть место под теги-->
    <img style="max-width: 250px" src="<?= $model->image?>"> <!-- это картинка-->

    <?= date("d.m.Y г.", $model->created_at); ?><br> <!-- это дата публикации-->
</p>
