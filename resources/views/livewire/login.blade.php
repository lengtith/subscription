<div id="main-wrapper" class="mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6 d-none d-lg-inline-block bg-yellow">
                            <div class="d-flex justify-content-center align-item-center h-100">
                                <div class="content-info">
                                    <div class="pt-5">
                                        <img class="rounded"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTE3AbV0jDJimdNIBvUYMIsssTkXpZ6oZ5HBlJ9E5j0&s"
                                            alt="Cinque Terre" height="50">
                                    </div>

                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Subscription Operation</h4>
                                        <h5 class="text-white mb-4">ដំណើរការធ្វើបរិវិសកម្ម</h5>
                                        <p class="lead text-white">09-22 Mar 2023 / ០៩-២២ មិនា ២០២៣</p>
                                        <img src="https://pelprek.sgp1.digitaloceanspaces.com/banner/18/156152298696483.png"
                                            alt="Cinque Terre" height="80">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin
                                    panel.</p>


                                @if (Session::has('error'))
                                <p class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </p>
                                @endif

                                <form wire:submit.prevent="handleSubmit">

                                    <div class="form-group mb-3 mt-3">
                                        <input type="email" class="form-control py-3" wire:model="email"
                                            placeholder="Email" required>
                                        <span class="text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group mb-3 mt-3">
                                        <input type="password" class="form-control py-3" wire:model="password"
                                            placeholder="Password" required>
                                        <span class="text-danger">
                                            @error('password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <button type="submit" class="btn btn-theme mb-3 mt-3">
                                        <div wire:loading wire:target="handleSubmit">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </div>
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>

<style>
    .bg-yellow {
        background-color: #F8991B;
    }

    .content-info {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        padding: 50px;
        gap: 40px;
    }

    h4,
    h5,
    p {
        font-family: 'Khmer OS Battambang', sans-serif;
    }

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