<x-other>
    <x-slot name="other_head">
        <div>
            <a  onclick="location.href='/'" style="cursor: pointer;">
               Logout?
            </a>
        </div>
    </x-slot>

    <form class="login100-form validate-form"  method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login100-form-logo">
            <div class="image">
                <img src="assets/images/user/lougb3.png" alt="User">
            </div>
        </div>
        <span class="login100-form-title p-b-34 p-t-27">
            {{-- @ougoudoro --}}
        </span>
        <div class="text-center">
            <p class="txt1 p-b-20">
                Locked
            </p>
        </div>
        <input type="email" name="email" id="email" class='email' required hidden/>
        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input style="border: 0px" class="input100" type="password" name="password">
            <span class="focus-input100"></span>
            <span class="label-input100">Password</span>
        </div>
        <div class="container-login100-form-btn p-t-30">
            <button class="login100-form-btn">
                Unlock
            </button>
        </div>

    </form>

    <script> 
        document.getElementById('email').value=currentActivedb.getItem('user_email');
    </script>
</x-other>
