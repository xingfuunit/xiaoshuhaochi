function outdiv(widths,heights,titles,contents){
	var htmls ='<div id="outdiv">';
	    htmls +='<div class="topdiv">';
	    htmls +='<div class="outdivtitle"><strong>'+titles+'</strong></div>';
	    htmls +='<div class="outdivclose"><span>×关闭</span></div>';
	    htmls +='</div>';
	    htmls +='<div style="clear:both;"></div>';
	    htmls +='<div class="middlediv">'+contents+'</div>';
	    
      htmls +='</div>';
	$('body').append(htmls);
	$('.outdivclose').bind("click", function() { 
		    $('#outdiv').remove();  
  });
  var gundgao = getScrollTop(); 
  var leftlenfth = 0-(Number(widths)/2);
   var toplenth = Number(gundgao) - (Number(heights)/2);
  $('#outdiv').css({'width':widths,'height':heights,'margin-left':leftlenfth,'margin-top':toplenth}); 
  $('.middlediv').css('height',Number(heights)-30);
  
}
function getScrollTop()
{
    var scrollTop=0;
    if(document.documentElement&&document.documentElement.scrollTop)
    {
        scrollTop=document.documentElement.scrollTop;
    }
    else if(document.body)
    {
        scrollTop=document.body.scrollTop;
    }
    return scrollTop;
}

/*
<div id="outdiv">
	  <div class="topdiv">
	      <div class="outdivtitle"><strong>商品标题</strong></div>
	      <div class="outdivclose"><span>×关闭</span></div>
	  </div>
	  <div style="clear:both;"></div>
	  <div class="middlediv">
	  	    fdsafdsafdsafdsa
	  </div>
	  <div class="bottomdiv">
	  </div>
</div>
*/