document.addEventListener ( 'keydown', function ( event ) {
    let key = event.key;
    let code = event.code
    //
    document,this.getElementById ( 'keydown-event-output' ).inertHTML = '你按下了 ${key} 键'

});

document.addEventListener ( 'submit', function ( event ) {
    event.preventDefault(); //阻止表单默认提交行为

    let form = event.target;// 获取表单元素
    let formData = new FormData(form);

    console.log ( formData.entries () );

    let data = {}; //创建一个空对象，用于存放表单数据
    for (let [ key, value ] of formData.entries()) {
        data [ key ] = value;
    }

    document.getElementById( 'submit-event-output' ). innerHTML = JSON.stringify (data);

});