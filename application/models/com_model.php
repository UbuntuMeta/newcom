<?php

/**
 * 公司模型
 *
 * @link http://www.yungengxin.com
 * @since v1.0
 * @author YunGengxin Dev Team
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Com_Model extends CI_Model
{

    private $table = "company";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取公司简介
     *
     * @return mixed
     * @author tangwen
     */
    public function getIntro()
    {
        return $this->db->get_where($this->table, ['id' => 2])->row_array();
    }

    /**
     * 获取合作伙伴
     *
     * @return mixed
     * @author tangwen
     */
    public function getPartner()
    {
        return $this->db->select('info')->get_where($this->table, ['id' => 4])->row_array();
    }

    /**
     * 获取公司联系方式
     *
     * @return mixed
     * @author tangwen
     */
    public function getContact()
    {
        return $this->db->select('info')->get_where($this->table, ['id' => 3])->row_array();
    }
}