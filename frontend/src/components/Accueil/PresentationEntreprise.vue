<!-- eslint-disable vue/no-parsing-error -->
<template>
    <div class="container1">
        <div class="site-container">
            <div class="space-y-2">
                <p>Bienvenue à</p>
                <h1>MOA & M. Charafi</h1>
                <h4>Moroccan Office of Architecture & Architecte DENA</h4>
            </div>
            <div class="row">
                <router-link to="/types-des-experiences"><span class="border-none" href="">Voir les experiences <span
                            class="ml-2 text-[20px]">&#x27f6</span></span></router-link>
            </div>


        </div>
    </div>
</template>


<style scoped lang="scss">
@import url('https://fonts.cdnfonts.com/css/tw-cen-mt-std');

*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    outline: none;
}

.container1 {
    text-align: left;
    position: relative;
    width: 100%;
    height: 89vh;
    padding: 0 8%;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, .1)), url('@/assets/pres2.jpg');
    background-size: cover;
    background-position: center;
}

.site-container {
    position: absolute;
    bottom: 15%;
    color: #fff;

    p {
        font-size: 45px;
        font-weight: bold
    }

    h1 {
        font-size: 120px;
        line-height: 120px;
        margin-left: -5px;
        font-weight: 900;
        color: transparent;
        -webkit-text-stroke: 1px #fff;
        background: url('@/assets/pattern.png');
        -webkit-background-clip: text;
        background-position: 0 0;
        animation: animite 10s linear 2s infinite alternate;
    }

    @keyframes animite {
        100% {
            background-position: -50px;
        }
    }

    h4 {
        font-size: 25px;
        color: rgb(197, 196, 196);
        font-weight: 200;
    }

    .row {
        display: flex;
        justify-content: start;
        flex-wrap: wrap;
        margin-top: 40px;

        a, router-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 0;
            text-decoration: none;
            color: #fff;
            border: 3px solid #fff;
            margin-right: 40px;
            font-size: 18px;
            transition: 0.4s;
            width: 24%;
            
        }

        a:hover,router-link:hover {
            border-radius: 15px;

        }

        
    }




}
</style>