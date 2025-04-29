<?php

require_once './helpers.php';

// 定义接口
interface ProductResource
{
    /**
     * 获取产品详情
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): mixed;

    /**
     * 获取产品列表
     *
     * @return mixed
     */
    public function index(): mixed;

    /**
     * 展示创建产品的表单页面
     *
     * @return mixed
     */
    public function create(): mixed;

    /**
     * 新增产品到数据库
     *
     * @param array $product
     * @return mixed
     */
    public function store(array $product): mixed;

    /**
     * 展示编辑产品的表单页面
     *
     * @param int $id
     * @return mixed
     */
    public function edit(int $id): mixed;

    /**
     * 更新产品到数据库
     *
     * @param int $id
     * @param array $product
     * @return mixed
     */
    public function update(int $id, array $product): mixed;

    /**
     * 删除产品
     *
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id): mixed;
}

// 抽象类 & 抽象类实现接口
// 不能直接用来创建对象实例（不能 new Shape()）
// 不实现接口的抽象类写法 abstract class Shape
abstract class Product implements ProductResource
{
    // 一个普通属性
    protected string $name;

    // 构造函数
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * 获取产品详情 方法名：show
     * 
     * @return mixed
     */
    
    abstract public function show(int $id): mixed;

    /**
     * 获取产品列表 方法名：index
     * 
     * @return mixed
     */
    
    abstract public function index(): mixed;

    /**
     * 展示创建产品的表单页面 方法名：create
     * 
     * @return mixed
     */

    abstract public function create(): mixed;

    /**
     * 新增产品到数据库 方法名：store
     * 
     * @param array $product
     * @return mixed
     */

    abstract public function store(array $product): mixed;

    /**
     * 展示编辑产品的表单页面 方法名：edit
     * 
     * @param int $id
     * @return mixed
     */

    abstract public function edit(int $id): mixed;

    /**
     * 更新产品到数据库 方法名：update
     * 
     * @param int $id
     * @param array $product
     * @return mixed
     */

    abstract public function update(int $id, array $product): mixed;

    /**
     * 删除产品 方法名：destroy
     * 
     * @param int $id
     * @return mixed
     */
    abstract public function destroy(int $id): mixed;
}

// 定义子类 Circle，继承 Shape
// **必须实现**父类的抽象方法
class ElectronicsProduct extends Product
{
    // 子类构造函数，需要调用父类构造函数
    public function __construct(string $name)
    {
        parent::__construct($name); // 调用 Shape 的构造函数设置产品信息
    }

    public function show(int $id): mixed
    {
        return (object)['id' => $id, 'name' => $this->name, 'type' => 'circle'];
    }

    public function index(): mixed
    {
        return [
            (object)['id' => 1, 'name' => 'Circle A'],
            (object)['id' => 2, 'name' => 'Circle B']
        ];
    }

    public function create(): mixed
    {
        return (object)['form' => 'create_circle_form'];
    }

    public function store(array $product): mixed
    {
        return (object)['message' => 'Circle stored', 'product' => $product];
    }

    public function edit(int $id): mixed
    {
        return (object)['id' => $id, 'name' => 'Editable Circle'];
    }

    public function update(int $id, array $product): mixed
    {
        return (object)['message' => 'Circle updated', 'id' => $id, 'newData' => $product];
    }

    public function destroy(int $id): mixed
    {
        return (object)['message' => 'Circle deleted', 'id' => $id];
    }

    public function search(string $keyword): mixed
    {
        return "Searching for product with keyword: $keyword<br>";
    }
}

// 接口不能被直接实例化；接口不能 new（因为没有方法体）
// 抽象类不能实例化；抽象类也不能 new（因为至少有一个未实现方法）
// $productResource = new ProductResource();

$product = new ElectronicsProduct("Sample Product");
$productInfo = $product->show(1);
echoWithBr($productInfo);

// 写一下抽象类与抽象方法的例子(✅)

// php 设计模式
// 使用命名空间汇中的代码
// Composer 的自动加载 (推荐的标准方式！) // 管理 php 扩展

// 静态属性 & 静态方法
class Database
{
    public static string $host = "localhost"; // 静态属性

    public string $dbName = "school";

    public static string $username;
    public static string $password;

    /**
     * @var object|null
     */
    private static ?object $instance = null;

    /**
     * @param $username
     * @param $password
     */
    private function __construct($username, $password)
    {
        self::$username = $username; // self 关键字是在静态方法内部访问静态属性
        self::$password = $password;
    }

