<template>

    <div class="flex-center position-ref full-height">

        <div class="content">

            <div class="title">
                {{title}}
                <p class="subtitle">{{catchphase}}</p>
            </div>

            <div class="links">
                <a href="javascript:null" @click="showComponent('registerSchool')"> Register School </a>
                <a href="javascript:null" @click="showComponent('moreInfo')"> More Info </a>
                <a href="javascript:null">FAQS</a>
                <a href="javascript:null">Watch Videos</a>
            </div>

        </div>

    </div>

</template>

<script>
    export default {
        props : {
            title: String, 
            catchphase: String
        },
        methods: {
            showComponent(value) {
                this.$root.setActiveView(value);
            },
        },
    }
</script>

<style>

    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .title .subtitle {
        font-size: 15px;
    }

    .links > a, span {
        cursor: hand;
        cursor: pointer;
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 30px;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

</style>