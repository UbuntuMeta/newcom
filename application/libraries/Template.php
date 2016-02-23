<?php

class Template {

    private $js = array();
    private $css = array();

    /**
     * 导入javascript脚本文件
     *
     * @param string $file
     * @return void
     */
    function importJavascript($file) {
        if (is_string($file))
            $this->js[] = $file;
        if (is_array($file))
            $this->js = array_merge($file, $this->js);
    }

    /**
     * 导入css文件
     *
     * @param string $file
     * @return void
     */
    function importCss($file) {
        if (is_string($file))
            $this->css[] = $file;
        if (is_array($file))
            $this->css = array_merge($file, $this->css);
    }

    /**
     * 404页面
     *
     * @param string $msg 提示消息
     * @param string $link 跳转连接
     * @return void
     */
    public function error404($msg = "", $link = "") {
        $link = !empty($link) ? $link : (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
        $ci = & get_instance();
        $content = $ci->load->view('404', array('msg' => $msg, 'link' => $link), true);
        print $content;
        exit;
    }

    /**
 * 带头部、脚部的前台视图
 *
 * @return mixed
 */
    function cpView($view, $vars = array(), $return = false) {
        $this->js = array_unique($this->js);
        $this->css = array_unique($this->css);

        //加载Loader核心类
        $loader = & load_class('Loader', 'core');

        //组装试图
        /**
        * 因为公司相关页面的wrap的css不同，所以这里单独判断。
        * 如果有设置is_news键,则为公司信息相关页面。
        **/
        $is_news = false;
        $nav = '';

        if (isset($vars['is_news'])) {
            $is_news = true;
            $nav = $loader->view('comnav', array('comlist' => $vars['comlist']), true);
        }

        $header = $loader->view('header', array('is_news' => $is_news, 'js' => $this->js, 'css' => $this->css, 'title' => (isset($vars['title']) ? $vars['title'] : "")), true);
        $content = $nav . $loader->view($view, $vars, true);
        $footer = $loader->view('footer', array(), true);

        if ($return)
            return $header .  $content . $footer;
        else
            print $header . $content . $footer;
    }

    /**
     * 带头部、脚部的后台视图
     *
     * @return mixed
     */
    function cpAdminView($view, $vars = array(), $return = false) {
        $this->js = array_unique($this->js);
        $this->css = array_unique($this->css);
        $module = (isset($vars['module']) && !empty($vars['module'])) ? $vars['module'] : 'user';
        $menu = (isset($vars['menu']) && !empty($vars['menu'])) ? $vars['menu'] : 'index';

        //加载Loader核心类
        $loader = & load_class('Loader', 'core');

        //组装试图
        $header = $loader->view('header', array('js' => $this->js, 'css' => $this->css, 'title' => (isset($vars['title']) ? $vars['title'] : "")), true);
        $left = $loader->view('left', array('module' => $module, 'menu' => $menu), true);
        $content = $loader->view($view, $vars, true);
        $footer = $loader->view('footer', array(), true);

        if ($return)
            return $header . $left . $content . $footer;
        else
            print $header . $left . $content . $footer;
    }
}