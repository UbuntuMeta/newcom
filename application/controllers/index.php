<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/29
 * Time: 12:19
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 首页加载资源
     *
     * @author freephp
     */
    public function index()
    {
        $data = array();
        
        $data['adlist'] = $this->_getAds();
        $data['intro'] = getIntro();
        $data['productPics'] = $this->_getProductPics();
        $data['partner'] = getPartner();
        $data['news'] = $this->_getIndexNews();
        $data['jobs'] = $this->_getIndexJobs();

        $this->template->cpView('index', $data);
    }

    /**
     * 发布留言咨询
     *
     * @author freephp
     */
    public function post()
    {
        var_dump($_POST);die();
    }

    /**
     * 获取轮播广告信息.
     * 因为改变不多，且在首页显示，所以加个缓存文件，在修改的时候重新生成该文件。
     *
     * @return mixed
     * @author freephp
     */
    private function _getAds()
    {    if (file_exists('./cache/ads.cache.php')) {
            return include './cache/ads.cache.php';
        } else {
            $this->load->model('ad_model');
            $data = $this->ad_model->getAds();

            $array = var_export($data, true);
            file_put_contents('./cache/ads.cache.php', "<?php return \$data=$array;");

            return $data;
        }
    }


    /**
     * 获取产品图片
     *
     * @return mixed
     * @author freephp
     */
    private function _getProductPics()
    {
        if (file_exists('./cache/producpic.cache.php')) {
            return include './cache/producpic.cache.php';
        } else {
            $this->load->model('product_model');
            $data = $this->product_model->getProductPics();

            $array = var_export($data, true);
            file_put_contents('./cache/producpic.cache.php', "<?php return \$data=$array;");

            return $data;
        }

    }


    /**
     * 获取首页展示行业新闻
     *
     * @return mixed
     * @author freephp
     */
    private function _getIndexNews()
    {
        if (file_exists('./cache/indexnews.cache.php')) {
            return include './cache/indexnews.cache.php';
        } else {
            $this->load->model('news_model');
            $data = $this->news_model->getIndexNews();

            $array = var_export($data, true);
            file_put_contents('./cache/indexnews.cache.php', "<?php return \$data=$array;");

            return $data;
        }
    }

    /**
     * 获取首页展示人力招聘
     *
     * @return mixed
     * @author freephp
     */
    private function _getIndexJobs()
    {
        if (file_exists('./cache/indexjobs.cache.php')) {
            return include './cache/indexjobs.cache.php';
        } else {
            $this->load->model('news_model');
            $data = $this->news_model->getIndexJobs();

            $array = var_export($data, true);
            file_put_contents('./cache/indexjobs.cache.php', "<?php return \$data=$array;");

            return $data;
        }

    }
}