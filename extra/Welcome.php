<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getList()
    {
        $str = '[{"firstName":"Bill","lastName":"Gates"},{"firstName":"George","lastName":"Bush"},{"firstName":"Thomas","lastName":"Carter"}]';
        $users = json_decode($str, 1);
        $ret = array('items' => $users);
        $ret['info'] = $_SERVER;
        $ret['get'] = $_GET;
        $ret['post'] = $_POST;
        die(json_encode($ret));
    }

    public function getArticleList()
    {
        $array = array("春",
            "济南的冬天",
            "雨的四季",
            "古代诗歌四首 观沧海 闻王昌龄左迁龙标遥有此寄 次北固山下 天净沙·秋思",
            "秋天的怀念",
            "散步",
            "散文诗两首（金色花、荷叶母亲）",
            "《世说新语》两则（咏雪、陈太丘与友期）",
            "从百草园到三味书屋",
            "再塑生命的人",
            "窃读记",
            "《论语》十二章",
            "纪念白求恩",
            "植树的牧羊人",
            "走一步，再走一步",
            "诫子书",
            "猫",
            "鸟",
            "动物笑谈",
            "狼",
            "皇帝的新装",
            "诗两首",
            "女娲造人",
            "寓言四则");

        $ret = array('items' => $array);
        die(json_encode($ret));

    }

    public function getArticle($id)
    {
        $array = array("春",
            "济南的冬天",
            "雨的四季",
            "古代诗歌四首 观沧海 闻王昌龄左迁龙标遥有此寄 次北固山下 天净沙·秋思",
            "秋天的怀念",
            "散步",
            "散文诗两首（金色花、荷叶母亲）",
            "《世说新语》两则（咏雪、陈太丘与友期）",
            "从百草园到三味书屋",
            "再塑生命的人",
            "窃读记",
            "《论语》十二章",
            "纪念白求恩",
            "植树的牧羊人",
            "走一步，再走一步",
            "诫子书",
            "猫",
            "鸟",
            "动物笑谈",
            "狼",
            "皇帝的新装",
            "诗两首",
            "女娲造人",
            "寓言四则");
        $ret = array('title' => sprintf('七年级语文 第%d课 %s', $id + 1, $array[$id]), 'content' =>  $array[$id] . '的内容安安静静春开六九头');
        die(json_encode($ret));

    }
}
