// resources/js/app.js

// 引入 Laravel 默认的 bootstrap 设置（包括 Popper、Alpine 等，如果有的话）
import './bootstrap';

// 引入 axios
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// 引入 jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;

// 导航半透明交互逻辑
$(function() {
    const $nav = $('nav.glass');
    const THRESHOLD = 50;

    // 页面滚动时：超过阈值就加上 .scrolled，否则移除
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > THRESHOLD) {
            $nav.addClass('scrolled');
        } else {
            $nav.removeClass('scrolled');
        }
    });

    // 鼠标移入 nav 时临时加上 .hovered，移出时移除
    $nav.on('mouseenter', function() {
        $nav.addClass('hovered');
    }).on('mouseleave', function() {
        $nav.removeClass('hovered');
    });
});
