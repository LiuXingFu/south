<?php
//命名空间
namespace app\index\controller;
//Controller
use think\captcha\Captcha;
use think\Controller;
use app\index\model\testmodel;
//Ucpaas
use think\Request;
use think\Session;

/**
 * 手机短信验证
 * Class Index
 * @package app\index\controller
 */
class Index extends Controller
{

    /**
     * 注册页面
     */
    public function index()
    {
        return $this->fetch('register');
    }

    /**
     * 验证码
     * @param Request $request
     */
    public function ucpaastest(Request $request)
    {
        /*****************************  1  *******************************/
        //初始化必填
        //填写在开发者控制台首页上的Account Sid
        $options['accountsid']='*************************';
        //填写在开发者控制台首页上的Auth Token
        $options['token']='***********************';
        //应用的ID，可在开发者控制台内的短信产品下查看
        $appid = "********************";
        //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
        $templateid = "******";

        /*****************************  2  *******************************/
        trace([1,2,3]);
        $ucpaas = new testmodel($options);

        /*****************************  3  *******************************/
        //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
        trace([1,2]);
        $param = $ucpaas->SendSms_yzm();
        trace([3,4]);
        $mobile = $request->param('yzmtel');
        trace([5,6]);
        Session::set('yzm', $param);
        trace([7,8]);
        $uid = "";
        $ucpaas->SendSms($appid,$templateid,$param,$mobile,$uid);
        trace([9,10]);
    }

    /**
     * 注册
     * @param Request $request
     */
    public function login(Request $request)
    {
        $captcha = new Captcha();
        //用户名
        $username = $request->param('username');
        //密码
        $userpass = $request->param('userpass');
        //captcha验证码
        $code     = $request->param('code');
        //短信验证码
        $yzm      = $request->param('yzm');

        //判断
        if($captcha->check($code)) {
            /********验证短信验证码*********/
            if($yzm == Session::get('yzm')) {
                //短信验证码正确
                $this->success('短信验证码正确');
                trace([$username,$userpass,$code,$yzm]);
            } else {
                //短信验证码错误
                $this->error('短信验证码错误');
            }
        } else {
            //验证码错误
            $this->error('验证码错误');
        }
    }

    public function test(){
        /*****************************  1  *******************************/
        //初始化必填
        //填写在开发者控制台首页上的Account Sid
        $options['accountsid']='b6c89eff18ce4d05f1dbd3e0c707462b';
        //填写在开发者控制台首页上的Auth Token
        $options['token']='1c845c659d47284e1208b53a8e2e8c17';
        //应用的ID，可在开发者控制台内的短信产品下查看
        $appid = "59ca006aebc7454bb52da282cedf44c7";
        //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
        $templateid = "479976";

        /*****************************  2  *******************************/
        $ucpaas = new testmodel($options);


    }
}
