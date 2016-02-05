<?php

/**
 * 新闻模型
 *
 * @link http://www.yungengxin.com
 * @since v1.0
 * @author YunGengxin Dev Team
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_Model extends CI_Model
{

    private $table = "news";

    private $fields = '';

    private $limit = 5;

    private $offset = 0;

    public function __construct()
    {
        parent::__construct();
    }


    public function getNews(array $params, $isCount = FALSE)
    {
        $this->_buildWhere($params);

        $this->limit = (existParam($params['limit'])) ? $params['limit'] : 1;
        $page = (existParam($params['page'])) ? $params['page'] : 1;
        $offset = ($page - 1) * $this->limit;
        $this->offset = $offset >= 0 ? $offset : 0;
        if ($isCount) {
            $db = clone $this->db;
            $count = $db->count_all_results("$this->table");
            page_param_handle($page,$this->limit,$count);
            $this->offset = ($page - 1) * $this->limit;
        }

       $result = $this->_commonQuery();

        return $isCount ? ['count'=>$count,'data'=>$result] : $result;

    }

    private function _commonQuery() {
        $fields = ($this->fields) ? $this->fields : '*';

        $this->db->select($fields);
        $this->db->limit($this->limit);
        $this->db->offset($this->offset);

        $result = $this->db->get($this->table)->result_array();

        return $result;
    }

    private function _buildWhere(array $params)
    {
        if (isset($params['news_id']) && !$params['news_id']) {
            $this->db->where(['news_id' => $params['news_id']]);

        }
        if (isset($params['news_title']) && !$params['news_title']) {
            $this->db->like(['news_title' => $params['news_title']]);
        }
        if (isset($params['type']) && !$params['type']) {
            $this->db->where(['type' => $params['type']]);
        }

    }

    public function getIndexNews()
    {
        $params = ['type' => '行业新闻'];

        $this->_buildWhere($params);

        return $this->_commonQuery();
    }

    public function getIndexJobs()
    {
        $params = ['type' => '人才招聘'];

        $this->_buildWhere($params);

        return $this->_commonQuery();
    }

    public function getTypeInfo()
    {
        // todo 日后肯定要分成两个表，一个文章分类表，一个文章详情表。
        // 目前只能写死

    }

}