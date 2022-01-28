<x-other>
    <x-slot name="other_head">
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="event.preventDefault();
                this.closest('form').submit();">
                    Logout?
                </a>
            </form>
        </div>
    </x-slot>

    <form class="login100-form validate-form">
        <div class="login100-form-logo">
            <div class="image">
                <img src="../../assets/images/user/lougb3.png" alt="User">
            </div>
        </div>
        <span class="login100-form-title p-b-34 p-t-27">
            @ougoudoro
        </span>
        <div class="text-center">
            <p class="txt1 p-b-20">
                Locked
            </p>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="text" name="pass">
            <span class="focus-input100"></span>
            <span class="label-input100">Password</span>
        </div>
        <div class="container-login100-form-btn p-t-30">
            <button class="login100-form-btn">
                Login
            </button>
        </div>

    </form>
</x-other>
