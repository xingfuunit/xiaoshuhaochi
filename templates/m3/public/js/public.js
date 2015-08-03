$(function(){ 
	
 autosize();
	$('#positionname2').text($('#positionname').text());
	$('#nowactioninfo').text($('#positionname').text());
	if(menu != null){
	$.each(menu,function(i,field){ 
	  
		if(field.is_curent == true)
		{
			$('#navshow').append('<a href="'+siteurl+field.urls+'" class="on">'+field.name+'</a>');
			
			
			 $('#menu').find('dt').text(field.name);
			var  detl= field.det;
			$.each(detl,function(k,submen){
				var classname="";
				if(submen.is_curent == true)
				{
					classname = 'class="on"';
				}
				
				$('#menu dl').eq(0).append('<dd '+classname+'><a href="'+siteurl+submen.urls+'">'+submen.name+'</a></dd> ');
			}); 
		 
			
		}else{
		   $('#navshow').append('<a href="'+siteurl+field.urls+'">'+field.name+'</a>');
		 }
		 
	}); 
}
	 
});
function artsucces(msg)
{
	var dialog =  art.dialog({
    time: 1,
    content: msg
  });
}
function autosize()
{
 
//	alert($('.right_content').height());
  var leftheight = $('.left_content').height();
  var rightheight = $('.right_content').height();
  var setheight = leftheight > rightheight?leftheight:rightheight;
  var defaultheight = setheight > 580? setheight:580;
  $('.newmain_all').css('height',defaultheight);
  var wheight = defaultheight-580+$('.newmain').height();
 // alert(defaultheight);
  wheight = defaultheight+80;
  $('.newmain').css('height',wheight); 
   
  
}
function subform(newurl,obj)
{
	$('#cat_zhe').toggle();
	$('#cat_tj').toggle();
	var url = $(obj).attr('action'); 
	$.ajax({
     type: 'post',
     async:true,
     data:$(obj).serialize(),
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {   
     	$('#cat_zhe').toggle();
	      $('#cat_tj').toggle();
     	if(content.error == false){
     		 
     		diasucces('操作成功',newurl);
     	}else{
     		
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	$('#cat_zhe').toggle();
	      $('#cat_tj').toggle();
    	diaerror('数据获取失败'); 
	  }
   });   
   
	return false;
}
function diaerror(msg)
{
	var dialog =  art.dialog({
    time: 2,
    content: msg
  });
}
function diasucces(msg,linkurl)
{
	    alert(msg);
    	if(linkurl == null || linkurl== '' || linkurl == undefined)
	    { 
	    	window.location.reload();
	    }else{
	    	 
	    	window.location.href=linkurl;
	    } 
} 
function remind(obj){
  if(confirm('确定操作吗？')){
  	$('#cat_zhe').toggle();
	      $('#cat_tj').toggle();
    var url = $(obj).attr('href'); 
	 $.ajax({
     type: 'get',
     async:true,
     data:$(obj).serialize(),
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {  
     	$('#cat_zhe').toggle();
	      $('#cat_tj').toggle();
     	if(content.error == false){
     		diasucces('操作成功','');
     	}else{
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) { 
    	$('#cat_zhe').toggle();
	      $('#cat_tj').toggle();
    	diaerror('数据获取失败'); 
	  }
   });   
  }
  return false;
}


var server = window.location.host;
var domain = 'pds.com';
function isChinese(str){
    var reg = /[u00-uFF]/;       
    return !reg.test(str);      
}
function RndNum(n){
  var rnd="";
  for(var i=0;i<n;i++)
    rnd+=Math.floor(1+Math.round(Math.random()*1000)*10);
  return rnd;
}
 
function strlen(str){
    var strlength=0;
    for (i=0;i<str.length;i++){
        if (isChinese(str.charAt(i))==true)
           strlength=strlength + 2;
        else
           strlength=strlength + 1;
     }
     return strlength;
}

String.prototype.trim = function(){
	return this.replace(/(^\s*)|(\s*$)/g, "");
}

function isEmail(email){
   var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
   return reg.test(email);
}
function isNum(str){
	return str.match(/\D/)==null;
}
function isIcq(str){
    var reg = /^[1-9]\d{4,9}$/;
    return  reg.test(str);
}
function isPhone(str){
	var reg = /(^[0-9]{7,8}$)|(0[1-9]{1,3}\-[1-9]{7,8}$)|(0[1-9]{10,11}$)|(13[1-9]{9,9}$)/;
    return  reg.test(str.trim());
}
function adddaohang(){
  var html = '<tr class="s_out" onmouseover="this.bgColor=\'#F5F5F5\';" onmouseout="this.bgColor=\'ffffff\';" bgcolor="#ffffff">';
  html += '<input type="hidden" name="id[]" value="">';
  html += '<td align="center">&nbsp;&nbsp;</td>';
  html += '<td align="left" style="padding-left:10px;">';
  html += '<input type="text" name="typename[]" id="typename[]" class="skey" style=\'width:130px;\'/>';
  html += '</td><td align="left" style="padding-left:10px;">';
  html += '<input type="text" name="typeurl[]" id="typeurl[]" class="skey" style=\'width:130px;\'/>';
  html += '</td><td align="left" style="padding-left:10px;">';
  html += '<input type="text" name="typeorder[]" id="typeorder[]" class="skey" style=\'width:50px;\'/>';
  html += '</td><td align="center"><a onclick="$(this).parent().parent().remove();" href="javascript:;">移除</a></td></tr>'; 
  $("#type").append(html);
}
//全选操作
function checkall()
{ 
	var checkinfo = $('#chkall').attr('checked');
	if(checkinfo ==  true){
	$("input[name='id[]']").attr("checked",true); 
	}else{
		$("input[name='id[]']").attr("checked",false); 
	} 
}
function checkword(flag)
{ 
		 $('#chkall').attr('checked',flag); 
	checkall();
}

function modifypwd()
{
	var showcontent = '<form method="post" name="form1" action="'+siteurl+'/index.php?ctrl=member&action=adminmodify&datatype=json" onsubmit="return subform(\'\',this);"><div>旧密码:<input type="password" name="oldpwd" value=""></div><div style="padding-top:10px;">新密码:<input type="password" name="pwd" value=""></div><div style="padding-top:10px;padding-left:30px;"><input type="submit" value="确认提交" class="button"> </div> </form>';
	art.dialog({
    id: 'KDf435',
    title: '修改账号密码',
    content: showcontent
  });
}
function remindall(obj){ 
  if(confirm('确定操作吗？')){
  	$('#cat_zhe').toggle();
	      $('#cat_tj').toggle();
    var url = $(obj).attr('href'); 
	 $.ajax({
     type: 'post',
     async:true,
     data:$('#delform').serialize(),
     url: url.replace('@random@', 1+Math.round(Math.random()*1000)), 
     dataType: 'json',success: function(content) {  
      $('#cat_zhe').toggle();
	      $('#cat_tj').toggle();
     	if(content.error == false){
     		diasucces('操作成功','');
     	}else{
     		if(content.error == true)
     		{
     			diaerror(content.msg); 
     		}else{
     			diaerror(content); 
     		}
     	} 
		},
    error: function(content) {  
    	$('#cat_zhe').toggle();
	      $('#cat_tj').toggle();
    	diaerror('数据获取失败'); 
	  }
   });   
  }  
  return false; 
}
//导出选择项
function outchoice(obj)
{ 
	var result=new Array();
	$("input[name='id[]']").each(function(){
		 if($(this).is(":checked")){
		 	 result.push($(this).val());
		 	}
	});	
	var idsm = result.join("-");
	var docontent = '';
	if(is_static == 1 || is_static == 2){
		docontent = '/outtype/ids/id/'+idsm;  
	}else{
		docontent = '&outtype=ids&id='+idsm;  
	}
	 
  var url = $(obj).attr('data')+docontent;
	window.open(url);  
}	
//导出选择项