<?php
/**
 * 公司控制器
 *
 * @author freephp <fightforphp@gmail.com>
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Company extends CI_Controller
{
    protected $data = array(); // 装数据的数组

    public function __construct()
    {
        parent::__construct();
        $this->load->model('com_model');
        /* 配置公共导航数据和页面标识 */
        $this->data['comlist'] = getAllComTitle();
        $this->data['is_news'] = true;
    }

    /**
     * 公司简介
     *
     * @author freephp
     */
    public function index()
    {
        $this->data['intro'] = getIntro();

        $this->template->cpView('intro', $this->data);
    }

    /**
     * 服务项目
     *
     * @author freephp
     */
    public function services()
    {
        $this->data['services'] = getServices();

        $this->template->cpView('service', $this->data);
    }

    /**
     * 合作伙伴
     *
     * @author freephp
     */
    public function partners()
    {
        $this->data['partner'] = $this->_getServices();

        $this->template->cpView('partner', $this->data);
    }

    /**
     * 联系方式
     *
     * @author freephp
     */
    public function contact()
    {
        $this->data['contact'] = $this->_getContact();

        $this->template->cpView('partner', $this->data);
    }

    /**
     * 获取带缓存的联系方式数据
     *
     * @return mixed
     * @author freephp
     */
    private function _getContact()
    {
        if (file_exists('./cache/contact.cache.php')) {
            return include './cache/contact.cache.php';
        } else {
            $data = $this->com_model->getContact();

            $array = var_export($data, true);
            file_put_contents('./cache/contact.cache.php', "<?php return \$data=$array;");

            return $data;
        }
    }

    /**
     * 获取带缓存的服务项目数据
     *
     * @return mixed
     * @author freephp
     */
    private function _getServices()
    {
        if (file_exists('./cache/services.cache.php')) {
            return include './cache/services.cache.php';
        } else {
            $data = $this->com_model->getService();

            $array = var_export($data, true);
            file_put_contents('./cache/services.cache.php', "<?php return \$data=$array;");

            return $data;
        }
    }
}