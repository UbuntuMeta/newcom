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
    protected $data = array();

    /**
     *  初始化
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->data['is_news'] = true;
    }
 
   /**
    * 行业新闻列表
    * 
    * @return void
    */
    public function index()
    {
        $data['newsList'] = $this->news_model->getNews(array('type' => '行业新闻'));

        $this->template->cpView('intro', $this->data);

    }

    public function details($id='')
    {
        var_dump($id);die();
    }

    /**
    * 人才招聘列表
    * 
    * @return void
    */
    public function jobs()
    {
        $data['newsList'] = $this->news_model->getNews(array('type' => '人才招聘'));

        $this->template->cpView('jobList', $this->data);
    }

    /**
     *  获取所有新闻类型
     * 
     * @return array
     */
    protected function _getNewsTypes()
    {
        $this->news_model->getAllType();
    }
}
