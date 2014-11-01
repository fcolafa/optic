

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
    
       <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu.css" />
       <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu_iestyles.css" />
       <title><?php echo CHtml::encode($this->pageTitle); ?></title>
       <link rel="icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl?>/images/favicon.png" />

</head>

<body>

<div class="container" id="page">

	<div id="topnav">
            <div class="topnav_text"> 
               
                <?php 
                if(!Yii::app()->user->isGuest){?>
               
                <?php
                      $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                        'id'=>'dialog-animation',
                        'options'=>array(
                            'title'=>Yii::t('actions','System Alerts'),
                            'autoOpen'=>false,
                            'show'=>array(
                                    'effect'=>'blind',
                                    'duration'=>1000,
                                ),
                            'hide'=>array(
                                    'effect'=>'explode',
                                    'duration'=>500,
                                ),  
                        ),
                            'htmlOptions'=>array(
                                    'class'=>'shadowdialog'
                                ),
                        ));
                       $glass=  Glass::model()->findAll('amount<=critical_stock');
                       if(isset($glass)){
                           echo "los siguientes Cristales estan bajo el stock deseado <br>";
                           foreach($glass as $gl){
                           echo CHtml::link( "id(".$gl->id_glass.")  Esfera(". $gl->sphere.") Cilindro(".$gl->cylinder.") <br> ",array("glass/view", 'id'=>$gl->id_glass));                          
                           }
                       }
                    $this->endWidget('zii.widgets.jui.CJuiDialog');
                    /** End Widget **/
                    echo CHtml::button(Yii::t('actions','System Alerts'), array(
                       'class'=>'button grey',
                       'onclick'=>'$("#dialog-animation").dialog("open"); return false;',
                    ));}?>               
            </div>
	</div>
    
	<div id="header">
		 <div id="logo"><img src="<?php echo Yii::app()->theme->baseUrl?>/images/logo.png"></img></div>
	</div><!-- header -->
        <div id="mainMbMenu">
  <?php 
  $this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
            array('label'=>Yii::t('database','Home'), 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),
            array('label'=>Yii::t('database','Offices'), 'url'=>array('/office/index'),'visible'=>!Yii::app()->user->isGuest),
            array('label'=>Yii::t('database','Clients'), 'url'=>array('/Client/index'),'visible'=>!Yii::app()->user->isGuest),
            array('label'=>Yii::t('database','Products'),
                  'visible'=>!Yii::app()->user->isGuest,
                  'items'=>array(
                    array('label'=>Yii::t('database','Glasses'), 'url'=>array('/Glass/index')),
                    array('label'=>Yii::t('database','Marks'), 'url'=>array('/mark/index')),
                    array('label'=>Yii::t('database','Examplars'), 'url'=>array('/examplar/index')),
                    array('label'=>Yii::t('database','Frames'), 'url'=>array('/frames/index')),
                  ),
                ), 
            array('label'=>Yii::t('database','Providers'), 
                'items'=>array(
                    array( 'label'=>Yii::t('actions','Manage').' '.Yii::t('database','Providers'),'url'=>array('/Provider/index'),'visible'=>!Yii::app()->user->isGuest),
                    array( 'label'=>Yii::t('database','Contact Providers'),'url'=>array('/site/contact'),'visible'=>!Yii::app()->user->isGuest),
                ),
                ),
            array('label'=>Yii::t('actions','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
            array('label'=>Yii::t('actions','Manage').' '.Yii::t('database','Users'),'url'=>array('/users/index'),'visible'=>Yii::app()->user->checkAccess('Control Total')),        
            array('label'=>Yii::t('actions','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
      
            ),
  ));?> 

	</div> <!--mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                
                
                
                <!-- some validation message -->
        <div class="info" style="text-align: left;">
        <?php $flashMessages=Yii::app()->user->getFlashes();
        if($flashMessages){
            echo '<ul class="flashes">';
            foreach ( $flashMessages as $key =>$message){
                echo '<li><div class="flash-'.$key.'">'. $message . "</div></li>\n";
        }
      echo '</ul>';
            }   
        ?>
        </div>

	<?php echo $content; ?>

        <div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Francisco Lagos.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered();  ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
<?php
Yii::app()->clientScript->registerScript(
        'myHideEffect',
        '$(".info").animate({opacity:1.0},10000).slideUp("slow");',
        CClientScript::POS_READY
        );