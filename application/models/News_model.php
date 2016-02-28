<?php

/**
 * 新闻模型
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Class News_Model
 */
class News_model extends CI_Model
{

    /**
     * 表名
     *
     * @var string
     */
    private $table = "news";

    /**
     * 查询字段
     *
     * @var string
     */
    private $fields = '';

    /**
     * 限制条数
     *
     * @var int
     */
    private $limit = 5;

    /**
     * 开始脚标
     *
     * @var int
     */
    private $offset = 0;

    /**
     * News_Model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 获取资讯（目前是行业新闻和人力招聘两种）
     *
     * @param array $params
     * @param bool $isCount
     * @return array
     * @author freephp
     */
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

    /**
     * 公共sql执行函数
     *
     * @return mixed
     * @author freephp
     */
    private function _commonQuery() {
        $fields = ($this->fields) ? $this->fields : '*';

        $this->db->select($fields);
        $this->db->limit($this->limit);
        $this->db->offset($this->offset);

        $result = $this->db->get($this->table)->result_array();

        return $result;
    }

    /**
     * 组装查询条件
     *
     * @param array $params
     * @author freephp
     */
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

    /**
     * 获取首页行业新闻数据
     *
     * @return mixed
     * @author freephp
     */
    public function getIndexNews()
    {
        $params = ['type' => '行业新闻'];

        $this->_buildWhere($params);

        return $this->_commonQuery();
    }

    /**
     * 获取首页人才招聘数据
     *
     * @return mixed
     * @author freephp
     */
    public function getIndexJobs()
    {
        $params = ['type' => '人才招聘'];

        $this->_buildWhere($params);

        return $this->_commonQuery();
    }

    /**
     * 获取所有资讯类型
     *
     * @return mixed
     * @author freephp
     */
    public function getAllTypeInfo()
    {
        // todo 日后肯定要分成两个表，一个文章分类表，一个文章详情表。
        // 目前只能写死
        $this->db->select('news_id, distinct type');

        return $this->db->get($this->table)->result_array();

    }


/**
 * @param  int $id 新闻主键
 * @return [type]
 */
    public function getNewsById($id)
    {
        if ($id < 0) return array();

        $this->db->get($this->table)->where('news_id', $id)->row_array();
    }

}