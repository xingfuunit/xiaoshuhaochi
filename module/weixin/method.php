<?php

class method extends baseclass
{
    public function wxset()
    {
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if($shopid > 0){
            $wechat =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wechat where shopid=$shopid");
            if (empty($wechat)) {
                $wechat = ['shopid' => 0,'token' => '', 'appid' => '', 'secret' => ''];
            }
            Mysite::$app->setdata($wechat);
        } else {
            $this->message('请登陆');
        }
    }

    public function wxsetsave(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        $info['token'] = trim(IReq::get('wxtoken'));
        $info['appid'] = trim(IReq::get('wxappid'));
        $info['secret'] = trim(IReq::get('wxsecret'));
        if(empty($info['token'])) $this->message('自定义token不能为空');
        if(empty($info['appid'])) $this->message('微信appid不能为空');
        if(empty($info['secret'])) $this->message('微信secret不能为空');
        $wechat = [];
        if($shopid > 0){
            $wechat =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wechat where shopid=$shopid");
        }
        if ($wechat) {
            $this->mysql->update(Mysite::$app->config['tablepre'].'shop_wechat',$info,"shopid='".$shopid."'");
        } else {
            $info['shopid'] = $shopid;
            $this->mysql->insert(Mysite::$app->config['tablepre'].'shop_wechat', $info);
        }
        $link = IUrl::creatUrl('weixin/wxset');
        $this->message('操作成功',$link);
   }

