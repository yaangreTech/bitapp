<x-other>
    <x-slot name="other_head">
        <div>
            {{-- <a  onclick="location.href='/'" style="cursor: pointer;">
               Logout?
            </a> --}}
        </div>
    </x-slot>

    <div class="login100-form">
        <span class="error-header p-b-45">
            500
        </span>
        <span class="error-subheader p-b-5">
            SERVER SIDE ERROR
        </span>
        <span class="error-subheader2 p-b-5">
            Please verify your data and try again or contact the developpers!!!
        </span>
        <div class="container-login100-form-btn p-t-30	">
            <button class="login100-form-btn" onclick="location.href='javascript:history.back()'">
                Go back</button>
            </button>
        </div>
        <div class="w-full p-t-15 p-b-15 text-center">
            <div>
                {{-- <a href="#" class="txt1">
                    Need Help?
                </a> --}}
            </div>
        </div>
    </div>


</x-other>
