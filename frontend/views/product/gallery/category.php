<ul class="optionset" data-option-key="filter">
    <li class="selected"><a href="#filter" data-option-value="*">All Works</a></li>
	<?php
	foreach($categories as $category)
		echo '<li><a data-option-value=".'.$category->option_value.'" href="#filter" title="View all post filed under '.$category->title.'">'.$category->title.'</a></li>';
		
	?>
</ul> 
