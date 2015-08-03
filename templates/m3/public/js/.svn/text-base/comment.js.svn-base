//向下滑动 转换
var biaoqingArray = [];
var biaoqingImgArray = [];
var shuoshuotip="说说您想对我们说的……";
$(function(){
	var biaoqing = $("#publisher_emotion").find('a');
	for(var i = 0 ,len = biaoqing.length; i < len; i++){
		biaoqingArray.push(biaoqing[i].childNodes[0].title);
		biaoqingImgArray.push(biaoqing[i].childNodes[0].src);
	}
  $('.icon_bq').live("click", function() {  
    	$('#publisher_emotion').show();
  });
   $('#publisher_emotion a').live('click',function(){
   	   $("#microbolg_message")[0].value += "["+$(this).find("img").first().attr('title')+"]";
			$("#publisher_emotion").hide();
			$('#microbolg_message').trigger('onfocus');
  });
  $('.icon_tp').live("click", function() {  
    	$('#div-messagepicUpload').show();
  });
  $('#submitImg').click(function(){
		ajaxFileUpload();
	});
	$('#btn_fb').click(function(){
		var message = $.trim($("#microbolg_message").val()); 
	  for(var i=0;i<biaoqingArray.length;i++){
		  if(message.indexOf("["+biaoqingArray[i]+"]")!=-1){
			var rel = new RegExp("\\["+biaoqingArray[i]+"\\]",'g');
			message = message.replace(rel,"<img src="+biaoqingImgArray[i]+" alt="+biaoqingArray[i]+" />");
		  }
	  }
	  var image = $("#msgImage").val();
	  message = message.replace(/\r\n/ig,"<br/>");
	  if(!message){
		   alert("请输入私信内容");
		  return false;
	  } 
	  tijiaoneirong(message,image);
		//提交comment 内容
	});
	$("#microbolg_message").keyup(function(){
    var count = $("#microbolg_message").val().length;
		if(count<=420){
			$("#fontcount").html( 420-count );
		}else{
			$("#microbolg_message").val( $("#microbolg_message").val().substring(0,420));
			$("#fontcount").html( 0 );
		}
  });
});
function checkMessage(){
	var message = $("#microbolg_message").val();
	if($.trim( message )=="" || $.trim( message ) == shuoshuotip){
		$("#microbolg_message").css('backgroundColor','#fcdede');
		setTimeout(function(){
			$('#microbolg_message').css('backgroundColor','#fff')
		},200);
		return false;
	}
	return true;
}
function sixinfocus(eve){  
	if($(eve).val().indexOf("您想对我们说")!=-1){
		$(eve).val($(eve).val().replace(shuoshuotip,""));
		$(eve).css('color','#333');
	} 
}
function closeLayer(obj){
	$('#'+obj).hide();
}
function ajaxFileUpload()
{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		}); 
		$.ajaxFileUpload
		(
			{
				url:siteurl+'/index.php?ctrl=other&action=userupload&datatype=json&type=comment',
				secureuri:false,
				fileElementId:'imgFile',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error == false)
						{ 
							
						 
		           if($("#microbolg_message").val()=="" || $("#microbolg_message").val()==shuoshuotip){
			             $("#microbolg_message").val( "分享图片" );
			             $('#microbolg_message').trigger('onfocus');
		           }
	            $("#msgfileup_success_tip").html("<p style='margin:0;padding:0;height:20px;line-height:20px;'>上传成功！</p>");
		          $("#msgImage").val(data.msg);
		          $('#div-messagepicUpload').css('display','none');
		          $('#msgfileup_success_tip').html(''); 
						}else
						{
							$("#msgfileup_success_tip").html("<p style='margin:0;padding:0;height:20px;line-height:20px;'>"+data.msg+"</p>");
	               	$("#msgImage").val("");
		           if($("#microbolg_message").val()=="分享图片"){
			             $("#microbolg_message").val("");
		           }
						}
					}else{
					     $("#msgfileup_success_tip").html("<p style='margin:0;padding:0;height:20px;line-height:20px;'>"+data.msg+"</p>");
	             $("#msgImage").val("");
		           if($("#microbolg_message").val()=="分享图片"){
			             $("#microbolg_message").val("");
		           }  
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		) 
		return false; 
}

