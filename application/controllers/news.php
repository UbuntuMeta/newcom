<?php
/**
 * 资讯控制器
 *
 * @author freephp <fightforphp@gmail.com>
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function newsList()
    {

    }

    public function jobsList()
    {

    }


    protected function _getNewsTypes()
    {
        $this->news_model->getAllType();
    }
}
