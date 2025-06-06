<?php

require_once './helpers.php';

// 在 PHP 的类中, 类的属性和方法都可以使用 `public`、`protected` 和 `private` 关键字来定义访问权限。`public` 表示可以在任何地方访问, `protected` 表示只能在类内部和子类中访问, `private` 表示只能在类内部访问。

/**
 * Animal 类
 * 
 * @class Animal
 */

class Animal
{
    public string $name = "Unknown";
    public int $age = 0;

    /**
     * 是否是被饲养的动物
     * 
     * @var string
     */
    protected string $isFeed = "No";

    /**
     * 动物的 ID 号码
     * 
     * @var string|null
     */
    private ?string $idNumber = "001";

    /**
     * 构造函数
     * 
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function speak(): void
    {
        $name = $this->name ?? "Animal";
        echo "$name speak<br>";
    }

    /**
     * 设置动物的 ID 号码
     * 
     * @param $idNumber
     * @return void
     */
    public function setAnimalIDNumber($idNumber): void
    {
        // 这里呢可能就会有权限控制，例如：只有管理员可以设置 ID 号码
        $this->idNumber = $idNumber;
    }

    public function getAnimalIDNumber(): ?string
    {
        // 权限控制，如：只有管理员可以获取 ID 号码
        return $this->idNumber;
    }

}

/**
 * 定义一个 'Car' 类，它有两个属性：'brand' 和 'model'，还有一个方法 'drive'
 * 
 * class Car
 */
class Car
{
    // public string $brand = "Unknown";
    // public string $model = "Unknown";

    public static string $power = "Engine";

    public function __construct(public string $brand = 'Unknown', public string $model = "Unknown")
    {
        // 使用了 PHP 8.0 的新特性，直接在构造函数中定义属性
        // 这样就不需要在类的外面定义属性了
        // 也可以在类的外面定义属性，然后在构造函数中赋值
        // $this->brand = $brand;
        // $this->model = $model;
        echo "Car is created<br>";
    }

    public function drive(): void
    {
        echo "Car is driving<br>";
    }
}

/**
 * 这里定义一个 'Dog' 类，它继承了 'Animal' 类，也就是说 'Dog' 类可以使用 'Animal' 类的属性和方法
 * 
 * @class Dog
 */

class Dog extends Animal
{
    /**
     *  狗一般是人类的宠物，所以狗可能会有「主人」这个属性
     * 
     * @var string|null
     */
    public ?string $master = null;

    /**
     * 物种：dog，在这里我们已经是 Dog 类了
     * 为了理解 static 的含义，所以声明了一个物种属性。
     * @var string
     */
    public static string $species = "Dog";

    public function __construct($name, $age, $master = null)
    {
        parent::__construct($name, $age);

        $this->master = $master;
    }

    public function run(): void
    {
        echo "Dog is running<br>";
    }

    public function speak(): void
    {
        echo "Dog barks<br>";
    }

    public function getParentPrivateProp(): ?string
    {
        // 父类属性被设置为私有，不想被外部或者子类访问
        // 这里可能需要验证某些权限，例如：只有管理员可以访问 ID 号码
        // echoHr($this->idNumber); 这里不可以直接访问父类中的方法来访问父类的私有属性
        return $this->getAnimalIDNumber(); // 可以通过父类中的方法来访问父类的私有属性
    }

    public function showClassSelf(): static
    {
        return $this;
    }

    public static function getSelfstaticProp(): string
    {
        return self::$species;
    }

    // __call 调用一个不存在的方法时自动触发
    public function __call($name, $arguments)
    {
        echo "你调用了一个不存在的方法：$name, 参数是：" . implode(", ", $arguments) . "<br>";
    }

    // __get 访问一个不存在的属性时自动触发
    private $hidden = "我是隐藏的秘密";
    public function __get($name){
        echo "试图访问不存在或不可见的属性：$name<br>";
        return "默认返回值";
    }

    // __set($name, $value)
    private $data = [];
    public function __set($name, $value) {
        echo "你给不存在的值 $name 赋了值：$value<br>";
        $this->data[$name] = $value; // 动态存到内部数组
    }

    // __CLASS__
    public function showClassName() {
        echo __CLASS__;
    }
}

$luckyDog = new Dog("lucky", 3);
$luckyDog->speak();
echo $luckyDog->name . "<br>";
echoWithBr("Animal's idNumber: " . $luckyDog->getParentPrivateProp());

$luckyDog->setAnimalIDNumber("002-lucky");
echoWithBr("Animal's idNumber: " . $luckyDog->getParentPrivateProp());

varDumpWithBr($luckyDog->showClassSelf());

echoWithBr("这是 LuckyDog 的物种1: " . $luckyDog::$species);

echoWithBr("这是 LuckDog 的物种2: " . $luckyDog::getSelfStaticProp());

$dog = new Dog("wangcai", 2);
$dog->bark('loudiy', 4); // bark()方法不存在，所以自动触发 __call
$dog1 = new Dog("tiedan", 5);
echo $dog1->secrect . "<br>"; // secret属性不存在，触发 __get
$dog2 = new Dog("niuniu", 3);
$dog2->color = "black"; // color属性不存在，触发 __set
$dog->showClassName();
echoHr();

// 事例化一个对象
$animalLion = new Animal("辛巴", 5);
$animalTiger = new Animal("武松的兄弟", 4);
$animalLion->speak();
$animalTiger->speak();
echoWithBr("这是被修改之前的类的属性：name = " . $animalTiger->name);
$animalTiger->name = "悍娇虎";
echoWithBr("这是被修改之后的类的属性：name = " . $animalTiger->name);

echoHr();

varDumpWithBr(gettype($animalLion));
varDumpWithBr($animalLion);

echoHr();

$car = new Car("Toyota", "Corolla");
echoWithBr("Car brand: " . $car->brand);
echoWithBr("我们 Car 这个类型里面的车辆都是通过内燃机来驱动的：power = " . Car::$power);
// 还有例如我们使用的工具类一般也会有静态的方法供我们直接调用, 而不需要去实例话一个对象
// Logger::log("这是一个日志信息");
// Database::query("SELECT * FROM users");
// Database::connect();
// Database::host; // 这个例子中我们假设我们的整个项目中的数据库的 host 都是不变的, 这样的话我们就可以将 host 设置为静态的, 这样设置之后呢, 不管我们实例化多少个对象, 这个 host 都是不会变

// class 类的名字 { 这里写类的方法和属性 }
// 类的名称应该使用 PascalCase 风格, 例如: `UserProfile`、`ProductList`, `Animal` 等等
// class 类的名称 extends 父类名称 { 这里写类的方法和属性 }
// $对象 = new 类名(参数1, 参数2, ...); 这里的参数就是类的构造函数的参数
// __construct() 是类的构造函数, 当我们创建一个对象的时候, PHP 会自动调用这个函数
// 在 PHP 中有很多 __ 开头的函数, 例如: `__destruct()`、`__call()`、`__get()`、`__set()` 等等, 这些函数都是 PHP 内置的魔术方法, 用来实现一些特殊的功能
// 还有一些以 __ 开头的变量, 例如: `__FILE__`、`__LINE__`、`__CLASS__` 等等, 这些变量也是 PHP 内置的魔术变量, 用来获取一些特殊的信息

class Cat {
    public function __destruct() {
        echo "Cat 对象被销毁了<br>";
    }
}

$cat = new Cat ();
echoHr ("程序结束<br>"); // 结束后，PHP自动调用了 $cat 的 __destruct()

echo __FILE__;
echo __LINE__;
