 /*绑定浮动层*/
 $(function(){  
 	
 	
    touchScroll("float_top");  
   // touchScroll('float_bottom');
    /*
 	$(window).bind("scroll", function(){
 		 
 		   doscroll_top($('.float_top'));
 		    doscroll_bottom($('.float_bottom'));
 		    
 	}); 
 	 function doscroll_top(obj){
 	     $(obj).css({'position':'absolute','margin-top':$(window).scrollTop()});//,'top':$(window).scrollTop()
 	 }
 	 function doscroll_bottom(obj){
 	 	 $(obj).css({'position':'absolute','bottom':0});
 	 }*/
 }); 
 function isTouchDevice(){

 try{

     document.createEvent("TouchEvent");

     return true;

 }catch(e){

     return false;

 }

}



function touchScroll(id){

  if(isTouchDevice()){ //if touch events exist...

      var el= document.getElementById(id);

      var scrollStartPos=0;



      document.getElementById(id).addEventListener("touchstart", function(event) {

          scrollStartPos=this.scrollTop+event.touches[0].pageY;

          event.preventDefault();

      },false);



      document.getElementById(id).addEventListener("touchmove", function(event) {

          this.scrollTop=scrollStartPos-event.touches[0].pageY;

          event.preventDefault();

      },false);

  }

}
 