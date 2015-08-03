<?php
 
class page
{
    private $nowpage = 0;
    private $pagesize = 10;
    private $pagenum = 0;
    
    public function setnum($num)
    {
    	$this->pagenum = $num;
    }
    
    public function setpage($nowpage,$pagesize=0)
    {
    	$this->nowpage = $nowpage > 0?$nowpage-1:$nowpage;
    	$this->pagesize = $pagesize == 0? $this->pagesize:$pagesize;
    }
    
    public function startnum()
    {
    	return $this->nowpage*$this->pagesize;
    }
    public function getsize()
    {
    	return $this->pagesize;
    } 
    public function totalpage()
    {
    	 $pagejisuan = intval($this->pagenum/$this->pagesize);//整页面计算 
       $pageyu = ($this->pagenum/$this->pagesize)-$pagejisuan;//计算余额
       $pagenum = $pageyu > 0?$pagejisuan+1:$pagejisuan;//计算完毕  
       return $pagenum;
    }
    
    public function getpagebar($url='')
    {
    	 $pagecontents = '';
    	 if($url == '')
    	 {
    	 	  $url = IUrl::getUri();
    	 } 
       $pagenum = $this->totalpage(); 
       $lookpage = $this->nowpage+1; 
       $is_static = Mysite::$app->config['is_static'];
       if($is_static ==  3){
       	 $url =  preg_replace('#&page=(\d+)#','',$url);
       }else{
          $url =  preg_replace('#/page/(\d+)#','',$url);
       }
       if($lookpage > 1){
         $uppage = $lookpage-1;
         $pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$uppage.'"><上一页</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$uppage.'"><上一页</a></li>';
       } 
       if($pagenum < 10){
        for($i = 1;$i < $pagenum+1;$i++)
        {
         	$k= $i+1;
         	if($i == 0)
         	{
         		if( $lookpage == 0)
         		{
         			$pagecontents = $pagecontents.'<li><a href="#" class="current">1</a></li>';
         		}else{
         		   $pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$i.'">1</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$i.'">1</a></li>';
         	  } 
         	}else{
         		
         	if( $lookpage == $i )
         	{		
         	   $pagecontents = $pagecontents.'<li><a href="#" class="current" >'.$i.'</a></li>';
         	    
           }else{
           	$pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$i.'">'.$i.'</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$i.'">'.$i.'</a></li>';
           }
          }
        } 
     }else{
     	 for($i = 1;$i < 4;$i++)
        {
         	$k= $i+1;
         	if($i == 0)
         	{
         		if( $lookpage == 0)
         		{
         			$pagecontents = $pagecontents.'<li><a href="#"  class="current">1</a></li>';
         		}else{
         		   $pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$i.'">1</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$i.'">1</a></li>';
         	  } 
         	}else{
         		
         	if( $lookpage == $i )
         	{		
         	   $pagecontents = $pagecontents.'<li><a href="#"  class="current">'.$i.'</a></li>';
         	    
           }else{
           	$pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$i.'">'.$i.'</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$i.'">'.$i.'</a></li>';
           }
          }
        } 
        if($lookpage > 2 && $lookpage <  $pagenum){
        	$startpage = $lookpage > 7 ? $lookpage-3:4;
        	$checkpage = $lookpage + 3;
        	$dosumpage = $pagenum - 3;
        	$endpage = $checkpage > $dosumpage ? $dosumpage-3:$checkpage;
        for($i = $startpage;$i < $endpage+3;$i++)
        {
         	$k= $i+1;
         	if($i == 0)
         	{
         		if( $lookpage == 0)
         		{
         			$pagecontents = $pagecontents.'<li><a href="#"  class="current">1</a></li>';
         		}else{
         		   $pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$i.'">1</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$i.'">1</a></li>';
         	  } 
         	}else{
         		
         	if( $lookpage == $i )
         	{		
         	   $pagecontents = $pagecontents.'<li><a href="#"  class="current">'.$i.'</a><li>';
         	    
           }else{
           	$pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$i.'">'.$i.'</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$i.'">'.$i.'</a></li>';
           }
          }
        } 
      }
        for($i = $pagenum-3;$i < $pagenum+1;$i++)
        {
         	$k= $i+1;
         	if($i == 0)
         	{
         		if( $lookpage == 0)
         		{
         			$pagecontents = $pagecontents.'<li><a href="#"  class="current">1</a></li>';
         		}else{
         		   $pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$i.'">1</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$i.'">1</a></li>';
         	  } 
         	}else{
         		
         	if( $lookpage == $i )
         	{		
         	   $pagecontents = $pagecontents.'<li><a href="#"  class="current">'.$i.'</a></li>';
         	    
           }else{
           	$pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$i.'">'.$i.'</a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$i.'">'.$i.'</a></li>';
           }
          }
        } 
     	
     }
     if($lookpage <  $pagenum){
         $uppage = $lookpage+1;
         $pagecontents = $is_static == 3 ? $pagecontents.'<li><a href="'.$url.'&page='.$uppage.'">下一页></a></li>':$pagecontents.'<li><a href="'.$url.'/page/'.$uppage.'">下一页></a></li>';
       } 
     $pagecontents .='<li><a href="#">共'.$pagenum.'页</a></li>';
       return $pagecontents;

    }
   
   /*
    ajaxbar：获取AJAX翻页
    样式：
     <ul>
         
        <li class="active"><a href="javascript:getPingjia(1);">1</a></li>
        <li><a href="javascript:getPingjia(2);">2</a></li>
        <li><a href="javascript:getPingjia(2);">下一页</a></li>
    </ul>
    param  $functionname 定义的函数
    */
   
