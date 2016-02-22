<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/2
 * Time: 20:49
 */

class Common_Controller extends  CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * 获取公司简介.
     *
     * @return mixed
     * @author freephp
     */
    protected function _getIntro()
    {
        if (file_exists('./cache/intro.cache.php')) {
            return include './cache/intro.cache.php';
        } else {
            $this->load->model('com_model');
            $data = $this->com_model->getIntro();

            $array = var_export($data, true);
            file_put_contents('./cache/intro.cache.php', "<?php return \$data=$array;");

            return $data;
        }
    }

    /**
     * 获取合作商.
     *
     * @return mixed
     * @author freephp
     */
    protected function _getPartner()
    {
        if (file_exists('./cache/partners.cache.php')) {
            return include './cache/partners.cache.php';
        } else {
            $this->load->model('com_model');
            $data = $this->com_model->getPartner();

            $array = var_export($data, true);
            file_put_contents('./cache/partners.cache.php', "<?php return \$data=$array;");

            return $data;
        }

    }
}