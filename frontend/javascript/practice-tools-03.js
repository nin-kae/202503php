// 计时器开始
let timer = document.getElementById ( 'timer' );
let start = document.getElementById ( 'start' );
let stop = document.getElementById ( 'stop' );
let reset = document.getElementById ( 'reset' )

let count = 0;
let interval;

start.addEventListener ( 'click', () => {
    // setInterval ( callback, time ) 这是计时器函数，每隔 time 事件执行一次 callback 函数
    interval = setInterval( () =>  {
        count++; //count = count + 1
        timer.innerText = count;
    }, 1000); //1000ms = 1s
});

stop.addEventListener ( 'click', () => {
    //clearInterval ( interval ) 这是清除计时器函数
    clearInterval ( interval );
    interval = null;
});

reset.addEventListener ( 'click', () => {
    clearInterval ( interval );
    interval = null;
    count = 0;
    timer.innerText = count;
});
//计时器结束