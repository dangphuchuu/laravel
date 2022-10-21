<nav class="navbar header-navbar pcoded-header" style="padding-top: 0rem; padding-bottom: 0rem;">
    <div class="navbar-wrapper">
        <div class="navbar-logo">

            <a href="/admin">
                <img class="img-fluid" src="upload/admin/logo.png" alt="Theme-Logo" />
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu icon-toggle-right"></i>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">

                        @if (Auth::check())
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="upload/avatar/{!! Auth::user()->image !!}" class="img-radius" alt="User-Profile-Image">
                            <span> {{ Auth::user()->name }}</span>
                            <!-- <i class="feather icon-chevron-down"></i> -->
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="admin/profile">
                                    <i class="feather icon-user"></i> @lang('lang.profile')
                                </a>
                            </li>
                            <li>
                                <a href="admin/logout">
                                    <i class="feather icon-log-out"></i> @lang('lang.logout')
                                </a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </li>
            </ul>
            <ul class="nav-right">
                <div class="dropDown">
                    <div class="dropDown_box">
                        <span class="seLect" >@lang('lang.lang')</span </div>
                        <ul class="list_dropdow_menu">
                            <!-- <li class="active">Tiếng Việt</li>
                        <li>Tiếng Anh</li> -->
                            <li><a href="lang/en">@lang('lang.en')</a>
                                <img src="upload/admin/united-states.png" alt="">
                            </li>

                            <li><a href="lang/vi">@lang('lang.vi')</a> 
                            <img src="upload/admin/vietnam.png" alt="">
                            </li>
                            
                        </ul>
                    </div>
            </ul>

        </div>
    </div>
</nav>

<script>
    var dropDownBox = document.querySelector('.dropDown_box');
    var listMenu = document.querySelector('.list_dropdow_menu');
    var options = document.querySelectorAll('.list_dropdow_menu li');
    var seLect = document.querySelector('.seLect');


    dropDownBox.addEventListener('click', () => {
        listMenu.classList.toggle('openAc');
    })

    // options.forEach(
    //     option => {
    //         option.addEventListener('click', () => {
    //             seLect.innerHTML = option.innerHTML;

    //             options.forEach(option => {
    //                 option.classList.remove('active')
    //             })
    //             option.classList.add('active')
    //         })
    //     }
    // )
</script>