<?php

class method extends baseclass
{
    public function addsingle()
    {
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('操作失败');
        }
        $id = IReq::get('id');
        if (empty($id)) {
             $data['info'] = array('single_id' => 0, 'title'=> '', 'seo_key' => '', 'seo_content' => '', 'addtime' => '', 'code' => '', 'content' => '');
        } else {
            $data['info'] = $this->mysql->select_one('SELECT * FROM '.Mysite::$app->config['tablepre'].'shop_single WHERE single_id='.(int)$id);
        }
        Mysite::$app->setdata($data);
    }

    public function savesingle()
    {
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('获取失败');
        }
        $id = IReq::get('uid');
        $data['addtime'] = strtotime(IReq::get('addtime').' 00:00:00');
        $data['title'] = IReq::get('title');
        $data['content'] = IReq::get('content');
        $data['code'] = IReq::get('code');
        $data['seo_key'] = IFilter::act(IReq::get('seo_key'));
        $data['seo_content'] = IFilter::act(IReq::get('seo_content'));
        $data['shop_id'] = $shopid;
        if (empty($id)) {
            $link = IUrl::creatUrl('single/addsingle');
            if(empty($data['content'])) $this->message('单页内容不能为空',$link);
            if(empty($data['title'])) $this->message('单页标题不能为空',$link);
            $this->mysql->insert(Mysite::$app->config['tablepre'].'shop_single', $data);
        } else {
            $link = IUrl::creatUrl('single/addsingle/id/'.$id);
            if(empty($data['content'])) $this->message('单页内容不能为空', $link);
            if(empty($data['title'])) $this->message('单页标题不能为空', $link);
            $this->mysql->update(Mysite::$app->config['tablepre'].'shop_single', $data, "single_id='".$id."' and shop_id=$shopid");
        }
        $link = IUrl::creatUrl('single/singlelist');
        $this->success('操作成功',$link);
    }

    public function delsingle()
    {
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('操作失败');
        }
        $uid = IReq::get('id');
        $uid = is_array($uid)?$uid:array($uid);
        $ids = join(',',$uid);
        if(empty($ids))  $this->message('单页ID不能为空');
        $this->mysql->delete(Mysite::$app->config['tablepre'].'shop_single',"single_id in (".$ids.") and shop_id=$shopid");
        $this->success('操作成功');
    }

    public function singlelist()
    {
        $this->checkshoplogin();
        $shopid = ICookie::get('adminshopid');
        if ($shopid <= 0) {
            $this->message('获取失败');
        }
        $pageinfo = new page();
        $pageinfo->setpage(IReq::get('page'));
        $data['list'] = $this->mysql->getarr("SELECT * FROM ".Mysite::$app->config['tablepre']."shop_single WHERE shop_id=$shopid ORDER BY single_id DESC LIMIT ".$pageinfo->startnum().", ".$pageinfo->getsize()." ");
        $shuliang  = $this->mysql->counts("SELECT * FROM ".Mysite::$app->config['tablepre']."shop_single WHERE shop_id=$shopid");
        $pageinfo->setnum($shuliang);
        $data['pagecontent'] = $pageinfo->getpagebar();
        Mysite::$app->setdata($data);
    }

    public function shopsingle()
    {
        $id = IReq::get('id');
        $data['info'] = $this->mysql->select_one('SELECT * FROM '.Mysite::$app->config['tablepre'].'shop_single WHERE single_id='.(int)$id);
        Mysite::$app->setdata($data);
    }

}



?>
