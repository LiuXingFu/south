<?php
//命名空间
namespace app\index\controller;
//Controller
use think\Controller;
use think\Request;

/**
 * 支付功能
 * Class Pay
 * @package app\index\controller
 */
class Pay extends Controller
{
    /**
     * 支付首页
     */
    public function pay()
    {
        return $this->fetch();
    }

    public function order(Request $request)
    {
        //获取：金额，名称，支付方式
        $price = $request->param('price');
        $user = $request->param('user');
        $type = $request->param('type');
    }
}
