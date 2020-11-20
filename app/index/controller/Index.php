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
use think\facade\Request;
use app\index\model\Company;
use app\index\model\Category;
use app\index\model\Material;
use app\index\model\Craft;
use app\index\model\Installer;
use app\index\model\Order;


class Index extends BaseController
{
    //public $i = 0;

    public function index()
    {
        //echo $this->i;
        if (!request()->isPost()) {
            $company=new Company();
            $category=new Category();

            $craft=new Craft();
            $installer=new Installer();
            $order=new Order();

            $company_res=$company->db()->select()->toArray();
            $category_res=$category->db()->select()->toArray();

            $craft_res=$craft->db()->select()->toArray();
            $installer_res=$installer->db()->select()->toArray();
            $order_res=$order->db()->select()->toArray();
//            $category_count=$category_res.count();
//            View::assign('category_count',$category_count);

            View::assign('categories',$category_res);
            View::assign('company',$company_res);
            //View::assign('material',$material_res);
            View::assign('craft',$craft_res);
            View::assign('installer',$installer_res);
            View::assign('order',$order_res);

            return View::fetch('public/head') . View::fetch() . View::fetch('public/foot');
        }
        //$data = input('post.');
        //dump($data);

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


    public  function material()
    {
        $material=new Material();
        $categoryID=Request::post('categoryID');
        //dump($categoryID);
        file_put_contents("postfile.txt",$categoryID);
        $material_res=$material->db()->where('category_id','=',$categoryID)->select()->toArray();
        //$material_res=$material->db()->where('category_id','=',1)->select()->toArray();

        //file_put_contents("jsonfile",json_encode($material_res));
        return json_encode($material_res);
    }


}