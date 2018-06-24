 <?php
	if(empty($models))
		echo
		'{image: "'.Yii::getAlias('@frontendPlaceholder/1170x563.jpg').'", thmb: "'.Yii::getAlias('@frontendPlaceholder/120x130.jpg').'", alt: "Placeholder", title: "Placeholder", description: "", titleColor: "#ffffff", descriptionColor: "#ffffff"}';
	else
	{
		foreach($models as $model)
		{
			echo
			'{image: "'.$model->productImages[0]->getUrl('1170x').'", thmb: "'.$model->productImages[0]->getUrl('120x130').'", alt: "'.$model->title.'", title: "'.$model->title.'", description: "'.$model->description.'", titleColor: "#ffffff", descriptionColor: "#ffffff"},';
		}
	}
?>