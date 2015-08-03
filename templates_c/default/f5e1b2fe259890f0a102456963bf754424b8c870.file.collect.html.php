<?php /* Smarty version Smarty-3.1.10, created on 2015-05-20 16:32:53
         compiled from "D:\wmr\templates\default\site\collect.html" */ ?>
<?php /*%%SmartyHeaderCode:7642555c46b57ab3a2-34124607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5e1b2fe259890f0a102456963bf754424b8c870' => 
    array (
      0 => 'D:\\wmr\\templates\\default\\site\\collect.html',
      1 => 1399168728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7642555c46b57ab3a2-34124607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteurl' => 0,
    'tempdir' => 0,
    'collectlist' => 0,
    'items' => 0,
    'item' => 0,
    'shoplogo' => 0,
    'mainattr' => 0,
    'itat' => 0,
    'itaa' => 0,
    'mykey' => 0,
    'kongbai' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_555c46b58ae046_21543522',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c46b58ae046_21543522')) {function content_555c46b58ae046_21543522($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/css/bootstrap.min.css"> 
 <script src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/js/bootstrap.min.js" type="text/javascript" language="javascript"></script>
	<div class="hc_collection">
			<div class="hc_collection_head">
				<div class="hc_collection_h">我的收藏</div>
				<a class="collection_a" href="<?php echo FUNC_function(array('type'=>'url','link'=>"/shop/collect"),$_smarty_tpl);?>
"></a>
				<div class="clear"></div>
			</div>
			<div class="hc_collection_div">
				<ul>         				        		
			  <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_smarty_tpl->tpl_vars['myid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['collectlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
 $_smarty_tpl->tpl_vars['myid']->value = $_smarty_tpl->tpl_vars['items']->key;
?> 		
			   <?php if (isset($_smarty_tpl->tpl_vars['items']->value['id'])){?>
			   
			   <li shop_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" class="menu-list-box hc_collection_div_border_right"> 
						<div style="float:left;" class="hc_shop_list_box">
							<div class="hc_shop_list_box_left">
								<div class="hc_shop_list_box_img">
								<div class="hc_shop_list_box_img_div">
									<a href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp1),$_smarty_tpl);?>
"><img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shoplogo'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['shoplogo']->value : $tmp);?>
"></a>
								</div>
								</div>
								<div class="hc_shop_list_box_span">
									<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
									  <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='input'){?> 
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?>
									                 <?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>

									             <?php }?>
									          <?php } ?> 
									  <?php }?>     
									<?php } ?>
									
								</div>
							</div>
							<div class="hc_shop_list_box_right">
								<div class="hc_list_box_head" style="width: 80px;overflow: hidden;height: 20px;">
								<a class="hc_list_box_head_a_hover" href="<?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['items']->value['shortname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['id'] : $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php echo FUNC_function(array('type'=>'url','link'=>"/shop/index/id/".$_tmp2),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['items']->value['shopname'];?>
</a>
								</div>  
							<div class="hc_xinxin">
								<div class="hc_xinxin_div">
										 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['items']->value['point']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?> 
                  	      <div class="hc_xinxin_div_float"><img alt="star" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/xinxin01.png"></div>
                     <?php endfor; endif; ?> 
										  <div class="clear"></div>
								</div>
								<div class="hc_comment">
									
									<div class="hc_xinxin_div_float"><img alt="评论" src="<?php echo $_smarty_tpl->tpl_vars['siteurl']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['tempdir']->value;?>
/public/images/comment.png"></div>
									<div class="hc_xinxin_div_float"><span style="margin-left:3px;"><?php echo $_smarty_tpl->tpl_vars['items']->value['pointcount'];?>
</span></div>
									
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div> 
							<div class="hc_action">
								<?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
?>
									  <?php if ($_smarty_tpl->tpl_vars['itat']->value['type']=='img'){?> 
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?> 
									                 <img alt="" class="hc_action_img" src="<?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['itat']->value['instro'];?>
">  
									             <?php }?>
									          <?php } ?> 
									  <?php }?>     
									<?php } ?>
								 
								 </div> 
              <div class="hc_order">
              	 
              	<?php if ($_smarty_tpl->tpl_vars['items']->value['opentype']==1){?>
                    <span class="gray_font" title="店铺已过营业时间，打烊中">已打烊</span>
              <?php }elseif($_smarty_tpl->tpl_vars['items']->value['opentype']==2){?>
               <span class="hc_order_box" title="接受预定中。">营业中</span>
                <span class="gray_font">
              	 <?php  $_smarty_tpl->tpl_vars['itat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itat']->_loop = false;
 $_smarty_tpl->tpl_vars['mykey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mainattr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itat']->key => $_smarty_tpl->tpl_vars['itat']->value){
$_smarty_tpl->tpl_vars['itat']->_loop = true;
 $_smarty_tpl->tpl_vars['mykey']->value = $_smarty_tpl->tpl_vars['itat']->key;
?>
									   <?php if ($_smarty_tpl->tpl_vars['mykey']->value==0){?>
									   <?php $_smarty_tpl->tpl_vars['ckey'] = new Smarty_variable("0", null, 0);?>  
									          <?php  $_smarty_tpl->tpl_vars['itaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['attrdet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itaa']->key => $_smarty_tpl->tpl_vars['itaa']->value){
$_smarty_tpl->tpl_vars['itaa']->_loop = true;
?>
									             <?php if ($_smarty_tpl->tpl_vars['itat']->value['id']==$_smarty_tpl->tpl_vars['itaa']->value['firstattr']){?> 
									                 <?php echo $_smarty_tpl->tpl_vars['itaa']->value['value'];?>

									             <?php }?>
									          <?php } ?> 
									    <?php }?>     
									<?php } ?>
						     </span>
              <?php }elseif($_smarty_tpl->tpl_vars['items']->value['opentype']==3){?>
                        <span class="hc_order_box" title="接受预定中。">接受预定</span>
              	         <span class="hc_order_span"><?php echo $_smarty_tpl->tpl_vars['items']->value['newstartime'];?>
开送</span>
              <?php }elseif($_smarty_tpl->tpl_vars['items']->value['opentype']==4){?>
                 <span class="gray_font" title="店铺已过营业时间，打烊中">停止营业</span>
              <?php }else{ ?>
                   <span class="gray_font" title="店铺已过营业时间，打烊中">已打烊</span>
              <?php }?> 
              	</div> 
				   </div>
							<div class="clear"></div>
							<i shop_id="<?php echo $_smarty_tpl->tpl_vars['items']->value['id'];?>
" typeid="0" onclick="return delcollect(this);"style="position: absolute; top: 2px; right: 2px; display: none;" class="favDelBtn icon-remove"></i>
						</div>
				        <div class="clear"></div>
					</li>
					<?php }?>
					<?php } ?>
					<?php if (is_array($_smarty_tpl->tpl_vars['collectlist']->value)&&isset($_smarty_tpl->tpl_vars['collectlist']->value[0]['id'])){?>
					<?php $_smarty_tpl->tpl_vars['kongbai'] = new Smarty_variable(5-count($_smarty_tpl->tpl_vars['collectlist']->value), null, 0);?> 
					<?php }else{ ?>
					<?php $_smarty_tpl->tpl_vars['kongbai'] = new Smarty_variable(5, null, 0);?> 
					<?php }?>
				 
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['kongbai']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?> 
					 <li <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']!=$_smarty_tpl->tpl_vars['kongbai']->value-1){?>class="hc_collection_div_border_right" <?php }?> ><div class="addMyFav addMyFav_normal"></div></li>
					 <?php endfor; endif; ?> 
					  
					 
					 <div class="clear"></div>
					</ul>
				
			</div>
		</div>

			<div style="width:601px;" class="modal hide fade" id="Modal_col" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  	<div class="modal-header">
			  		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    	<h3 id="myModalLabel">添加收藏</h3>
			  	</div>
			  	<div class="modal-body" id="modal_body">
			  	</div>
			  	<div class="modal-footer">
			    	<button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
			    	<button class="btn btn-primary" id="cfm_addArea">确认添加</button>
			  	</div>
			</div>
			
			<script type="text/javascript">
			$('.addMyFav').hover(function(){
				addMyFavHover($(this));
			},function(){
				addMyFavHoverOut($(this));
			})
			/*
			$('.addMyFav').click(function(){
				addMyFav();
			})*/
	   $('.menu-list-box').bind('mouseenter', function() {
									$(this).find('.hc_shop_list_box').addClass('hc_shop_list_box_hover');
									$(this).find('.hc_list_box_head_a_hover').addClass('hc_list_box_head_hover');
								 	$(this).find('i').show();
									
		  });
		  	$('.menu-list-box').bind('mouseleave', function() {
									$(this).find('.hc_shop_list_box').removeClass('hc_shop_list_box_hover');
									$(this).find('.hc_list_box_head_a_hover').removeClass('hc_list_box_head_hover');
								 	$(this).find('i').hide();
								});
			function addMyFavHover(obj)
			{
				$(obj).removeClass('addMyFav_normal');
				$(obj).addClass('addMyFav_hover');
			}
			function addMyFavHoverOut(obj)
			{
				$(obj).removeClass('addMyFav_hover');
				$(obj).addClass('addMyFav_normal');
			}
		 
  function addMyFav() { 
					$.ajax({
						url:'<?php echo FUNC_function(array('type'=>'url','link'=>"/site/collectwindows"),$_smarty_tpl);?>
',
						type:'get',
						dataType:'text',
						data:'act=add',
						success:function(data){
							if(data == '1'){
								window.location.href='<?php echo FUNC_function(array('type'=>'url','link'=>"/memeber/login"),$_smarty_tpl);?>
';
							}
							else{
								$('#Modal_col').modal('show');
								$('#modal_body').html(data);

								$('.collectionInput').change(function(){
									changeCollectionCheck($(this));
									collectionCheck();
								})
								
								$('.menu-list-box').bind('mouseenter', function() {
									$(this).find('.hc_shop_list_box').addClass('hc_shop_list_box_hover');
									$(this).find('.hc_list_box_head_a_hover').addClass('hc_list_box_head_hover');
								});

								$('.menu-list-box').bind('mouseleave', function() {
									$(this).find('.hc_shop_list_box').removeClass('hc_shop_list_box_hover');
									$(this).find('.hc_list_box_head_a_hover').removeClass('hc_list_box_head_hover');
								});
								$('.hc_shop_list_box').css("border","1px solid #ddd");
							}
						}
					});
   }
			var collectionCheckShopIds = new Array();
			var collectionUnCheckShopIds = new Array();
			
            function collectionCheck()
            {
            	collectionCheckShopIds = new Array();
            	collectionUnCheckShopIds = new Array();
            	$('.collectionInput').each(function(i){
					if($(this).attr('checked')=='checked')
					{
						collectionCheckShopIds.push($(this).val());
					}
					else
					{
						collectionUnCheckShopIds.push($(this).val());
					}
                })
            }

            function changeCollectionCheck(obj)
            {
                var shop_id = $(obj).val();

                $('.collectionInput').each(function(i){
                    if($(this).val()==shop_id)
                    {
                        $(this).attr('checked',$(obj).attr('checked'));
                    }
                });
            }

         $('#cfm_addArea').click(function(){  
         	   var newidsArray = new Array();
         	     $('.collectionInput').each(function(i){
					            if($(this).attr('checked')=='checked')
				            	{
					             	newidsArray.push($(this).val());
					            } 
                 });
                 var newids = newidsArray.join(','); 
                 var oldids = $('#oldids').val();
                  
                	$.post('<?php echo FUNC_function(array('type'=>'url','link'=>"/site/saveclollectwin"),$_smarty_tpl);?>
',
                		{ 'oldids': oldids, 'newids': newids}, //要传递的数据 
                		function(data){ 
                			 if(data==0)
                			 {
                			 	$('#Modal_col').modal('hide');
                    			freshshopcllect();
                    		}else{
                    			alert(data);
                    		}
                		},'json'
                	)
        })
 
</script><?php }} ?>