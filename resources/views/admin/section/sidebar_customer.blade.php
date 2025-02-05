<div id="sidebar_right">


    <div class="accordionWrapper box_shdow">



        {{--  <div class="accordionItem ">
            <a href="{{ route("utask.index") }}" class="{{(Route::currentRouteName()=='utask.index')?'mactive':''}}">
                <i class="fa-solid fa-globe"></i>
                دامنه های من
            </a>
        </div>

  --}}




        {{-- <a href="{{ route("advertiser.bank.info") }}" class="{{(Route::currentRouteName()=='advertiser.bank.info')?'mactive':''}}">
        <svg fill="#000000" stroke-width="2" width="30px" height="30px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
            <path d="M512 277.333c-58.974 0-106.667 47.693-106.667 106.667 0 11.782-9.551 21.333-21.333 21.333s-21.333-9.551-21.333-21.333c0-82.538 66.795-149.333 149.333-149.333S661.333 301.463 661.333 384c0 75.294-55.586 137.489-128 147.823V640c0 11.78-9.553 21.333-21.333 21.333S490.667 651.78 490.667 640V512c0-11.78 9.553-21.333 21.333-21.333 58.974 0 106.667-47.693 106.667-106.667S570.974 277.333 512 277.333zm0 506.454c23.565 0 42.667-19.102 42.667-42.667S535.565 698.453 512 698.453s-42.667 19.102-42.667 42.667 19.102 42.667 42.667 42.667z"></path>
            <path d="M512 85.333C276.358 85.333 85.333 276.358 85.333 512c0 235.639 191.025 426.667 426.667 426.667 235.639 0 426.667-191.027 426.667-426.667C938.667 276.358 747.64 85.333 512 85.333zM128 512c0-212.077 171.923-384 384-384 212.079 0 384 171.923 384 384 0 212.079-171.921 384-384 384-212.077 0-384-171.921-384-384z"></path>
        </svg>
        اطلاعات حساب بانکی
        </a> --}}










        <div class="accordionItem ">
            <a href="{{ route("logout") }}">
                <i class="fa-solid fa-right-from-bracket"></i>

                خروج از حساب</a>
        </div>
    </div>
    <div class="clear"></div>
    <script type="text/javascript">
        var accItem = document.getElementsByClassName('accordionItem');
        var accHD = document.getElementsByClassName('accordionItemHeading');
        for (i = 0; i < accHD.length; i++) {
            accHD[i].addEventListener('click', toggleItem, false);
        }

        function toggleItem() {
            var itemClass = this.parentNode.className;
            for (i = 0; i < accItem.length; i++) {
                accItem[i].className = 'accordionItem close';
            }
            if (itemClass == 'accordionItem close') {
                this.parentNode.className = 'accordionItem open';
            }
        }

    </script>
</div>
