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