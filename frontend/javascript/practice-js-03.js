document.addEventListener ( 'keydown', function ( event ) {
    let key = event.key;
    let code = event.code
    //
    document,this.getElementById ( 'keydown-event-output' ).inertHTML = '你按下了 ${key} 键'

});

document.addEventListener('submit', function(event){
    event.preventDefault();

    let form = event.target;// 获取表单元素
    let formData = new FormData(form);

    console.log ( formData.entries() );

    let data = {};
    for (let [ key, value ] of formData.entries()){
        data 
    }

})