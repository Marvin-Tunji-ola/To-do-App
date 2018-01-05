
    <nav class="navbar navbar-default " role="navigation">
        <a class="navbar-brand" href="#">To-Do</a>

        @if(Auth::check())
        <ul class="pull-right nav navbar-nav">
            <li class="">
                <a><i>Welcome {{Auth::user()->name}}</i></a>
            </li>
        
            <li>
                <a class="" href="logout">Logout</a>
            </li>
        </ul>
        @else
       
        <ul class="nav navbar-nav">
            <li>
                <a  href="login">Login</a>
            </li>
            <li>
                <a  href="register">Register</a>
            </li>
        @endif
            
        </ul>
    </nav>

