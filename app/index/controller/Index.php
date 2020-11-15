<?php
/**
 * Created by PhpStorm.
 * User: shanren
 * Date: 2020/3/31
 * Time: 10:32
 */

namespace app\index\controller;

use app\BaseController;
use think\facade\View;
use app\index\model\Category;

class Index extends BaseController
{
    //public $i = 0;

    public function index()
    {
        //echo $this->i;
        if (!request()->isPost()) {
            $category=new Category();
            $res=$category->db()->select()->toArray();
//            $category_count=$res.count();
//            View::assign('category_count',$category_count);
            View::assign('categories',$res);

            return View::fetch('public/head') . View::fetch() . View::fetch('public/foot');
        }
        $data = input('post.');
        dump($data);

    }

    /**
     * @return bool
     */
    public function upImage()
    {
        $file = request()->file('file');
        if ($file) {
            $saveName = \think\facade\Filesystem::putFile('', $file);
            if ($saveName) {
                //$data["src"]='/uploads/'.$saveName;
                $data = ["code" => 0, "msg" => "上传成功", "src" => 'http://www.shanren.com'. DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $saveName];
                return json($data);
                //$this->result($data,0,'上传成功');
            } else {
                return false;
            }
        }
    }


}