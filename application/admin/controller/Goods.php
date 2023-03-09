<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Validate;

class Goods extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //接收参数
        $keyword = input('keyword');
        $where = [];
        if (!empty($keyword)) {
            $where['goods_name'] = ['like', "%$keyword%"];
        }
        //查询列表数据
        // $list = \app\admin\model\Goods::select();
        $list = \app\admin\model\Goods::where($where)->order('id desc')->paginate(5, '', [
            'query' => ['keyword' => $keyword]
        ]);
        return view('goods_list', ['list' => $list]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('goods_add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //接收参数
        $params = $request->param();
        // dump($params);

        //参数检测
        /** 
        // 1.独立验证
        //定义验证规则
        $rule = [
            'goods_name | 商品名称' => 'require',
            'goods_price | 商品价格' => 'require | float |egt:0',
            'goods_number | 商品数量' => 'require | integer | egt:0'
        ];
        //定义错误提示信息
        $msg = [
            'goods_price.float' => '商品价格必须是整数或者小数',
        ];
        //实例化验证类Validate
        $validate = new \think\Validate($rule, $msg);
        //执行验证
        if (!$validate->check($params)) {
            //验证失败
            $error_msg = $validate->getError();
            $this->error($error_msg);
        }
         */

        //控制器验证
        //定义验证规则
        $rule = [
            'goods_name|商品名称' => 'require',
            'goods_price|商品价格' => 'require|float|egt:0',
            'goods_number|商品数量' => 'require|integer|egt:0'
        ];
        //定义错误提示信息
        $msg = [
            'goods_price.float' => '商品价格必须是整数或者小数',
        ];
        //调用控制器的validate方法
        $validate = $this->validate($params, $rule, $msg);
        if ($validate !== true) {
            //验证失败，$validate就是一个字符串错误信息
            $this->error($validate);
        }
        //文件上传
        $params['goods_logo'] = $this->upload_logo();
        //添加数据到数据表  第二个参数true表示过滤非数据表字段
        \app\admin\model\Goods::create($params, true);
        //页面跳转 第二个参数表示跳转的页面
        $this->success('操作成功', 'admin/goods/index');
    }

    /**
     * @return 图片路径
     */
    public function upload_logo()
    {
        //获取上传的文件
        $file = request()->file('logo');
        //判断是否上传了文件
        if (empty($file)) {
            $this->error('没有上传文件');
        }
        //移动图片到指定目录下 /public/uploads/goods
        $info = $file->validate([
            'size' => 10 * 1024 * 1024,
            'ext' => 'jpg,png,gif,jpeg',
        ])->move(ROOT_PATH . 'public' . DS . 'upload');
        if ($info) {
            //上传成功就拼接图片的访问路径
            $goods_logo = DS . 'upload' . DS . $info->getSaveName();
            //返回图片路径 
            return $goods_logo;
        } else {
            //上传失败
            $error_msg = $file->getError();
            $this->error($error_msg);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //查询一条数据
        $request = Request();
        $params = $request->param();
        $goods = \app\admin\model\Goods::find($params['id']);
        return view('goods_detail', ['goods' => $goods]);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $params = input();
        $goods = \app\admin\model\Goods::find($id);
        return view('goods_edit', ['goods' => $goods]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //接受参数
        $params = input();
        //参数检测(表单验证)
        //验证规则
        $rule = [
            'id' => 'require',
            'goods_name|商品的名称' => 'require|max:100',
            'goods_price|商品的价格' => 'require|float|egt:0',
            'goods_number|商品的数量' => 'require|egt:0',
        ];
        //错误信息（可选）
        $msg = [
            'goods_price.float' => '商品的价格必须是小数或整数'
        ];
        //1.独立验证
        // $validate = new \think\Validate($rule, $msg);
        // if (!$validate->check($params)) {
        //     //失败
        //     $error_msg = $validate->getError();
        //     $this->error($error_msg);
        // }
        //2.控制器验证
        $validate = $this->validate($params, $rule, $msg);
        if ($validate !== true) {
            $this->error($validate);
        }
        //处理数据
        // dump($id);
        \app\admin\model\Goods::update($params, ['id' => $id], true);
        // //返回
        $this->success('操作成功', 'admin/goods/index');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        // id检测 必须是大于0的整数
        if (!is_numeric($id) || $id !== (int)$id || $id <= 0) {
            $this->error('参数错误');
        }
        if (preg_match('/^\d+$/', $id) || $id == 0) {
            $this->error('参数错误');
        }
        //软删除
        // \app\admin\model\Goods::destroy($id);
        //真删除
        // \app\admin\model\Goods::destroy($id,true);
        //跳转到列表页
        //$this->success('删除成功');
        $goods = \app\admin\model\Goods::find($id);
        if (empty($goods)) {
            $this->error('数据已不存在');
        }
        $goods->delete();
        //跳转到列表页
        $this->success('删除成功');
    }
}
