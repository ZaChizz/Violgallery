<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('frontendWeb', dirname(dirname(__DIR__)) . '/frontend/web');
Yii::setAlias('backendWeb', dirname(dirname(__DIR__)) . '/backend/web');
Yii::setAlias('images',dirname(dirname(__DIR__)) . '/images');

Yii::setAlias('frontendWebroot', 'http://localhost/oyster/');
Yii::setAlias('backendWebroot', 'http://localhost/oyster/');
Yii::setAlias('frontendPlaceholder', 'http://localhost/oyster/images/placeholder');
Yii::setAlias('backendImages', 'http://localhost/oyster/images/');
