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

    public function __construct()
    {
        parent::__construct();
        $this->load->model('com_model');
    }

    /**
     * 公司简介
     *
     * @author freephp
     */
    public function index()
    {
        $data = [];

        $data['intro'] = getIntro();

        $data['comlist'] = getAllComTitle();

        $data['is_news'] = true;

        $this->template->cpView('intro', $data);

    }

    /**
     * 服务项目
     *
     * @author freephp
     */
    public function services()
    {

        $data = [];

        $data['services'] = getServices();
        $data['is_news'] = true;

        $this->template->cpView('service', $data);
    }

    /**
     * 合作伙伴
     *
     * @author freephp
     */
    public function partners()
    {
        $data = [];

        $data['partner'] = getPartner();
        $data['comlist'] = getAllComTitle();
        $data['is_news'] = true;

        $this->template->cpView('partner', $data);

    }

    /**
     * 联系方式
     *
     * @author freephp
     */
    public function contact()
    {
        $data = [];

        $data['contact'] = $this->_getContact();

        $this->template->cpView('partner', $data);
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