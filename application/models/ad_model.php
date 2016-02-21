<?php

/**
 * 广告模型
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad_model extends CI_Model
{

    private $table = "ad";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取首页轮播广告数据 (所有)
     *
     * @return mixed
     * @author freephp
     */
    public function getAds()
    {
        return $this->db->get($this->table)->result_array();
    }
}