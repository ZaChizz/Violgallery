<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 21.05.2015
 * Time: 17:15
 */

use yii\helpers\Html;

?>


<div class="sidepanel widget_categories">
    <h6 class="sidebar_header">Categories</h6>
    <ul>
        <?php
        foreach($models as $model)
        {
            echo '<li>'.Html::a(Html::encode($model['title']).'&nbsp;', ['post/category', 'category_id' => $model['category_id']]).'</li>';
        }
        ?>
    </ul>
</div>