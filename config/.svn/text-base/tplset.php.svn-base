<?php return array (
  'emailfindtpl' => '<div width="200px;">重置密码,请点链接 "{$findpwdurl}">此连接来重置您的密码</a></div>

     <div width="200px;">如上面连接不能打开,请复制以下连接到浏览器重置您的密码

     <div width="280px;padding-left:50px;">{$findpwdurl}</div>',
  'shopphonetpl' => '【外卖人】{$orderinfo[\'buyername\']}订单总价：{$orderinfo[\'allcost\']}元{if $orderinfo[\'paystatus\'] == 0}(未付){else}(已付){/if}.订单名细：{foreach from=$orderdet item=items}{$items[\'goodsname\']}{$items[\'goodscount\']}份,{/foreach}.联系电话：{$orderinfo[\'buyerphone\']}.联系地址：{$orderinfo[\'buyeraddress\']}.备注:{$orderinfo[\'content\']}',
  'userbuytpl' => '{$orderinfo[\'buyername\']}在{$sitename}于{$orderinfo[\'addtime\']|date_format:"%Y-%m-%d %H:%M:%S"}下单成功,订单总价：{$orderinfo[\'allcost\']}元,订单编号{$orderinfo[\'dno\']}，配送时间：{$orderinfo[\'posttime\']|date_format:"%Y-%m-%d %H:%M:%S"}',
  'emailorder' => '<table align="center" width="100%"><tbody><tr> <td colspan="2" align="center"><h1><strong>{$sitename}订单信息</strong></h1><hr></td></tr> 
<tr><td width="100"><strong>订单编号：</strong></td><td>{$orderinfo[\'dno\']}</td></tr><tr><td><strong>店铺名称：</strong></td><td>{$orderinfo[\'shopname\']}</td></tr> 
<tr><td><strong>联系姓名：</strong></td><td>{$orderinfo[\'buyername\']}</td></tr><tr><td><strong>联系电话：</strong></td><td>{$orderinfo[\'buyerphone\']}</td></tr> 
<tr><td valign="top"><strong>配送地址：</strong></td><td>{$orderinfo[\'buyeraddress\']}</td></tr><tr><td><strong>下单时间：</strong></td><td>{$orderinfo[\'addtime\']|date_format:"%Y-%m-%d %H:%M:%S"}</td></tr> 
{foreach from=$orderdet key=mykey item=items}
     <tr><td>{if $mykey==0}<strong> 订单详情：</strong>{/if}</td><td>{$items[\'goodsname\']}{if $items[\'is_send\'] == 1}<font color=red>赠品</font>{/if}{if $items[\'shopid\'] == 0}<font color=blue>商城</font>{/if},{$items[\'goodscount\']}份{$items[\'goodscost\']}元/份</td></tr>
{/foreach} 
 <tr><td valign="top"><strong>备注：</strong></td><td>{$orderinfo[\'content\']}</td></tr>
 <tr><td valign="top"><strong>配送时间：</strong></td><td>{$orderinfo[\'posttime\']|date_format:"%Y-%m-%d %H:%M:%S"}</td></tr>  
<tr><td><strong>总金额：</strong></td><td><span class="price">{$orderinfo[\'allcost\']}元</span>{if $orderinfo[\'paystatus\'] == 1} 已付款{else}未付款{/if}</td></tr>
<tr><td><strong>操作：</strong></td><td><a href="{$surelink}"><span style="3px 5px 3px 5px;backgroud:#f60;color:#fff;">确认制作</span></a>      <a href="{$closelink}"><span style="">取消制作</span></a></td></tr>
</tbody></table>',
  'phoneunorder' => '{$dno}订单取消,原因{$reason},取消时间{time()|date_format:"%Y-%m-%d %H:%M:%S"}',
  'usercodetpl' => '验证码{$code},【外卖人】',
  'wxshoptpl' => '{$sitename}微信通知 \\n 下单人：{$orderinfo[\'buyername\']} \\n 地址: \\n {$orderinfo[\'buyeraddress\']} \\n 电话：{$orderinfo[\'buyerphone\']} \\n  下单时间：\\n {$orderinfo[\'addtime\']|date_format:"%Y-%m-%d %H:%M:%S"} \\n 配送时间: \\n  {$orderinfo[\'posttime\']|date_format:"%Y-%m-%d %H:%M:%S"} \\n 订单总价：{$orderinfo[\'allcost\']}元 \\n 订单详情：\\n {foreach from=$orderdet item=items}{$items[\'goodsname\']}{if $items[\'is_send\'] == 1}[赠品]{/if}{if $items[\'shopid\'] == 0}[商城]{/if},{$items[\'goodscount\']}份{$items[\'goodscost\']}元/份 \\n {/foreach}',
  'noticemake' => '{$dno}订单商家确认制作，请耐心等待',
  'noticesend' => '“{$shopname}”的外卖员正火速赶来送餐。在此【外卖人】祝您用餐愉快！',
  'noticeunmake' => '您在【外卖人】的订单{$dno}，由于“{$shopname}”太忙，来不及制作。请选其他餐厅，给您带来不便敬请谅解',
  'noticeunback' => '退款',
)?>