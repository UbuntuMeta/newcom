<?php

/**
 * 返回json数据
 *
 * @param int $status 状态编号
 * @param string $msg 返回消息
 * @return bool  禁用true，未禁用false
 */
function response($status = 0, $msg = '', $tips = array()) {
    $responseArray = array('status' => $status, 'msg' => $msg, 'tips' => $tips);
    exit(json_encode($responseArray));
}

/**
 * 通过制定键值$key重组二维数组
 *
 * @param array $currentArray 原数组
 * @param string $key 键值$key
 * @return array
 */
function buildArray($currentArray, $key) {
    $tempArray = array();
    foreach ($currentArray as $v) {
        $tempArray[$v[$key]] = $v;
    }
    return $tempArray;
}

/**
 * 获取登录ID
 *
 * @return int
 */
function getLoginID() {
    return isset($_SESSION['users']['id']) ? $_SESSION['users']['id'] : '';
}

/**
 * 获取登录名称
 *
 * @return string
 */
function getLoginName() {
    return isset($_SESSION['users']['user_name']) ? $_SESSION['users']['user_name'] : '';
}

/**
 * 获取真实名称
 *
 * @return string
 */
function getLoginTrueName() {
    return isset($_SESSION['users']['true_name']) ? $_SESSION['users']['true_name'] : '';
}
/**
 * 是否是POST请求
 *
 * @return boolean
 */
function isPost() {
    return (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') ? true : false;
}


/**
 * 跳转到URL
 *
 * @return void
 */
function redirect($url) {
    header('Location: ' . $url);
    exit;
}

/**
 * 截取字符串（支持utf8）
 *
 * @param string $string 原字符串
 * @param int $start 开始位置
 * @param int $length 截取的长度
 * @param string $suffix 后辍
 * @return string
 */
function subStrToUtf8($string, $start = 0, $length = 10, $suffix = '...') {
    if (mb_strlen($string) > $length) {
        return mb_substr($string, $start, $length) . $suffix;
    }
    return $string;
}

/**
 * 检查手机号码格式
 *
 * @param string $mobile 电话号码
 * @return bool
 */
function checkMobile($mobile) {
    return preg_match('/^1[3|5|8]{1}[0-9]{9}$/', $mobile);
}

/**
 * 检查邮箱格式
 *
 * @param $email
 * @return bool
 * @author tangwen
 */
function checkEmail($email) {
    return (mb_eregi("^([_a-z0-9-]+)(.[_a-z0-9-]+)*@([a-z0-9-]+)(.[a-z0-9-]+)*(.[a-z]{2,4})$",$email)) ? true : false;
}

/**
 * 获取32位的唯一串
 *
 * @return string
 */
function uuid() {
    return md5(uniqid(mt_rand(), true) . uniqid(mt_rand(), true) . uniqid(mt_rand(), true) . mt_rand());
}

/**
 * 判断某个查询条件存在且非空，如果是则返回true,反之为false.
 *
 * @param $param
 * @return bool
 *
 * @author tangwen
 */
function existParam($param) {
    if (isset($param) && !$param) {
        return true;
    } else {
        return false;
    }
}

/**
 * 分页参数处理
 * @param unknown $page
 * @param unknown $pagesize
 * @param unknown $count
 */
function page_param_handle(&$page,$pagesize,$count){
    $countPage = ceil($count/$pagesize);
    $page = $page > $countPage ? $countPage : $page;
    $page  = $page < 1 ? 1 : $page;
}


/**
 * 获取公司简介.
 *
 * @return mixed
 * @author tangwen
 */
function getIntro() {

    if (file_exists('./cache/intro.cache.php')) {
        return include './cache/intro.cache.php';
    } else {
        $ci = & get_instance();
        $ci->load->model('com_model');
        $data = $ci->com_model->getIntro();

        $array = var_export($data, true);
        file_put_contents('./cache/intro.cache.php', "<?php return \$data=$array;");

        return $data;
    }
}

/**
 * 获取合作商.
 *
 * @return mixed
 * @author tangwen
 */
function getPartner() {
    if (file_exists('./cache/partners.cache.php')) {
        return include './cache/partners.cache.php';
    } else {
        $ci = & get_instance();
        $ci->load->model('com_model');
        $data = $ci->com_model->getPartner();

        $array = var_export($data, true);
        file_put_contents('./cache/partners.cache.php', "<?php return \$data=$array;");

        return $data;
    }

}

/**
 * 获取所有的
 *
 * @return mixed
 * @author tangwen
 */
function getAllComTitle() {
    if (file_exists('./cache/com_title.cache.php')) {
        return include './cache/com_title.cache.php';
    } else {
        $ci = & get_instance();
        $ci->load->model('com_model');
        $data = $ci->com_model->getPartner();

        $array = var_export($data, true);
        file_put_contents('./cache/com_title.cache.php', "<?php return \$data=$array;");

        return $data;
    }
}