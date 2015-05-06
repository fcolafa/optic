

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
       <title><?php echo CHtml::encode($this->pageTitle); ?></title>
       <link rel="icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl?>/images/favicon.png" />
       <script type="text/javascript">    
        var guest="<?php echo Yii::app()->user->isGuest?'false':'true'?>";
        $(document).ready(function () {
		var idleState = false;
		var idleTimer = null;
        $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
            clearTimeout(idleTimer);
            if (idleState == true && guest=='true') { 
                 alert("Sesión expirada por Inactividad ") ; 
                 window.location.replace("<?php echo Yii::app()->createAbsoluteUrl("Site/logout"); ?>");
                 idleState=false;
            }
            idleState = false;
            idleTimer = setTimeout(function () {idleState = true; }, 240000);
        });
    }
    );     
         
     </script>
       
        <?php $baseUrl = Yii::app()->theme->baseUrl; 
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/screen.css',$media="screen, projection");
        $cs->registerCssFile($baseUrl.'/css/print.css',$media="print");
        $cs->registerCssFile($baseUrl.'/css/main.css');
        $cs->registerCssFile($baseUrl.'/css/form.css');
        $cs->registerCssFile($baseUrl.'/css/buttons.css');
        $cs->registerCssFile($baseUrl.'/css/icons.css');
        $cs->registerCssFile($baseUrl.'/css/tables.css');
        $cs->registerCssFile($baseUrl.'/css/mbmenu.css');
        $cs->registerCssFile($baseUrl.'/css/jquery.css');
        $cs->registerCssFile($baseUrl.'/css/mbmenu_iestyles.css');
        $cs->registerScriptFile($baseUrl.'/js/clock.js');?>
       

</head>

<body>

<div class="container" id="page">

	<div id="topnav">
            
            
            <div class="topnav_text" > 
                <div id="clockbox" ></div>
              
                
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
                       if(!empty($glass)){
                           echo "Los siguientes Cristales estan bajo el stock deseado <br>";
                           $cuerpo="Cristales \n";
                           foreach($glass as $gl){
                           $linea="Esfera(". $gl->sphere.") Cilindro(".$gl->cylinder.") ";
                           $cuerpo.=$linea."\n";
                           $linea.="<br>";
                           echo "<li>".CHtml::link($linea,array("glass/view", 'id'=>$gl->id_glass))."</li>"; 
                           }
                           echo CHtml::link("solicitar Cristales <br>",array('site/contact','cuerpo'=>$cuerpo,'type'=>2));
                          
                       }
                       
                       $contactl=  ContactLenses::model()->findAll('amount<=critical_stock');
                       if(!empty($contactl))
                       {
                           echo "<br>Los siguientes lentes de contacto estan bajo el stock deseado <br>";
                           $cuerpo="Lentes de Contacto \n";
                           foreach($contactl as $cl){
                           $linea="Esfera(". $cl->sphere.") Cilindro(".$cl->cylinder.") ";
                           $cuerpo.=$linea."\n";
                           $linea.="<br>";
                           echo "<li>". CHtml::link($linea,array("contactlenses/view", 'id'=>$cl->id_contactlenses))."</li>"; 
                           }
                           echo CHtml::link("solicitar Lentes de Contacto",array('site/contact','cuerpo'=>$cuerpo,'type'=>1));
                           echo "<br>";
                       }
                       
                       $frame= Frames::model()->findAll('amount<=critical_stock');
                          if(!empty($frame))
                       {
                           echo "<br>Los siguientes Armazones estan bajo el stock deseado <br>";
                           $cuerpo="Armazones \n";
                           foreach($frame as $f){
                           $linea=$f->idFrameMaterial->frame_material_name." ,modelo:".$f->idExamplar->examplar_name." de ".$f->idMark->mark_name;
                           $cuerpo.=$linea."\n";
                           $linea.="<br>";
                           echo "<li>". CHtml::link($linea,array("frames/view", 'id'=>$f->id_frame))."</li>"; 
                           }
                           echo CHtml::link("solicitar armazones",array('site/contact','cuerpo'=>$cuerpo,'type'=>3));
                           echo "<br>";
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
                    array('label'=>Yii::t('database','Contact Lenses'), 'url'=>array('/contactlenses/index')),
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
            array('label'=>Yii::t('actions','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest,
                'linkOptions' => array('confirm' => 'Esta seguro que desea cerrar la sesión'),),
      
            ),
  ));?> 

	</div> <!--mainmenu -->
            <?php    $this->widget('ext.LangPick.ELangPick', array(      
               )); ?>
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
        <!-- breadcrumbs -->
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