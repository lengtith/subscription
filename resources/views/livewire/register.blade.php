<div id="main-wrapper" class="mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">This beautiful theme yours!</h4>
                                    <p class="lead text-white">"Best investment i made for a long time. Can only
                                        recommend it for other users."</p>
                                    <p>- Admin User</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin
                                    panel.</p>

                                {{-- Error alert --}}
                                @if ($error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                                @endif

                                <form wire:submit.prevent="handleSubmit">

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="name" wire:model="name"
                                            required="required" autofocus>
                                        <label for="name">Name</label>
                                        <span class="text-danger">
                                            @error('name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="email" class="form-control" id="email" wire:model="email" required>
                                        <label for="email">Email</label>
                                        <span class="text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-floating mb-3 mt-3">
                                        <input type="password" class="form-control" id="password" p
                                            wire:model="password" required>
                                        <label for="password">Password</label>
                                        <span class="text-danger">
                                            @error('password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <button type="submit" class="btn btn-theme mb-3 mt-3">Register</button>
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