    public function ajaxbar($functionname)
    {
    	  
       $pagenum = $this->totalpage(); 
       $lookpage = $this->nowpage+1;  
       $pagecontents = '<ul>';
       if($lookpage > 1)
       	  {
       	  	$pagecontents .= '<li><a href="javascript:'.$functionname.'('.$this->nowpage.');">上一页</a></li>';
       	  }else{
       	  	$pagecontents .= '<li class="disabled"><a href="javascript:'.$functionname.'(1);">上一页</a></li>';
       	  }
     if($pagenum < 8){  	  
       for($i = 1;$i < $pagenum+1;$i++)
       {
       	  //构造上页  
       	  
         	$k= $i+1;
         	if($i == 0)
         	{
         		if( $lookpage == 0)
         		{
         			$pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'(1);">1</a></li>';
         		}else{
         		  $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'(1);">1</a></li>';
         	  }
         		
         		 
         	}else{
         		
         	if( $lookpage == $i )
         	{		
         	     $pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
         	    
           }else{
           	   $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
           }
          }
          
          //构造末尾页
          
       } 
     }else{
     	  $checkpage  =  $lookpage +3;
     	   if($checkpage < 7){
     	   	 for($i = 1;$i < 6;$i++)
           {
           	  //构造上页  
           	  
             	$k= $i+1;
             	if($i == 0)
             	{
             		if( $lookpage == 0)
             		{
             			$pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'(1);">1</a></li>';
             		}else{
             		  $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'(1);">1</a></li>';
             	  }
             		
             		 
             	}else{
             		
             	if( $lookpage == $i )
             	{		
             	     $pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
             	    
               }else{
               	   $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
               }
              } 
           } 
           $znumpage = $pagenum - 3;
           for($i = $znumpage;$i < $pagenum+1;$i++)
           {
           	  //构造上页  
           	  
             	$k= $i+1;
             	if($i == 0)
             	{
             		if( $lookpage == 0)
             		{
             			$pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'(1);">1</a></li>';
             		}else{
             		  $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'(1);">1</a></li>';
             	  }
             		
             		 
             	}else{
             		
             	if( $lookpage == $i )
             	{		
             	     $pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
             	    
               }else{
               	   $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
               }
              } 
           } 
           
     	   	
     	   	
     	   	
     	   }elseif($checkpage > $pagenum){
     	   	for($i = 1;$i < 6;$i++)
           {
           	  //构造上页  
           	  
             	$k= $i+1;
             	if($i == 0)
             	{
             		if( $lookpage == 0)
             		{
             			$pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'(1);">1</a></li>';
             		}else{
             		  $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'(1);">1</a></li>';
             	  }
             		
             		 
             	}else{
             		
             	if( $lookpage == $i )
             	{		
             	     $pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
             	    
               }else{
               	   $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
               }
              } 
           } 
           $znumpage = $pagenum - 3;
           for($i = $znumpage;$i < $pagenum+1;$i++)
           {
           	  //构造上页  
           	  
             	$k= $i+1;
             	if($i == 0)
             	{
             		if( $lookpage == 0)
             		{
             			$pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'(1);">1</a></li>';
             		}else{
             		  $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'(1);">1</a></li>';
             	  }
             		
             		 
             	}else{
             		
             	if( $lookpage == $i )
             	{		
             	     $pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
             	    
               }else{
               	   $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
               }
              } 
           } 
     	   }else{
     	    	for($i = 1;$i < 3;$i++)
           {
           	  //构造上页  
           	  
             	$k= $i+1;
             	if($i == 0)
             	{
             		if( $lookpage == 0)
             		{
             			$pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'(1);">1</a></li>';
             		}else{
             		  $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'(1);">1</a></li>';
             	  }
             		
             		 
             	}else{
             		
             	if( $lookpage == $i )
             	{		
             	     $pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
             	    
               }else{
               	   $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
               }
              } 
           } 
           $starpage = $lookpage-1;
           $endpage = $lookpage+2;
           	for($i = $starpage;$i < $endpage;$i++)
           {
           	  //构造上页  
           	  
             	$k= $i+1;
             	if($i == 0)
             	{
             		if( $lookpage == 0)
             		{
             			$pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'(1);">1</a></li>';
             		}else{
             		  $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'(1);">1</a></li>';
             	  }
             		
             		 
             	}else{
             		
             	if( $lookpage == $i )
             	{		
             	     $pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
             	    
               }else{
               	   $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
               }
              } 
           } 
           $znumpage = $pagenum - 1;
           for($i = $znumpage;$i < $pagenum+1;$i++)
           {
           	  //构造上页  
           	  
             	$k= $i+1;
             	if($i == 0)
             	{
             		if( $lookpage == 0)
             		{
             			$pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'(1);">1</a></li>';
             		}else{
             		  $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'(1);">1</a></li>';
             	  }
             		
             		 
             	}else{
             		
             	if( $lookpage == $i )
             	{		
             	     $pagecontents = $pagecontents.'<li class="active"><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
             	    
               }else{
               	   $pagecontents = $pagecontents.'<li><a href="javascript:'.$functionname.'('.$i.');">'.$i.'</a></li>';
               }
              } 
           } 
     	   }  
     	    
     	
     	
     }
        if($lookpage < $pagenum)
       	  {
       	  	$uppage = $lookpage+1;
       	  	$pagecontents .= '<li><a href="javascript:'.$functionname.'('.$uppage.');">下一页</a></li>';
       	  }else{
       	  	$pagecontents .= '<li class="disabled"><a href="javascript:'.$functionname.'('.$pagenum.');">下一页</a></li>';
       	  }
       return $pagecontents.'</ul>';

    }
    

}
?>
