<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Goods as GoodsModel;
use think\Db;

// use app\admin\model\Goods;

class Test extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //调用公共common文件里面的函数
        dump(encrypt_password('123456'));

        // $_SESSION['username'] = 'admin';
        // $_SESSION['abc']['username'] = 'admin';


        //手动实例化模型
        // $model = new \app\admin\model\Goods();
        // $model = new Goods();
        // $model = new GoodsModel();

        //静态使用all or select
        // 查询多条数据
        $data = \app\admin\model\Goods::all('32,33,34');
        // $data = \app\admin\model\Goods::select();
        // dump($data[0]);
        // foreach($data as $v) {
        //     //输出商品名称goods_name
        //     // dump($v->goods_name);
        //     dump($v['goods_name']);
        // }

        //返回结果外层是数组，里面是对象
        //为了打印查看数据方便，可以将返回的结果转换为标准的二维数组
        // 1.foreach
        // foreach ($data as &$v) {
        //     dump($v->toArray());
        // }
        foreach ($data as $k => $v) {
            // dump($data[$k] = $v->toArray());
        }
        unset($v); //$v没用了就销毁掉

        // 2.集合对象 \think\Collection
        $data = (new \think\Collection($data))->toArray();
        // dump($data);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //url生成
        dump(url('admin/test/index'));
        dump(url('admin/test/read', ['id' => 10, 'page' => 20]));
        dump(url('admin/test/read', ['id' => 10, 'page' => 20], false));
        dump(url('admin/test/read', ['id' => 10, 'page' => 20], true, true));
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //where方法的使用

        // $goods = \app\admin\model\Goods::where('goods_price', '>', '100')->select();
        // dump($goods);

        // 联表查询
        // SELECT t1.*,t2.username FROM 'tpshop_address' as t1 left join tpshop_user as t2 on t1.user_id = t2.id where t1.id<10;
        // $data = \app\admin\model\Address::alias('t1')
        //     ->join('tpshop_user t2', 't1.user_id = t2.id', 'left')
        //     ->where('t1.id', '<', 10)
        //     ->field('t1.*,t2.username')
        //     ->select();
        // dump($data);

        //统计查询
        // $count = \app\admin\model\Goods::where('id','>','35')->count();
        // dump($count);

        //数据字段查询
        // $data = \app\admin\model\Goods::where('id',33)->value('goods_name');
        $data = \app\admin\model\Goods::where('id', '>', 33)->column('goods_name', 'id');
        dump($data);
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
        $goods = \app\admin\model\Goods::find(32);
        $goods1 = \app\admin\model\Goods::get(32);
        dump($goods->goods_name);
        dump($goods1->toArray());
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //使用destroy
        \app\admin\model\Goods::destroy($id);
    }

    public function tianjia()
    {
        //添加数据
        //save方法
        // $goods_model = new \app\admin\model\Goods();
        // $goods_model->goods_name = 'huawei';
        // $goods_model->goods_price = '2999';
        // $goods_model->save();
        // dump($goods_model->id);

        //create方法
        // $data = ['goods_name' => 'xiaomi', 'goods_price' => 1999];
        // \app\admin\model\Goods::create($data);

        //批量添加
        $goods_model = new \app\admin\model\Goods();
        $data = [
            ['goods_name' => 'vivo', 'goods_price' => 1899],
            ['goods_name' => 'oppo', 'goods_price' => 2099]
        ];
        $goods_model->saveAll($data);
    }

    public function xiugai()
    {
        //先查询再修改 save方法
        $goods = \app\admin\model\Goods::find(32);
        $goods->goods_price = '123.00';
        $goods->goods_number = 321;
        $goods->allowField(true)->save();

        //静态方法 update (修改的数据，修改条件（id是几），过滤非数据表字段)
        \app\admin\model\Goods::update(['goods_price' => '123', 'goods_number' => 321], ['id' => 33], true);

        //底层DB的update方法（通过where方法后使用update方法）
        \app\admin\model\Goods::where('id', 34)->update(['goods_price' => '123', 'goods_number' => 321]);

        //批量修改(每条单个修改的方法看文档)
        \app\admin\model\Goods::where('id', '>', '100')->update(
            ['goods_price' => '123', 'goods_number' => 321]
        );

        //区别：
        //1.返回值不同，模型的返回模型对象，底层的返回修改条数
        //2.包含的功能不同，模型的可以过滤非数据表字段，底层不能
    }

    public function shanchu()
    {
        //查询并删除（调用模型的delete）
        // $goods = \app\admin\model\Goods::find(47);
        // $res = $goods->delete();
        // dump($res);

        //where删除
        \app\admin\model\Goods::where('id', 45)->delete();

        //静态删除 destroy
        // \app\admin\model\Goods::destroy(46);
    }

    public function test_session()
    {
        //设置
        session('username', 'admin');
        //读取
        dump(session('username'));
        //判断
        dump(session('?username'));
        //删除单个
        dump(session('username', null));
        dump(session('username'));
        //删除所有
        session(null);

        //数组用法 点语法
        session('user', ['id' => 1, 'username' => 'admin']);
        dump(session('user.username'));
        session('user.email', 'admin@qq.com');
        dump(session('user'));
        session('user.email', null);
        dump(session('user'));

        //cookie
        cookie('name', '张三', 5);
        dump(cookie('name'));
    }
}
