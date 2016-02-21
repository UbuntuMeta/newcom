<?php

/**
 * 公司模型
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model
{

    private $table = "product";
    protected $fields = ''; // 要select出的字段
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取某分类下的商品记录.
     *
     * @param $cat_id
     * @param int $offset
     * @param int $limit
     * @return mixed
     * @author freephp
     */
    public function catProduct($cat_id, $offset = 0, $limit = 5)
    {
        $this->load->model('category_model');

        $cats = $this->category_model->getAll();//取出所有栏目
        $sons = $this->category_model->getCatTree($cats,$cat_id);//取出所有子孙栏目

        $subs = array($cat_id);

        if (!empty($sons)) { // 如果有子孙栏目
            foreach($sons as $v){
                $subs[] = $v['cat_id'];
            }
        }

        $fields = ($this->fields != '') ? $this->fields : 'pro_id,pro_name,pro_img,thumb_img';

        $this->db->select($fields);
        $this->db->where_in('cat_id', $subs);
        $this->db->order_by('pro_id', 'desc');
        $this->db->limit($limit);
        $this->db->offset($offset);

        return $this->db->get($this->table)->result_array();
    }

    /**
     * 获取产品图片信息
     *
     * @return mixed
     * @author freephp
     */
    public function getProductPics()
    {
        $this->fields = 'thumb_img';
        return $this->catProduct(4, 0, 4);
    }
}