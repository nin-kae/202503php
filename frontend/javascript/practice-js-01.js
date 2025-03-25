alert('你好，东京123');

// 变量与数据类型
// 变量：存储数据的容器
// 数据类型：数据的类型

// 1. 变量的声明
// var，let，const
// var username='张三';
// const username='张三';
// let username='张三';
let agenumber = 18;

const PInumber = 3.14;

// 2. 数据类型
// 基本数据类型:number,string,boolean,null,undefined
// Number:数据类型
let StudenCountnumber = 123;//整数
let tallnumber = 1.78;//小数

// String:字符串类型
let username = 'Nin Kae';
let address = '东京';

// Boolean:布尔类型 对错
let isok = true;
let isnotok = false;

// Null:空
let n = null;

// Undefined:未定义
let age;//undefined
console.log(age);

// Object:对象类型
let userInfo={
    username:'Nin Kae',
    age:18,
    address:'东京'
};
console.log(userInfo);

// Array:数组类型
let colors = ['red','yellow','blue'];
let scores = [100,90,80];
console.log(colors);
console.log(scores);

// Function:函数类型
function sayHello(username){
    console.log('你好，东京');
}
console.log(sayHello(username = '你好，东京'));

// 3. 数据类型检测
// 基本数据类型:number,string,boolean,null,undefined
console.log(typeof StudenCountnumber);//number
console.log(typeof username);//string
console.log(typeof isok);//boolean
console.log(typeof n);//object
console.log(typeof scores);//object
console.log(typeof sayHello);//function

//4.运算符
// 算数运算符:+,-,*,/,%
let num1 = 10;
let num2 = 3;

console.log(num1 + num2);//13
console.log(num1 - num2);//7
console.log(num1 * num2);//30
console.log(num1 / num2);//3.3333333333333335
console.log(num1 % num2);//1 余数   10/3=3...1
num1++;//10
console.log(num1);//11
num2--;//3
console.log(num2);//2

let productPrice = 100;
let productCount = 3;
let totalPrice = productPrice * productCount;
console.log(totalPrice);

//比较运算符:>,<,>=,<=,==,!=，===,!==
console.log(10 > 5);//true
console.log(10 < 5);//false
console.log(10 >= 5);//true
console.log(10 <= 5);//false
console.log(10 == 5);//false
console.log(10 != 5);//true  判断类型 不判断值
console.log(10 === 5);//false 先判断值 再判断类型 两者都一样才能对
console.log(10 !== 5);//true 不全等于，值不一样或者类型不一样，其中一个相等就是对的
//在工作中，建议使用===,!==

//逻辑运算符:&&,||,!
let islogin1 = true;
let isAdmin1 = false;
console.log(islogin1 && isAdmin1);//false，且/与/并且/and，两者都为真，结果才为真
console.log(islogin1 || isAdmin1);//true，或/或者/or，两者有一个为真，结果就为真
console.log(!islogin1);//false，非/取反/not，取反，就是做了一个相反的操作

// 流程控制
// 1.条件语句 if...else
//if(条件){代码块}
//if(条件){代码块}else{代码块}
//if(条件){代码块}else if(条件){代码块}else{代码块}

let islogin2 = true;
if(islogin2){
    console.log('已登录');
} else{
    console.log('未登录');
}

let score = 80;
if(score >= 90){
    console.log('优秀');
} else if(score >= 80){
    console.log('良好');
} else if(score >= 60){
    console.log('及格');
}

//2.三元运算符
//条件? 值1 : 值2
let isMember = true;
let price = isMember ? 80 : 100;
// if(isMember){
//     price = 80;
// } else{
//     price = 100;
// }
console.log(price);

//3. switch...case
//switch(变量){case 值1:代码块;break;case 值2:代码块;break;default:代码块}
//我们一般会在情况有限且明确的情况下使用switch...case
let day = 3;
switch(day){
    case 1:
        console.log('星期一');
        break;
    case 2:
        console.log('星期二');
        break;
    case 3:
        console.log('星期三');
        break;
    default:
        console.log('没有找到对应的星期');
}

// 引用数据类型:object,array,function
// typeof:检测数据类型