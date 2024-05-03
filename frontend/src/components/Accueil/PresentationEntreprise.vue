<!-- eslint-disable vue/no-parsing-error -->
<template>
    <div class="container">
        <div class="site-container">
            <div class="space-y-2">
                <p>Bienvenue à</p>
                <h1>MOA & M. Charafi</h1>
                <h4>Moroccan Office of Architecture & Architecte DENA</h4>
            </div>
            <div class="row">
                <a href="#services">Prendre un rendez-vous</a>
                <a href="">Voir les projets <span class="ml-2">&#x27f6</span></a>
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

.container {
    text-align: left;
    position: relative;
    height: 90vh;
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
        color: white;
        -webkit-text-stroke: 1px #fff;
        background: url('@/assets/pattern.png');
        -webkit-background-clip: text;
        background-position: 0 0;
        animation: animite 20s linear 2s infinite alternate;
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

        a {
            display: flex;
            align-items: center;
            padding: 5px 20px;
            text-decoration: none;
            color: #fff;
            border: 3px solid #fff;
            margin-right: 40px;
            font-size: 18px;
            transition: 0.3s;
        }

        a:hover {
            border-radius: 20px;
        }

        span {
            font-size: 20px;
        }
    }




}
</style>