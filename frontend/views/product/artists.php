<?php

use yii\helpers\Html;

$this->registerJs("$('body').on('click','.productlike',handleAjaxLink); $('.load_more_works').click(handleAjaxLink); $('#loadMore').click(function(){ $('#loadMore').attr('style', 'pointer-events:none;')});", \yii\web\View::POS_READY);

?>
<div class="fullscreen_block hided">
<ul class="optionset" data-option-key="filter">
    <li class="selected"><a href="#filter" data-option-value="*">All Artists</a></li>
    <li><a data-option-value=".a_element" href="#filter" title="View all post filed under A">A</a></li>
    <li><a data-option-value=".b_element" href="#filter" title="View all post filed under B">B</a></li>
    <li><a data-option-value=".c_element" href="#filter" title="View all post filed under C">C</a></li>
    <li><a data-option-value=".d_element" href="#filter" title="View all post filed under D">D</a></li>
    <li><a data-option-value=".e_element" href="#filter" title="View all post filed under E">E</a></li>
    <li><a data-option-value=".f_element" href="#filter" title="View all post filed under F">F</a></li>
    <li><a data-option-value=".g_element" href="#filter" title="View all post filed under G">G</a></li>
    <li><a data-option-value=".h_element" href="#filter" title="View all post filed under H">H</a></li>
    <li><a data-option-value=".i_element" href="#filter" title="View all post filed under I">I</a></li>
    <li><a data-option-value=".j_element" href="#filter" title="View all post filed under J">J</a></li>
    <li><a data-option-value=".k_element" href="#filter" title="View all post filed under K">K</a></li>
    <li><a data-option-value=".l_element" href="#filter" title="View all post filed under L">L</a></li>
    <li><a data-option-value=".m_element" href="#filter" title="View all post filed under M">M</a></li>
    <li><a data-option-value=".n_element" href="#filter" title="View all post filed under N">N</a></li>
    <li><a data-option-value=".o_element" href="#filter" title="View all post filed under O">O</a></li>
    <li><a data-option-value=".p_element" href="#filter" title="View all post filed under P">P</a></li>
    <li><a data-option-value=".q_element" href="#filter" title="View all post filed under Q">Q</a></li>
    <li><a data-option-value=".r_element" href="#filter" title="View all post filed under R">R</a></li>
    <li><a data-option-value=".s_element" href="#filter" title="View all post filed under S">S</a></li>
    <li><a data-option-value=".t_element" href="#filter" title="View all post filed under T">T</a></li>
    <li><a data-option-value=".u_element" href="#filter" title="View all post filed under U">U</a></li>
    <li><a data-option-value=".v_element" href="#filter" title="View all post filed under V">V</a></li>
    <li><a data-option-value=".w_element" href="#filter" title="View all post filed under W">W</a></li>
    <li><a data-option-value=".x_element" href="#filter" title="View all post filed under X">X</a></li>
    <li><a data-option-value=".y_element" href="#filter" title="View all post filed under Y">Y</a></li>
    <li><a data-option-value=".z_element" href="#filter" title="View all post filed under Z">Z</a></li>
</ul>
<div class="fs_blog_module image-grid" id="list">
    <?php
        foreach($models as $key=>$model)
        {
            echo $this->render('artists/item', ['model'=>$model, 'element'=>$elements[$key]]);
        }
     ?>
</div>
    <?php
    echo Html::a('<i class="icon-arrow-down"></i>Load more works', ['product/items'], [
            'id' => 'loadMore',
            'class' => 'load_more_works',
            'data-on-done' => 'addItemDone',
            'rel'=>'{"offset":'.$offset.', "items":'.count($models).'}',
        ]
    );
    ?>
</div>