document.addEventListener ( 'keydown', function ( event ) {
    let key = event.key;
    let code = event.code
    //
    document,this.getElementById ( 'keydown-event-output' ).inertHTML = '你按下了 ${key} 键'

});

document.addEventListener ( 'submit', function ( event ) {
    event.preventDefault(); //阻止表单默认提交行为

    let form = event.target; // 获取表单元素
    let formData = new FormData(form);

    console.log ( formData.entries () );

    let data = {}; //创建一个空对象，用于存放表单数据
    for (let [ key, value ] of formData.entries () ) {
        data [ key ] = value;
    }

    document.getElementById( 'submit-event-output' ). innerHTML = JSON.stringify (data);

});

// 移除事件监听
function handleClick(event) {
    alert('按钮被点击了');
}

let button = document.getElementById ( 'remove-event-listener' );
button.addEventListener ( 'click', handleClick );
button.removeEventListener ( 'click', handleClick );

let parent = document.getElementById ( 'parent' );
let child = document.getElementById ( 'child' );

parent.addEventListener ( 'click', function () {
    alert ( '父级元素被点击了' );
});

child.addEventListener ( 'click', function (event) {
    event.stopPropagation (); //阻止事件弹窗
    alert ( '子元素被点击了' )
});

// console.dir (parrent);

// JS 中的对象和类
// 对象就是把一类事物抽象出来，用属性和方法（行为）来描述

// 直接创建对象
let person = {
    name: '张三', age: 20, sayHello: function() {
        console.log ( 'Hello, my name is ${this.name}' );
    }, eat: function () {
        console.log ( this.name + ' is eating' )
    }
};

person.sayHello ();
person.eat ();
console.log (person.name);

// 使用构造函数创建对象
function Person(name, age) {
    this.name = name;
    this.age = age;
}

let student = new Person ( '李四', 18 );
console.log ( student.name );

// 使用 class 关键字创建类
class Animal {
    constructor(name) {
        this.nmae = name;
    }

    sayHello() {
        console.log( 'Hello, my name is ${this.name}' ); 
    }

}

let cat = new Animal ( 'Tom' ); //通过类创建对象
cat.sayHello ();

class Car {
    constructor ( brand, price ) {
        this.brand = brand;
        this.price = price;
    }

    run() {
        console.log ( '${this.brand} is running' );
    }
}

let bmw = new Car ( 'BMW', 300000 );
console.log ( bmw.brand );

// 继承
class Dog extends Animal {
    bark() {
        console.log ( '汪汪汪' );
    }
}

let dog = new Dog ( '旺财' );
dog.sayHello ();
dog.bark ();
// cat.bark (); // 报错

// JS 中的异步编程
// 同步代码, 顺序执行
// 异步代码, 不会阻塞后续代码执行
// Promise, async/await, callback

// let promise = new Promise((resolve, reject) => {
//     setTimeout(() => {
//         resolve('Hello, Promise');
//     }, 2000); // 2 秒后执行
// });
//
// promise.then((value) => {
//     console.log(value);
// });
//
// console.log('Promise called');

// async function fetchData() {
//     // 通过 fetch 获取数据
//     let response = await fetch('https://jsonplaceholder.typicode.com/posts');
//     // 把 response 对象转换为 JSON 格式
//     let data = await response.json();
//     console.log(data);
// }
//
// fetchData().then(r => console.log('fetchData done'));
//
// console.log('fetchData called');

// 错误处理
try {
    $element = document.getElementById ( 'not-exist' );
    $element.addEventListener ( 'click', function () {
        alert ( '元素被点击了' );
    });
    console.log ( '$element' );
} catch ( error) {
    console.error ( '发生错误' + error.message );
} finally {
    // 无论是否发生错误，都会执行
    console.log ( 'finally' );
}

// 自定义错误
function divide ( a,b ) {
    if ( b=== 0 ) {
        throw new Error ( '除数不能为 0, ( 这是一个自定义错误 )' );
    }
    return a / b;
}

try {
    console.log ( divide ( 10,0 ) );
} catch ( error ) {
    console.error ( '发生错误' + error.message );
}

// DOM 操作
// 获取元素
let heading = document.getElementById ( 'heading' );
// .textContent 获取元素的文本内容
console.log ( heading.textContent );

let item = document.getElementsByClassName ( 'item' );
// console.log ( items );
// console.log ( items [0].textContent );
for ( let item of items ) {
    if (item.textContent === 'PHP' ) {
        items.style.color = 'red';
    }
    console.log ( item.textContent );
}
