<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo CHtml::encode($this->pageTitleInfo); ?></title>
    <meta name="keywords" content="<?php echo $this->keywords; ?>">
    <?php if(!empty($this->robotsIndex)): ?>
        <meta name="ROBOTS" content="<?php echo $this->robotsIndex; ?>">
    <?php endif; ?>
    <?php if($this->face_status == 1):?>
    <!--FACE SEO-->
        <meta property="og:title" content="<?php echo $this->face_title;?>">
        <meta property="og:description" content="<?php echo $this->face_des;?>">
        <meta property="og:image" content="<?php echo Yii::app()->getBaseUrl(true).$this->face_image;?>">
        <meta property="og:url" content="<?php echo Yii::app()->getBaseUrl(true).$this->face_url;?>">
    <!--END FACE SEO-->
    <?php endif;?>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/weather-icons.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/megafish.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/framework.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/flexslider/flexslider-alt.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/flexslider/flexslider-tab.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style.css" type='text/css' media="screen" />
	<link rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/print.css' id="print-style-css" type='text/css' media="print" />
    
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript" ></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/custom.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ta.css" type='text/css' media="screen" />
    <link rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/minhtien.css' type='text/css'/> 
    
    <link  rel="icon" type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png"/>
    <link  rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png"/>
    <link  rel="icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png"/>
    <link  rel="shortcut icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png"/>
</head>