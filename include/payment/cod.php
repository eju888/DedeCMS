<?php if (!defined('DEDEINC')) {exit("DedeCMS Error: Request Error!");
}
/**
 * 货到付款支付接口
 */

/**
 * 基本接口类
 */
class Cod
{
    /**
     * 构造函数
     *
     * @access public
     * @param
     *
     * @return void
     */
    public function Cod()
    {
    
    }

    public function __construct()
    {
        $this->Cod();
    
    }

    /**
     * 设置回送地址
     */

    public function SetReturnUrl($returnurl = '')
    {
        return "";
    
    }

    /**
     * 获取代码
     */
    public function GetCode($order)
    {
        include_once DEDEINC . '/shopcar.class.php';
        $cart = new MemberShops();
        $cart->clearItem();
        $cart->MakeOrders();
        $button = "您可以 <a href='/'>返回首页</a> 或去 <a href='../member/shops_products.php?oid=" . $order . "'>查看订单</a>";
        return $button;
    
    }


} //End API
