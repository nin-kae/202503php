//原生 js 写法

//document.getElementById ( 'title' ).style.display = 'none';
$('#title-1').hide (); //隐藏元素 隐藏ID


// ID 选择器
// document。getElementById ( 'title' ).style.background-color = '#B2B2B2';
$('#header').css ( 'background-color', ' #B2B2B2' ); // 设置元素样式


// 类选择器
// $( '.content' ).addClass('active'); // 添加类名

// 标签选择器
// $( 'p' ).text ( 'Hello World' ); // 设置元素的文本内容

// 通配符选择器
// $ ( '*' ).css ( 'margin', '0' ); // 设置所有元素的 margin 为 0；

// 多重选择器
// $ ( 'h1, p, note' ).hide (); //隐藏多个元素

// 后代选择器（空格）
// $( 'p .note' ).css ( 'color', 'red' );  //设置后代元素的样式

// 直接子元素选择器(>)，会选择 class 为 content-5 的元素下面的所有 span 元素

// 兄弟选择器

// 内容操作

// 获取元素
let titleElement = $ ( '#title' );

// 获取和设置 HTML 内容
let html = titleElement.html();

// 获取元素的文本内容

// 设置元素的 HTML 内容，会覆盖原有标签内的内容

// .HTML