    /**
     * @param $username
     * @param $password
     * @return self
     */
    public static function connect($username, $password): object
    {
        // 这里我们省略了数据库连接的实现细节
        // 使用 pdo 扩展来连接数据库
        return self::$instance = new self($username, $password); // 在非静态方法内部访问静态属性
    }
    
    // query 查询，请求；
    public static function query(string $sql): string
    {
        return "Executing query: $sql<br>";
    }

    /**
     * 禁止克隆
     *
     * @throws Exception
     */
    private function __clone()
    {
        throw new Exception("Cannot clone a singleton class");
    }
}

$connection = Database::connect('root', 'password');
varDumpWithBr($connection);
echoWithBr(Database::$host);

// $database = new Database('root', 'password');
// $databaseClone = clone $database;

// 超越单继承的代码复用（解决一个类最多只能直接继承自一个父类的方法）
trait Shareable
{
    public function share(string $name): string
    {
        return "sharing this {$name}<br>";
    }

    protected function log(string $message): string
    {
        return "Logging messagae: $message<br>";
    }

    abstract protected function getShareTitle(): string;
}

// 在类中使用 trait: use
class Controller
{
    // ... 基础类!!!

    // 把响应(response)转换成JSON格式的过程
    public function responseJson(array $data, int $status = 200, string $message = 'success'): string
    {
        return json_encode([
            'status' => 200,
            'message' => 'success',
            'data' => $data
        ]);
    }
}

class Post extends Controller
{
    use Shareable;

    public function getShareTitle(): string
    {
        return "Sharing a post<br>";
    }

    public function getShare(): string
    {
        return $this->share('食品食品衛生法');
    }

    /**
     * 获取 Post 详情
     * 
     * @param string //@param 的意思是 说明一个参数
     */

    public function show(): string
    {
        $post = [
            'id' => 1,
            'title' => 'Hello World',
            'content' => 'This is a sample post'
        ];

        return $this->responseJson($post);
    }
}

$post = new Post();
echoWithBr($post->getShare());
echoWithBr($post->show());

// 使用多个 Trait 与冲突解决
trait A
{
    public function commonMethod()
    {
        echo "Method from A\n";
    }

    public function method1() 
    {
        echo "C::method1\n"; 
    }

    protected function method2()
    {
        echo "C::method2 (protected)\n";
    }
}

trait B
{
    public function commonMethod()
    {
        echo "Method from B\n";
    }

    public function method1()
    {
        echo "D::method1\n";
    }
}

class MyClass {
    use A, B
    {
        // 当调用 commonMethod 时，使用 Trait A 的版本，忽略 Trait B 的
        A::commonMethod insteadof B;

        // 解决不同 trait 中命名的冲突
        A::method1 insteadOf B;
        B::method1 as bMethod1; // 将 B 的 method1 重命名为 bMethod1

        // 把 method2 的可见性为 public
        // A::method2 as public;
        
        // 重命名 + 修改可见性
        A::method2 as public aMethod2;
    }

}

echoHr();
$object1 = new MyClass();
$object1->commonMethod(); // 输出: Method from A
$object2 = new MyClass();
$object2->method1(); // 输出: A::method1
$object2->bMethod1(); // 输出: B::method1
$object2->amethod2(); // 输出: A::method2 (protected) (现在可以从外部调用了)

// 一些魔术方法
class TestMagic
{
    public string $name = "TestMagic";

    public function __construct()
    {
        echo "Constructor called<br>";
    }

    /**
     * 当 PHP 试图访问一个不存在的方法时, 会自动调用 __call() 方法
     *
     * @param string $name
     * @param mixed $arguments
     */
    public function __call(string $name, mixed $arguments)
    {
        echoWithBr("你正在尝试访问一个不存在的方法: $name 这时 __call 会被自动调用, 当前被自动调用的方法名是:" . __FUNCTION__ . "<br>");
        echo "Method $name does not exist. Arguments: " . implode(", ", $arguments) . "<br>";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Static method $name does not exist. Arguments: " . implode(", ", $arguments) . "<br>";
    }

    public function __get($name)
    {
        echo "Getting property '$name'<br>";
        return $this->name;
    }

    public function __set($name, $value)
    {
        echo "Setting property '$name' to '$value'<br>";
        $this->name = $value;
    }

    public function __isset($name)
    {
        echo "Checking if property '$name' is set<br>";
        return isset($this->$name);
    }

    public function __unset($name)
    {
        echo "Unsetting property '$name'<br>";
        unset($this->$name);
    }
}

echoHr();
$testMagic = new TestMagic();
$testMagic->nonExistentMethod("arg1", "arg2");
$testMagic->nonExistentProp = "这里是东京啊!";
unset($testMagic->nonExistentProp);