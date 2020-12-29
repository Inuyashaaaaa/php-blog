<?php
?>

<div class="swiper-container" style="width: 100%;height: calc(50vh-50px);margin-top:30px;">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="height: calc(50vh);">
            <div style="height: calc(50vh);;background: url('/images/carousel5.png'); background-size: cover">
                <div class="jumbotron" style="padding-top: 20vh">
                    <h1 style="color: white">欢迎来到博客管理系统</h1>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="height: calc(50vh);">
            <div style="height: calc(50vh);background: url('/images/carousel6.png'); background-size: cover">
                <div class="jumbotron" style="padding-top: 20vh">
                    <h1 style="color: white">欢迎来到博客管理系统</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-scrollbar"></div>
</div>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'horizontal', // 垂直切换选项
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    })
</script>
<div class="wrapper">
    <div class="box">
        <div class="front-face">
            <div class="icon"><i class="fas fa-code"></i></div>
            <span>文章数量</span>
        </div>
        <div class="back-face">
            <span><?= $post ?></span>
        </div>
    </div>
    <div class="box">
        <div class="front-face">
            <div class="icon"><i class="fas fa-chart-line"></i></div>
            <span>评论数量</span>
        </div>
        <div class="back-face">
            <span><?= $comment ?></span>
        </div>
    </div>
    <div class="box">
        <div class="front-face">
            <div class="icon"><i class="fas fa-rocket"></i></div>
            <span>用户数量</span>
        </div>
        <div class="back-face">
            <span><?= $user ?></span>
        </div>
    </div>
</div>