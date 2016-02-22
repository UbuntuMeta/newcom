<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/29
 * Time: 12:19
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Index extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // 判断是否登录
        // if (!getLoginName()) exit('非法访问，你的ip已被记录。');


        // 获取服务器信息
        $data = $this->_getServerInfos();

        $this->template->cpView('admin/index', $data);
    }


    /**
     * 获取网站服务器相关信息.
     *
     * @return array
     *
     * @author freephp
     */
    private function _getServerInfos()
    {
        return [
            'os_version' => php_uname(), // 系统类型
            'server_php_version' => $_SERVER['SERVER_SOFTWARE'], // 服务器和php版本
            'domain' => $_SERVER['HTTP_HOST'], // 网站域名
            'server_port' => $_SERVER['SERVER_PORT'], // 网站请求端口
            'database' => 'MySQL', // 数据库类型
            'server_ip' => getHostByName($_SERVER['SERVER_NAME']) // 网站ip
        ];
    }

}