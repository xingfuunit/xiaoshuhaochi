<?php
// dezend by http://www.yunlu99.com/
class method extends baseclass
{

    public function index( )
    {
        $desk = intval( IFilter::act( IReq::get( "desk" ) ) );
        $desk = in_array( $desk, array( 0, 1, 2, 3, 4 ) ) ? $desk : 0;
        $data['desk'] = $desk;
        $areaids = intval( IFilter::act( IReq::get( "areaids" ) ) );
        $data['areaids'] = $areaids;
        $areaid = intval( IFilter::act( IReq::get( "areaid" ) ) );
        $data['areaid'] = $areaid;
        $locationtype = 1;//Mysite::$app->config['locationtype'];
        $data['goodstypedoid'] = array( );
        $attrshop = array( );
        $data['attrinfo'] = array( );
        $where = " where is_goshop = 1 ";
        $tempwhere = array( );
        $templist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0 and is_search =1  order by orderid asc limit 0,1000" );
        foreach ( $templist as $key => $value )
        {
            $value['det'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20" );
            $value['is_now'] = isset( $seardata[$value['id']] ) ? $seardata[$value['id']] : 0;
            $data['attrinfo'][] = $value;
            $doid = intval( IFilter::act( IReq::get( "goodstype_".$value['id'] ) ) );
            if ( 0 < $doid )
            {
                $data['goodstypedoid'][$value['id']] = $doid;
                $tempwhere[] = $doid;
            }
        }

        $personarr = array( "0" => "", "1" => " and a.personcount > 0 and a.personcount < 5 ", "2" => " and a.personcount > 4 and a.personcount < 9 ", "3" => " and a.personcount > 8 and a.personcount < 13 ", "4" => " and a.personcount > 12" );
        $where .= $personarr[$desk];
        if ( 0 < count( $tempwhere ) )
        {
            $where .= " and a.shopid in (select shopid from ".Mysite::$app->config['tablepre']."shopsearch where second_id in(".join( $tempwhere ).")  ) ";
        }
        if ( 0 < $areaids )
        {
            if ( 0 < $areaid )
            {
                $where .= " and a.shopid in (select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$areaid." )";
            }
            else
            {
                $where .= " and a.shopid in (select shopid from ".Mysite::$app->config['tablepre']."areashop where areaid = ".$areaids." )";
            }
        }
        $data['searchgoodstype'] = $templist;
        $data['mainattr'] = array( );
        $templist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = 0 and parent_id = 0 and is_main =1 and type!='input' order by orderid asc limit 0,1000" );
        foreach ( $templist as $key => $value )
        {
            $value['det'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20" );
            $data['mainattr'][] = $value;
        }
        $data['arealist'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."area where parent_id = 0  order by id asc limit 0,1000" );
        $data['areadet'] = array( );
        if ( 0 < $areaids )
        {
            $data['areadet'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."area where parent_id = ".$areaids." order by id asc limit 0,1000" );
        }
        $shopsearch = IFilter::act( IReq::get( "shopsearch" ) );
        $data['shopsearch'] = $shopsearch;
        $list = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."    order by sort asc limit 0,100" );
        $nowhour = date( "H:i:s", time( ) );
        $nowhour = strtotime( $nowhour );
        $templist = array( );
        if ( is_array( $list ) )
        {
            foreach ( $list as $key => $value )
            {
                if ( 0 < $value['id'] )
                {
                    $checkinfo = $this->shopIsopen( $value['is_open'], $value['starttime'], $value['is_orderbefore'], $nowhour );
                    $value['opentype'] = $checkinfo['opentype'];
                    $value['newstartime'] = $checkinfo['newstartime'];
                    $ps = $this->pscost( $value, 10 );
                    $value['pscost'] = $ps['pscost'];
                    $value['attrdet'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shopattr where  cattype = 0 and shopid = '".$value['id']."' " );
                    $tempinfo = array( );
                    foreach ( $value['attrdet'] as $keys => $valx )
                    {
                        $tempinfo[] = $valx['attrid'];
                    }
                    $value['servertype'] = join( ",", $tempinfo );
                    $templist[] = $value;
                }
            }
        }
        $data['shoplist'] = $templist;
        Mysite::$app->setdata( $data );
    }

    public function show( )
    {
        $shop = trim( IFilter::act( IReq::get( "id" ) ) );
        $where = 0 < intval( $shop ) ? " where a.shopid = ".$shop : "where shortname='".$shop."'";
        $shopinfo = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id ".$where."   " );
        if ( empty( $shopinfo ) )
        {
            $link = IUrl::creaturl( "site/index" );
            $this->message( "获取店铺信息失败", $link );
        }
        if ( $shopinfo['endtime'] < time( ) )
        {
            $link = IUrl::creaturl( "site/index" );
            $this->message( "店铺已关门", $link );
        }
        $nowhour = date( "H:i:s", time( ) );
        $nowhour = strtotime( $nowhour );
        $data['shopinfo'] = $shopinfo;
        $data['shopopeninfo'] = $this->shopIsopen( $shopinfo['is_open'], $shopinfo['starttime'], $shopinfo['is_orderbefore'], $nowhour );
        $data['com_goods'] = $this->mysql->getarr( "select *  from ".Mysite::$app->config['tablepre']."goods where shopid = ".$shopinfo['id']." and is_com = 1 and is_goshop=1 " );
        $goodstype = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."goodstype where shopid = ".$shopinfo['id']." and cattype = ".$shopinfo['shoptype']." and is_goshop=1 order by orderid asc" );
        $data['goodstype'] = array( );
        $tempids = array( );
        foreach ( $goodstype as $key => $value )
        {
            $value['det'] = $this->mysql->getarr( "select *  from ".Mysite::$app->config['tablepre']."goods where typeid = ".$value['id']." and shopid=".$shopinfo['id']." and  is_goshop=1" );
            $tempids[] = $value['id'];
            $data['goodstype'][] = $value;
        }
        $data['mainattr'] = array( );
        $templist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where  cattype = ".$shopinfo['shoptype']." and parent_id = 0 and is_main =1  order by orderid asc limit 0,1000" );
        foreach ( $templist as $key => $value )
        {
            $value['det'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shoptype where parent_id = ".$value['id']." order by orderid asc  limit 0,20" );
            $data['mainattr'][] = $value;
        }
        $data['shopattr'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."shopattr  where  cattype = ".$shopinfo['shoptype']." and shopid = '".$shopinfo['id']."'  order by firstattr asc limit 0,1000" );
        $data['goodsattr'] = array( );
        $goodsattr = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."goodssign  where  type = 'goods'  order by id asc limit 0,1000" );
        foreach ( $goodsattr as $key => $value )
        {
            $data['goodsattr'][$value['id']] = $value['imgurl'];
        }
        $data['psinfo'] = $this->pscost( $shopinfo, 1 );
        $sellrule = new sellrule( );
        $sellrule->setdata( $shopinfo['shopid'], 1000, $shopinfo['shoptype'] );
        $ruleinfo = $sellrule->getdata( );
        $data['ruledata'] = array( );
        if (isset($ruleinfo['cxids']) && $ruleinfo['cxids'])
        {
            $data['ruledata'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."rule  where  id in(".$ruleinfo['cxids'].")  order by id asc limit 0,1000" );
        }
        $cximglist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."goodssign  where  type = 'cx'  order by id asc limit 0,1000" );
        $data['ruleimg'] = array( );
        foreach ( $cximglist as $key => $value )
        {
            $data['ruleimg'][$value['id']] = $value['imgurl'];
        }
        $data['cxlist'] = $ruleinfo;
        $data['scoretocost'] = Mysite::$app->config['scoretocost'];
        $data['collect'] = array( );
        if ( !empty( $this->memberinfo ) )
        {
            $data['collect'] = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."collect where collectid=".$shopinfo['id']." and collecttype = 0 and uid=".$this->member['uid']." " );
        }
        $bzinfo = Mysite::$app->config['orderbz'];
        $data['bzlist'] = array( );
        if ( !empty( $bzinfo ) )
        {
            $data['bzlist'] = unserialize( $bzinfo );
        }
        $addresslist = array( );
        if ( 0 < $this->member['uid'] )
        {
            $addresslist = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."address where userid=".$this->member['uid']."  " );
        }
        $data['addresslist'] = $addresslist;
        $data['paylist'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."paylist   order by id desc  " );
        $data['juanlist'] = array( );
        if ( !empty( $this->member['uid'] ) )
        {
            $data['juanlist'] = $this->mysql->getarr( "select * from ".Mysite::$app->config['tablepre']."juan  where uid ='".$this->member['uid']."'  and status = 1 and endtime > ".time( )."  order by id desc limit 0,20" );
        }
        Mysite::$app->setdata( $data );
    }

    public function makeorder( )
    {
        $subtype = intval( IReq::get( "subtype" ) );

        $info['shopid'] = intval( IReq::get( "shopid" ) );

        $info['remark'] = IFilter::act( IReq::get( "content" ) );
        $info['paytype'] = IFilter::act( IReq::get( "paytype" ) );
        $info['username'] = IFilter::act( IReq::get( "contactname" ) );
        $info['mobile'] = IFilter::act( IReq::get( "phone" ) );
        $info['addressdet'] = IFilter::act( IReq::get( "addressdet" ) );
        $info['senddate'] = IFilter::act( IReq::get( "senddate" ) );
        $info['minit'] = IFilter::act( IReq::get( "orderTime" ) );
        $info['juanid'] = intval( IReq::get( "juanid" ) );
        $info['ordertype'] = 1;
        $peopleNum = IFilter::act( IReq::get( "personcount" ) );
        $info['othercontent'] = empty( $peopleNum ) ? "" : serialize( array(
            "人数" => $peopleNum
        ) );
        $info['userid'] = !isset( $this->member['score'] ) ? "0" : $this->member['uid'];
        if ( Mysite::$app->config['allowedguestbuy'] != 1 && $info['userid'] == 0 )
        {
            $this->message( "member_nologin" );
        }
        $shopinfo = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."shopfast as a left join ".Mysite::$app->config['tablepre']."shop as b  on a.shopid = b.id where a.shopid = '".$info['shopid']."'    " );
        if ( empty( $shopinfo ) )
        {
            $this->message( "店铺不存在" );
        }
        $checksend = Mysite::$app->config['ordercheckphone'];
        if ( $checksend == 1 && empty( $this->member['uid'] ) )
        {
            $checkphone = $this->mysql->select_one( "select * from ".Mysite::$app->config['tablepre']."mobile where phone ='".$info['mobile']."'   order by addtime desc limit 0,50" );
            if ( empty( $checkphone ) )
            {
                $this->message( "member_emailyan" );
            }
            if ( empty( $checkphone['is_send'] ) )
            {
                $mycode = IFilter::act( IReq::get( "phonecode" ) );
                if ( $mycode == $checkphone['code'] )
                {
                    $this->mysql->update( Mysite::$app->config['tablepre']."mobile", array( "is_send" => 1 ), "phone='".$info['mobile']."'" );
                }
                else
                {
                    $this->message( "member_emailyan" );
                }
            }
        }
        if ( empty( $info['username'] ) )
        {
            $this->message( "emptycontact" );
        }
        if ( !IValidate::suremobi( $info['mobile'] ) )
        {
            $this->message( "errphone" );
        }
        $info['ipaddress'] = "";
        $ip_l = new iplocation( );
        $ipaddress = $ip_l->getaddress( $ip_l->getIP( ) );
        if ( isset( $ipaddress['area1'] ) )
        {
            $info['ipaddress'] = $ipaddress['ip'].mb_convert_encoding( $ipaddress['area1'], "UTF-8", "GB2312" );
        }
        $info['cattype'] = 0;
        $senddate = $info['senddate'];
        $minit = $info['minit'];
        $nowpost = strtotime( $senddate." ".$minit.":00" );
        $settime = time( ) - 600;
        if ( $nowpost < $settime )
        {
            $this->message( "提交配送时间和服务器时间相差超过10分钟下单失败" );
        }
        $temp = strtotime( $minit.":00" );
        $is_orderbefore = $shopinfo['is_orderbefore'] == 0 ? 0 : $shopinfo['befortime'];
        $tempinfo = $this->checkshopopentime( $is_orderbefore, $nowpost, $shopinfo['starttime'] );
        if ( !$tempinfo )
        {
            $this->message( "配送时间不在有效配送时间范围" );
        }
        if ( $shopinfo['is_open'] != 1 )
        {
            $this->message( "店铺暂停营业" );
        }
        $info['paytype'] = $info['paytype'] == 1 ? 1 : 0;
        $info['areaids'] = "";
        $info['shopinfo'] = $shopinfo;
        if ( $subtype == 1 )
        {
            $info['allcost'] = 0;
            $info['bagcost'] = 0;
            $info['allcount'] = 0;
            $info['goodslist'] = array( );
        }
        else
        {
            if ( empty( $info['shopid'] ) )
            {
                $this->message( "shop_noexit" );
            }
            $Cart = new smCart( );
            $Cart->cartName = 'platesmcart';
            $carinfo = $Cart->getMyCart( );

            if ( !isset( $carinfo['list'][$info['shopid']]['data'] ) )
            {
                $this->message( "shop_emptycart" );
            }
            $info['allcost'] = $carinfo['list'][$info['shopid']]['sum'];
            $info['goodslist'] = $carinfo['list'][$info['shopid']]['data'];
            $info['bagcost'] = 0;
            $info['allcount'] = 0;
        }
        $info['shopps'] = 0;
        $info['pstype'] = 0;
        $info['cattype'] = 1;
        $info['is_goshop'] = 1;
        $info['subtype'] = $subtype;
        $info['sendtime'] = $nowpost;
        $orderclass = new orderclass($this->mysql);
        $orderclass->orderyuding( $info );
        $orderid = $orderclass->getorder( );
        if ( $info['userid'] == 0 )
        {
            ICookie::set( "orderid", $orderid, 86400 );
        }
        if ( $subtype == 2 )
        {
            $Cart->delshop( $info['shopid'] );
        }
        $this->success( $orderid );
        exit( );
    }

    public static function checkshopopentime( $is_orderbefore, $posttime, $starttime )
    {
        $maxnowdaytime = strtotime( date( "Y-m-d", time( ) ) );
        $daynottime = 86399;
        $findpostime = FALSE;
        $i = 0;
        for ( ; $i <= $is_orderbefore; ++$i )
        {
            if ( !$findpostime )
            {
                $miniday = $maxnowdaytime + $daynottime * $i;
                $maxday = $miniday + $daynottime;
                $tempinfo = explode( "|", $starttime );
                foreach ( $tempinfo as $key => $value )
                {
                    if ( empty( $value ) )
                    {
                        continue;
                    }
                    $temp2 = explode( "-", $value );
                    if ( !( 1 < count( $temp2 ) ) )
                    {
                        continue;
                    }
                    $minbijiaotime = date( "Y-m-d", $miniday );
                    $minbijiaotime = strtotime( $minbijiaotime." ".$temp2[0].":00" );
                    $maxbijiaotime = date( "Y-m-d", $maxday );
                    $maxbijiaotime = strtotime( $maxbijiaotime." ".$temp2[1].":00" );
                    if ( !( $minbijiaotime < $posttime ) && !( $posttime < $maxbijiaotime ) )
                    {
                        continue;
                    }
                    $findpostime = TRUE;
                    break;
                }
            }
        }
        return $findpostime;
    }

}

?>
