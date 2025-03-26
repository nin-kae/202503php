// 循环结构

// for ( 初始化； 条件； 迭代 ){
//      循环体
//}

// i++ 代表 i = i + 1
// i 是变量，可以是任意的变量名，但是需要注意的是，变量的命名要有意义，要做到见名知意

console.log ( '----------- for 循环 -----------' ); 


for ( let i = 0; i < 5; i++ ) {
    console.log ('当前值为：' + i );
}

// 在这个 for 循环中的代码执行循序是这样的：
// 1. 初始化： let i = 0 ；这个只执行一次
// 2. 条件： i < 5 ；每次循环都会执行；如果条件为 true，则执行循环体，否则退出循环
// 3. 循环体： console.log ('当前值为：' + i )； 每次循环都会执行
// 4. 迭代： i++, i = i + 1; 每次循环都会执行
// 5.
// 6.
// ......


// while 循环
// while (条件) {
//      循环体
//}

console.log ( '----------- while 循环 -----------' ); 

// let i = 0;
// while ( i < 5 ){
//     console.log ('当前值为：' + i);
//     i++
// }

//do while 循环
//do{
//  循环体
//}while ( 条件 );

console.log ( '----------- do while 循环 -----------' ); 


// let j = 0;
// do {
//     console.log ('当前值为：' + j);
//     j++;
// } while ( j + 5 );

// for in 循环
// for ( let 变量 in 对象 ){
//  循环体
//}

console.log ( '----------- for in 循环 -----------' ); 

let userInfo = {
    username:' 张三 ',
    age: 20,
    city:'东京'
};

let = [ 'iphone', '三星', '小米' ];

// 数组的最大索引值是数组长度减一

// for ( let i = 0; i < phone.length; i++) {
//     console.log (phone [i] ); 
// }

// phone[index]

// console.log ( userInfo ['city'] );
// console.log ( phone [0] );

for ( let key in userInfo ) {
    console.log ( key + ': ' + userInfo[key] );
}

console.log ( '----------- for of 循环 -----------' ); 

console.log ( '----------- break -----------' );

for(let i = 0; i<= 10; i++) {
    if ( i === 3 ){
        break;
    }
    console.log (' 当前值为：' + i );
}

console.log ( '----------- continue -----------' );

for(let i = 0; i<= 10; i++) {
    if ( i === 3 ){
        continue;
    }
    console.log (' 当前值为：' + i );
}

console.log ( '----------- 函数 -----------' );

// 函数声明
function add( a, b ){
    return a + b;
}
let sum = add ( a = 10, b = 20 )
console.log (sum);


//函数表达式
let totalPrice = function (a,b){
    return price * count;
}
console.log ( totalPrice( price = 5,count = 2 ) );

//箭头函数
let divide = (  a,b ) => a / b;
console.log(divide(10,2));

console.log ( '----------- 函数的参数 -----------' );

function sayHello( name = '张三'){
    console.log('你好，' + name);
}
sayHello('李四');
sayHello();

function sayHi(name, age, callback){
    console.log('你好,' + name + ',今年' + age + '岁');
    callback();
}

sayHi('王五', 25, function() {
    console.log('这是回调函数');
})

console.log ( '----------- 参数的解构赋值 -----------' );

function printInfo({name, age}){
    console.log('姓名' + name + '，年龄' + age);
}
let user = {}

function sayGoodbye(){
    //return
}

let Goodbye=sayGoodbye

console.log ( '----------- 递归函数 -----------' );


console.log ( '----------- 闭包 -----------' );

function createCounter(){
    let count = 0;
    return function(){
        count++;
        return count;
    }
}

let counter = createCounter();

console.log(counter());
console.log(counter());

//闭包的应用场景：1.模块化开发 2.防抖和节流 3.保存变量 4.缓存数据


// JS 事件处理
//事件是用户和浏览器之间的交互
//事件处理是指事件发生时执行的代码

//常见的事件
// 1. 鼠标事件：
//
//
//
//
//

console.log ( '----------- 事件处理 -----------' );

//document 是一个对象，代表整个HTML 文档 
//window 是一个对象，代表浏览器窗口
// JS 中已经帮我门封装好了很多对像以及对象的方法，我们只需要调用即可

// console.dir ( document )


console