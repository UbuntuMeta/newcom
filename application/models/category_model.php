<?php

/**
 * 广告模型
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model
{

    private $table = "category";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取所有分类记录
     *
     * @return mixed
     * @author freephp
     */
    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    /**
     * 获取分类子孙树
     *
     * @param $arr
     * @param int $id
     * @param int $lev
     * @return array 栏目的子孙树
     * @author freephp
     */
    public function getCatTree($arr,$id = 0,$lev=0) {
        $tree = array();

        foreach($arr as $v) {
            if($v['parent_id'] == $id) {
                $v['lev'] = $lev;
                $tree[] = $v;

                $tree = array_merge($tree,$this->getCatTree($arr,$v['cat_id'],$lev+1));
            }
        }

        return $tree;
    }
}