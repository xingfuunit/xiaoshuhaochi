<?php
class method extends baseclass
{
    public function closeorderlist()
    {
        //查询下单时间大于15分钟的订单
        $time = time() - 900;
        $sql = "SELECT * FROM ".Mysite::$app->config['tablepre']."order WHERE status < 2 and paystatus = 0 AND addtime <".$time;
        $order_list = $this->mysql->getarr($sql);
        if (! empty($order_list)) {
            foreach ($order_list as $orderinfo) {
                $orderdata['status'] = 18;//支付超时
                $this->mysql->update(Mysite::$app->config['tablepre'].'order',$orderdata,"id='".$orderinfo['id']."'");
                //还库存
                $ordetinfo = $this->mysql->getarr("select ort.goodscount,go.id,go.sellcount,go.count as stroe from ".Mysite::$app->config['tablepre']."orderdet as ort left join  ".Mysite::$app->config['tablepre']."goods as go on go.id = ort.goodsid   where ort.order_id='".$orderinfo['id']."' and  go.id > 0 ");
                $day = strtotime(date('Y-m-d',$orderinfo['posttime']));
                foreach($ordetinfo as $key=>$value){
                    //$newdata['count'] = $value['stroe']+  $value['goodscount'];
                    $newdata['sellcount'] = $value['sellcount'] - $value['goodscount'];
                    //modified by pinkky
                    $this->mysql->update(Mysite::$app->config['tablepre']."goods",$newdata,"id='".$value['id']."'");

                    $this->mysql->update(Mysite::$app->config['tablepre']."daystock", '`stock`=`stock`-'.$value['goodscount'], "goods_id=".$value['id']." and day=".$day);
                }
            }
        }
        exit;
    }

    /*private function closeorder($orderinfo)
    {
        $orderdata['status'] = 18;//支付超时
        $this->mysql->update(Mysite::$app->config['tablepre'].'order',$orderdata,"id='".$id."'");
        //还库存
        $ordetinfo = $this->mysql->getarr("select ort.goodscount,go.id,go.sellcount,go.count as stroe from ".Mysite::$app->config['tablepre']."orderdet as ort left join  ".Mysite::$app->config['tablepre']."goods as go on go.id = ort.goodsid   where ort.order_id='".$orderinfo['id']."' and  go.id > 0 ");
        $day = strtotime(date('Y-m-d',$orderinfo['posttime']));
        foreach($ordetinfo as $key=>$value){
            //$newdata['count'] = $value['stroe']+  $value['goodscount'];
            $newdata['sellcount'] = $value['sellcount'] - $value['goodscount'];
            //modified by pinkky
            $this->mysql->update(Mysite::$app->config['tablepre']."goods",$newdata,"id='".$value['id']."'");

            $this->mysql->update(Mysite::$app->config['tablepre']."daystock", '`stock`=`stock`-'.$value['goodscount'], "goods_id=".$value['id']." and day=".$day);
        }
        exit;
    }*/
}
?>
