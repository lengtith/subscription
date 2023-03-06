@extends('layouts.master')

@section('content')
<div id="main-wrapper" class="mt-5">
    <div class="row justify-content-center">
            <div class="card border-0 text-center" style="width:600px">
                <img class="card-img-top m-auto mb-4" style="width: 400px" src="https://img.freepik.com/premium-vector/online-registration-sign-up-login-account-smartphone-app-user-interface-with-secure-password-mobile-application-ui-web-banner-access-cartoon-people-vector-illustration_2175-1060.jpg" alt="Card image">
                <div class="card-body">
                    <h3 class="card-title text-center">Thanks for signing up!</h3>
                    <p class="card-text text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis voluptatibus exercitationem pariatur excepturi! Vero distinctio eligendi sunt nihil itaque.</p>
                </div>
            </div>

        <!-- end col -->
    </div>
    <!-- Row -->
</div>

<style>
    .account-block {
    padding: 0;
    background-image: url(https://bootdey.com/img/Content/bg1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    position: relative;
    }
    .account-block .overlay {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.4);
    }
    .account-block .account-testimonial {
        text-align: center;
        color: #fff;
        position: absolute;
        margin: 0 auto;
        padding: 0 1.75rem;
        bottom: 3rem;
        left: 0;
        right: 0;
    }

    .text-theme {
        color: #5369f8 !important;
    }

    .btn-theme {
        background-color: #5369f8;
        border-color: #5369f8;
        color: #fff;
    }
</style>
@endsection
