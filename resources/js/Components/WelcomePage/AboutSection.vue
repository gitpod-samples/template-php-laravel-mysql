<script setup>
import {ref} from 'vue';


const books= ref('30000')
</script>
<template>
    <div id="about_bhudil_cta_area">
        <div class="about_bhudil_cta_bg"></div>
        <div class="about_area_inner_wrapper">
            <div id="about_bhudil_cta" class="flexCenter flex-wrap w-full">
                <div class="cta_content">
                    <h2 class="heading2 mb-[2vw] hsm:mb-[10px]">
                        Access Books Instantly
                    </h2>
                    <div class="paragraph">
                        With nearly {{ books }} books from AAA to indie and
                        everything in-between. Enjoy exclusive materials,
                        automatic updates, and other great learning materials.
                    </div>
                    <div class="cta_btn">
                        <a :href="route('books.index')">
                            Browse the Gallary
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
#about_bhudil_cta_area {
    position: relative;
    padding-bottom: 5vw;
    margin-bottom: 15vw;
    padding-top: 10vw;
}
#about_bhudil_cta_area .about_bhudil_cta_bg {
    background-image: radial-gradient(
        ellipse farthest-side,
        rgba(0, 111, 255, 0.15),
        transparent
    );
    background-size: 100%;
    background-repeat: no-repeat;
    background-position: center center;
    position: absolute;
    top: -15%;
    bottom: -20%;
    left: 0;
    right: 0;
}
#about_bhudil_cta_area .about_area_inner_wrapper {
    overflow: hidden;
}
.about_area_inner_wrapper {
    max-width: 940px;
    position: relative;
    margin: 0 auto;
    padding-left: 6vw;
    padding-right: 6vw;
}
#about_bhudil_cta .cta_content {
    position: relative;
    z-index: 99;
}
#about_bhudil_cta {
    text-align: center;
    margin-left: 2vw;
    margin-right: 2vw;
}
#about_bhudil_cta .cta_content {
    position: relative;
    z-index: 99;
}

.cta_title {
    font-family: "Motiva Sans", Sans-serif;
    font-weight: bold;
    font-size: 8vw;
    line-height: 1.2;
    text-transform: none;
    letter-spacing: normal;
    margin-bottom: 2vw;
    color: #fff;
    margin: 0 0 10px;
    padding-top: 2px;
}
.cta_btn a {
    color: #2ebfff;
    font-size: 4.5vw;
    display: block;
    margin: 5vw 0;
}
@media only screen and (min-width: 768px) {
    .cta_btn a {
        font-size: 20px;
        margin: 15px 0;
    }
}

.cta_btn a:after {
    content: "➜";

}
@media only screen and (min-width: 768px) {
    .cta_btn a:after {
        width: 40px;
        display: inline-block;
        text-align: left;
        transition: padding 100ms ease-out, width 100ms ease-out;
    }
    .cta_btn a:hover:after {
        width: 30px;
        padding-left: 10px;
    }
}

@media only screen and (min-width: 768px) {
    #about_bhudil_cta_area {
        padding-bottom: 200px;
        padding-top: 200px;
        margin-bottom: 40px;
        min-height: 400px;
    }
    .about_area_inner_wrapper {
        padding-left: 16px;
        padding-right: 16px;
    }
    #about_bhudil_cta_area .about_area_inner_wrapper {
        max-width: none;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }
    #about_bhudil_cta {
        width: 60%;
        margin-left: 0;
        margin-right: 0;
    }
    #about_bhudil_cta .cta_content {
        max-width: 600px;
        margin: 0 auto;
    }
    #about_bhudil_cta .cta_content {
        max-width: 600px;
        margin: 0 auto;
    }
    .cta_title {
        font-size: 35px;
        margin-bottom: 10px;
        line-height: 1;
    }
}
@media only screen and (min-width: 970px) {
    .about_area_inner_wrapper {
        padding-left: 0;
        padding-right: 0;
    }
    .cta_title {
        font-size: 45px;
        margin-bottom: 10px;
        line-height: 1;
    }
}
</style>
