<header class="masthead text-white text-center" style="height: calc(100vh - 56px)">
    
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Start subscription with us today!</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <button wire:click="create" type="submit" class="btn btn-block btn-lg btn-primary">Get Start!</button>
            </div>
        </div>
    </div>
</header>

<style>
    header.masthead {
        position: relative;
        background-color: #222222;
        background: url("https://assets.weforum.org/article/image/p7lEvvp4IMYXzQpuI68cncPWQ6gNySWsRSiNIKgJSwg.jpg") no-repeat center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        padding-top: 8rem;
        padding-bottom: 8rem;
    }

    header.masthead .overlay {
        position: absolute;
        background-color: #0011ff;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        opacity: 0.3;
    }

    header.masthead h1 {
        font-size: 2rem;
    }

    @media (min-width: 768px) {
        header.masthead {
            padding-top: 12rem;
            padding-bottom: 12rem;
        }

        header.masthead h1 {
            font-size: 3rem;
        }
    }
</style>