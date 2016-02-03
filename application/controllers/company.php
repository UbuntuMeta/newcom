<?php
/**
 * 公司控制器
 *
 * @author tangwen <fightforphp@gmail.com>
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Company extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('com_model');
    }

    /**
     * 公司简介
     *
     * @author tangwen
     */
    public function index()
    {
        $data = [];
        $data['intro'] =$this->_getIntro();

        $this->template->cpView('intro', $data);

    }

    /**
     * 服务项目
     *
     * @author tangwen
     */
    public function servicesList()
    {

    }

    /**
     * 合作伙伴
     *
     * @author tangwen
     */
    public function partners()
    {
        $data = [];

        $data['partner'] = $this->_getPartner();

        $this->template->cpView('partner', $data);

    }

    /**
     * 联系方式
     *
     * @author tangwen
     */
    public function contact()
    {
        $data = [];

        $data['contact'] = $this->com_model->getContact();

        $this->template->cpView('partner', $data);
    }


}