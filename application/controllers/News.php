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

    /**
     * 行业新闻详情页面
     * @param  string $id 文章ID
     * @return void
     */
    public function article($id = '')
    {
        $data['record'] = $this->news_model->getNewsByID($id);
        $this->template->cpView('article', $this->data);
    }

    /**
     * 人力招聘详情页面
     * @param  string $id 招聘信息ID
     * @return void
     */
    public function job($id = '')
    {
        $data['record'] = $this->news_model->getNewsByID($id);
        $this->template->cpView('jobList', $this->data);
    }

    /**
    * 人才招聘列表
    * 
    * @return void
    */
    public function jobsList()
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
        return $this->news_model->getAllType();
    }
}