    public function wxmenu(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid > 0) {
            //构造微信 menu
            $wechat =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wechat where shopid=$shopid");
            $errorlink  =IUrl::creatUrl('weixin/wxset');
            if(empty($wechat)) $this->message('未设置微信基本信息',$errorlink);
            $data['wxmenu'] =  $this->mysql->getarr("select * from   ".Mysite::$app->config['tablepre']."shop_wxmenu where shopid=$shopid order by sort desc");
        }
        Mysite::$app->setdata($data);
    }

    public function delwxmenu(){
        $this->checkshoplogin();
        $id = intval(IReq::get('id'));
        if($id < 1) $this->message('提交ID错误');
        $shopid = ICookie::get('adminshopid');
        if ($shopid > 0) {
            $this->mysql->delete(Mysite::$app->config['tablepre'].'shop_wxmenu',"id  in(".$id.") and shopid=$shopid");
        }
        $this->success('操作成功');
    }

    public function getwxmen(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        $id = intval(IReq::get('id'));
        $info =  $this->mysql->select_one("select * from   ".Mysite::$app->config['tablepre']."shop_wxmenu where id = ".$id." order by sort desc");

        if(empty($info)){
            $this->message('获取失败');
        }
        if ($shopid != $info['shopid']) {
            $this->message('获取失败');
        }
        $info['msglist']  = array();
        if($info['msgtype']  == 2){
            if(!empty($info['values'])){
              $info['msglist'] =  unserialize($info['values']);
          }
        }elseif($info['msgtype'] == 0){
            if(!empty($info['values'])){
              $info['msglist'] =  unserialize($info['values']);
          }
        }
        $this->success($info);
    }

    public function savewxmenu(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('操作失败');
        }
        $id = intval(IReq::get('id'));
        $data['name'] = trim(IReq::get('name'));
        $data['parent_id'] = intval(IReq::get('parent_id'));
        $data['type'] = trim(IReq::get('types'));
        $data['sort'] = intval(IReq::get('sort'));
        if(empty($data['name'])) $this->message('提交菜单名不能为空');
        $data['code'] = trim(IReq::get('code'));
        if(empty($data['code'])) $this->message('对应的code不能为空');
        $data['type'] = $data['type']=='view'?'view':'click';
        $data['msgtype'] = 0;
        $info = $this->mysql->select_one("select * from   ".Mysite::$app->config['tablepre']."shop_wxmenu where id = ".$id." order by sort desc");

        if($data['type'] != 'view'){
             $data['msgtype'] = 1;
        }
        if($id > 0){
               unset($data['msgtype']);
               $info = $this->mysql->select_one("select * from   ".Mysite::$app->config['tablepre']."shop_wxmenu where id = ".$id." order by sort desc");
               if(empty($info)) $this->message('菜单不存在');
               if($shopid != $info['shopid']) {
                    $this->message('操作失败');
               }
               if($data['type'] == 'view'){
                if($info['type'] != 'view'){
                  $data['msgtype'] = 0;
                  $data['values'] = '';
                }
               }else{
                  if($info['type'] != 'click'){
                     $data['msgtype'] = 1;
                     $data['values'] = '';
                  }
               }
                 $this->mysql->update(Mysite::$app->config['tablepre'].'shop_wxmenu',$data,"id='".$id."'");
        }else{
            $data['shopid'] = $shopid;
            $this->mysql->insert(Mysite::$app->config['tablepre'].'shop_wxmenu',$data);
        }
      $this->success('操作成功');
    }

    public function savewxmenucontent(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('操作失败');
        }
        $id = intval(IReq::get('id'));
        $msgtype = intval(IReq::get('msgtype'));
        if($id > 0){
            $info =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wxmenu where id=$id");
            if ($shopid != $info['shopid']) {
                $this->message('操作失败');
            }
              if(empty($msgtype)){
                  $links = trim(IReq::get('values'));
                  if(empty($links)) $this->message('超连接不能为空');
                   $data['msgtype'] = 0;
                   $miaoshu = trim(IReq::get('miaoshu'));
                  if(empty($miaoshu)) $this->message('超连接描述不能为空');
                  $tempinfo['lj_link'] = $links;
                  $tempinfo['lj_title'] = $miaoshu;
                  $data['values'] = serialize($tempinfo);
                    $this->mysql->update(Mysite::$app->config['tablepre'].'shop_wxmenu',$data,"id='".$id."'");
                    $this->success('操作成功');
              }elseif($msgtype == 1){
                 $data['values'] = trim(IReq::get('wb_content'));
                 if(empty($data['values'])) $this->message('内容不能为空');
                 $data['msgtype'] = 1;
                 $this->mysql->update(Mysite::$app->config['tablepre'].'shop_wxmenu',$data,"id='".$id."'");
                 $this->success('操作成功');
              }elseif($msgtype == 2){
                   $biaoti = IReq::get('biaoti');
                   $miaoshu = IReq::get('miaoshu');
                   $tupian = IReq::get('tupian');
                   $lianjie = IReq::get('lianjie');
                   $doshow = array();
                   if(is_array($biaoti)){
                      foreach($biaoti as $key=>$value){
                        if(!empty($value)){
                        $tempinfo['biaoti'] = $value;
                        $tempinfo['miaoshu']  =  isset($miaoshu[$key])? $miaoshu[$key]:'';
                        $tempinfo['tupian']    =  isset($tupian[$key])? $tupian[$key]:'';
                        $tempinfo['lianjie']   =  isset($lianjie[$key])? $lianjie[$key]:'';
                        $doshow[] = $tempinfo;
                        }
                      }
                   }else{
                       if(empty($biaoti)) $this->message('提交数据不能为空');
                        $tempinfo['biaoti'] = $biaoti;
                        $tempinfo['miaoshu']  =  $miaoshu;
                        $tempinfo['tupian']    =  $tupian;
                        $tempinfo['lianjie']   =  $lianjie;
                         $doshow[] = $tempinfo;
                   }
                   if(empty($doshow)) $this->message('提交数据不能为空');
                    $data['msgtype'] = 2;
                  $data['values'] = serialize($doshow);
                  $this->mysql->update(Mysite::$app->config['tablepre'].'shop_wxmenu',$data,"id='".$id."'");
                  $this->success('操作成功');
              }
              $this->message('未定义的操作');
        }
        $this->success('操作成功');
    }

    public function  updatewxmenu(){
        //更新菜单到服务器
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('操作失败');
        }
        $info =  $this->mysql->getarr("select * from   ".Mysite::$app->config['tablepre']."shop_wxmenu where shopid=$shopid order by sort desc");
        $tempinfo = array();
        foreach ( $info as $key => $value )
        {
            if ( $value['parent_id'] == 0 )
            {
                $value['sub_button'] = array( );
                foreach ( $info as $k => $val )
                {
                    if ( $value['id'] == $val['parent_id'] )
                    {
                        $value['sub_button'][] = $val;
                    }
                }
                $tempinfo[] = $value;
            }
        }
        $menuinfo = array( );
        foreach ( $tempinfo as $key => $value )
        {
            if ( 0 < count( $value['sub_button'] ) )
            {
                $temhuan = array( );
                $temhuan['name'] = urlencode( $value['name'] );
                foreach ( $value['sub_button'] as $k => $v )
                {
                    $temsub = array( );
                    $temsub['name'] = urlencode( $v['name'] );

                    if ($v['type'] == 'view') {
                        $link = unserialize($v['values']);
                        $temsub['url'] =  urlencode($link['lj_link']);
                        $temsub['type'] = "view";
                    } else {
                        $temsub['type'] = "click";
                        $temsub['key'] = $v['code'];
                    }
                    $temhuan['sub_button'][] = $temsub;
                }
                $menuinfo['button'][] = $temhuan;
            }
            else
            {
                $temhuan = array( );
                $temhuan['name'] = urlencode( $value['name'] );
                $temhuan['key'] = $value['code'];
                if ($value['type'] == 'view') {
                    $link = unserialize($value['values']);
                    $temhuan['url'] =  urlencode($link['lj_link']);
                    $temhuan['type'] = "view";
                } else {
                    $temhuan['key'] = $value['code'];
                    $temhuan['type'] = "click";
                }
                $menuinfo['button'][] = $temhuan;
            }
        }


        $testinfo = urldecode(json_encode($menuinfo ));
        $wechat =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wechat where shopid=$shopid");
        if (empty($wechat)) {
            $this->message('未设置微信基本信息');
        }
        //print_r($wechat);exit;
        $wx_s = new wx_s($wechat['token'], $wechat['appid'], $wechat['secret'], $shopid);
        if($wx_s->savemenu($testinfo)){
            $this->success('操作成功');
        }else{
            $this->message($wx_s->err());
        }
    }

    public function wxback(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('获取失败');
        }
        $pageinfo = new page();
        $pageinfo->setpage(IReq::get('page'));
        $data['list'] = $this->mysql->getarr("select *  from ".Mysite::$app->config['tablepre']."shop_wxback where shopid=$shopid order by id desc  limit ".$pageinfo->startnum().", ".$pageinfo->getsize()." ");
        $shuliang  = $this->mysql->counts("select *  from ".Mysite::$app->config['tablepre']."shop_wxback where shopid=$shopid");
        $pageinfo->setnum($shuliang);
        $data['pagecontent'] = $pageinfo->getpagebar();
        Mysite::$app->setdata($data);
    }

    public function savewxback(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('获取失败');
        }
        $id = intval(IReq::get('id'));
        $data['code'] = trim(IReq::get('code'));
        if(empty($data['code'])) $this->message('code不能为空');
        $data['msgtype'] = intval(IReq::get('msgtype'));
        if(!in_array($data['msgtype'],array('1','2','3'))) $this->message('类型错误');
        if($data['msgtype'] ==  1){
        $datainfo['lj_title'] =  trim(IReq::get('lj_title'));
        $datainfo['lj_link'] =  trim(IReq::get('lj_link'));
        if(empty($datainfo['lj_title'])) $this->message('连接标题不能为空');
        if(empty($datainfo['lj_link'])) $this->message('连接地址不能为空');
        $data['values'] = serialize($datainfo);
        }elseif($data['msgtype'] ==  2){
            $data['values'] = trim(IReq::get('wb_content'));
            if(empty($data['values'])) $this->message('文本不能为空');
        }elseif($data['msgtype'] == 3){
            $biaoti = IReq::get('biaoti');
            $miaoshu = IReq::get('miaoshu');
            $tupian = IReq::get('tupian');
            $lianjie = IReq::get('lianjie');
            $doshow = array();
            if(is_array($biaoti)){
                foreach($biaoti as $key=>$value){
                    if(!empty($value)){
                        $tempinfo['biaoti'] = $value;
                        $tempinfo['miaoshu']  =  isset($miaoshu[$key])? $miaoshu[$key]:'';
                        $tempinfo['tupian']    =  isset($tupian[$key])? $tupian[$key]:'';
                        $tempinfo['lianjie']   =  isset($lianjie[$key])? $lianjie[$key]:'';
                        $doshow[] = $tempinfo;
                    }
                }
            }else{
                if(empty($biaoti)) $this->message('提交数据不能为空');
                    $tempinfo['biaoti'] = $biaoti;
                    $tempinfo['miaoshu']  =  $miaoshu;
                    $tempinfo['tupian']    =  $tupian;
                    $tempinfo['lianjie']   =  $lianjie;
                    $doshow[] = $tempinfo;
                }
                if(empty($doshow)) $this->message('提交数据不能为空');
                $data['values'] = serialize($doshow);
        }
        if($id > 0){
            $this->mysql->update(Mysite::$app->config['tablepre'].'shop_wxback',$data,"id='".$id."'");
        }else{
            $data['shopid'] = $shopid;
            $this->mysql->insert(Mysite::$app->config['tablepre'].'shop_wxback',$data);
        }
        $this->success('操作成功');
    }
    public function getwxback(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('获取失败');
        }
         $id = intval(IReq::get('id'));
         if($id < 1) $this->message('微信获取错误');
            $info  = $this->mysql->select_one("select *  from ".Mysite::$app->config['tablepre']."shop_wxback where id=".$id."");
            if(empty($info)) $this->message('微信错误');
         if ($info['shopid'] != $shopid) {
             $this->message('微信错误');
         }
         $temp = array();
         if($info['msgtype']   == 1){
              $info['listcontent'] = unserialize($info['values']);
         }elseif($info['msgtype'] == 3){
               $info['listcontent'] = unserialize($info['values']);
         }
         $this->success($info);
    }

    public function delwxback(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('操作失败');
        }
         $id = intval(IReq::get('id'));
         if($id < 1) $this->message('提交ID错误');
         $this->mysql->delete(Mysite::$app->config['tablepre'].'shop_wxback',"id  in(".$id.") and shopid=$shopid");
        $this->success('操作成功');
    }

    public function wxuser(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('获取失败');
        }
        $pageinfo = new page();
        $pageinfo->setpage(IReq::get('page'));
        $data['list'] = $this->mysql->getarr("select a.openid,a.is_bang,a.is_merchant,b.*  from ".Mysite::$app->config['tablepre']."shop_wxuser  as a left join ".Mysite::$app->config['tablepre']."member as b on b.uid = a.uid where shopid=$shopid  order by a.uid desc  limit ".$pageinfo->startnum().", ".$pageinfo->getsize()." ");
        $shuliang  = $this->mysql->counts("select * from ".Mysite::$app->config['tablepre']."shop_wxuser where shopid=$shopid");
        $pageinfo->setnum($shuliang);
        $data['pagecontent'] = $pageinfo->getpagebar();
        Mysite::$app->setdata($data);
    }

    public function setmerchant(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('操作失败');
        }
        $openid = trim(IReq::get('openid'));
        $is_merchant = (int)IReq::get('is_merchant');
        $data['is_merchant'] = $is_merchant;
        $this->mysql->update(Mysite::$app->config['tablepre'].'shop_wxuser',$data,"openid='".$openid."' and shopid=$shopid");
        $this->success('操作成功');
    }

    public function getoneuser(){
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('获取失败');
        }
        $openid = trim(IReq::get('openid'));

        $wechat =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wechat where shopid=$shopid");
        if (empty($wechat)) {
            $this->message('未设置微信基本信息');
        }
        $wx_s = new wx_s($wechat['token'], $wechat['appid'], $wechat['secret'], $shopid);
        if($wx_s->showuserinfo($openid)){
            $this->success($wx_s->getone());
        }else{
            $info = $wx_s->err();
            $this->message($info);
        }

  }
  public function sendwxmsg(){
      $this->checkshoplogin();
      $shopid = ICookie::get('adminshopid');
      if ($shopid <= 0) {
          $this->message('操作失败');
      }
      $openid = trim(IReq::get('openid'));
      $content = trim(IReq::get('content'));
      if(empty($content)) $this->message('发送内容不能为空');
      $wechat =  $this->mysql->select_one("select * from ".Mysite::$app->config['tablepre']."shop_wechat where shopid=$shopid");
      if (empty($wechat)) {
          $this->message('未设置微信基本信息');
      }

      $wx_s = new wx_s($wechat['token'], $wechat['appid'], $wechat['secret'], $shopid);
      if($wx_s->sendmsg($content,$openid)){
          $this->success('操作成功');
      }else{
          $this->message($wx_s->err());
      }
  }

}
