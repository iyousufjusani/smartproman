<div class="rightmenu">
    <!-- menu icon-->
    <div id="nav-icon">
        <div class="menu-line white"></div>
        <div class="menu-line1 white"></div>
        <div class="menu-line2 white"></div>
    </div>
    <!-- menu icon end -->
</div>

<section class="whitepage-menu" id="menu-block" aria-label="menu">
    <div class="wrap-menu">

        <div class="wrap-menu-child">
            <nav class="cd-side-navigation">
                <!-- Authentication Links -->
                @guest
                    <ul>
                        <li>
                            <a class="animsition-link actived" data-animsition-out-class="overlay-slide-out-right"
                               href="/">
                                Home
                            </a>
                        </li>
                        <li>
                            <a class="animsition-link" data-animsition-out-class="overlay-slide-out-right"
                               href="/">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="animsition-link" data-animsition-out-class="overlay-slide-out-right"
                               href="/">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a class="animsition-link" data-animsition-out-class="overlay-slide-out-right"
                               href="{{route('login')}}">
                                Sign Up
                            </a>
                        </li>
                    </ul>
                @else
                    <ul>
                        <span class="share_title">Welcome, <b class="color">{{ Auth::user()->name }}</b></span>
                        <br><br><br>
                        <li>
                            <a class="animsition-link" data-animsition-out-class="overlay-slide-out-right"
                               href="account">
                                {{ __('Account') }}
                            </a>
                        </li>
                        <li>
                            <a class="animsition-link" data-animsition-out-class="overlay-slide-out-right"
                               href="scoreboard">
                                {{ __('Scoreboard') }}
                            </a>
                        </li>
                        <li>
                            <a class="animsition-link" data-animsition-out-class="overlay-slide-out-right"
                               href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @endguest
            </nav>
        </div>
        <!--<div class="info">-->
        <!--<span>(+6221) 000 888 999</span>-->
        <!--<a class="link" href="#">support@SmartProMan.com</a>-->
        <!--<span>129 Park street, New York 10903</span>-->
        <!--</div>-->
        <div class="share">
            <span class="share_title">Follow us : </span>
            <ul>
                <li><a class="sharesoc" href="#"><i class="fa fa-facebook-f"></i></a></li>
                <li><a class="sharesoc" href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="sharesoc" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="sharesoc" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</section>


<!-- block-menu -->
<div class="block-main"></div>
<!-- block-menu end-->