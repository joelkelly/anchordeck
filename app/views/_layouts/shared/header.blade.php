<header>
    <div class="site-title"><a href="/">AnchorDeck <div class="sub-title">Mastheads made easy</div></a></div>

   @if(!isset($hideprofile))
       <div class="profile">
            <ul>
            @if($user)
                <li><a href="{{URL::to('/account')}}">Welcome {{$user->first_name}} {{$user->last_name}}</a></li>
                <li><span class="drop-click account-link"><i class="icon-cogs icon-large"></i></span>
                    <div class="dropdown">
                        <ul class="block-list">
                            <li><a href="/account">account home <i class="icon-home icon-large"></i></a></li>
                            <li><a href="/account/logout">sign out <i class="icon-signout icon-large"></i></a></li>
                        </ul>
                    </div>
                </li>
            @else
                <li><a href="{{URL::to('/account/register')}}">create an account</a></li>
                <li>
                    <span class="drop-click sign-in">sign in</span>
                    <div class="dropdown">
                       @include('_layouts.forms.login')
                    </div>
                </li>
            @endif
            </ul>
        </div>
     @endif
</header>
@include('_layouts.shared.console')