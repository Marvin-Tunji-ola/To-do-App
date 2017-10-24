
    <nav class="navbar navbar-default " role="navigation">
        <a class="navbar-brand" href="#">To-Do</a>
        <ul class="nav navbar-nav">

        @if(Auth::check())
            <li class="active">
                <a><i>Welcome {{Auth::user()->name}}</i></a>
            </li>
        
            <li>
                <a class="" href="logout">Logout</a>
            </li>
        @else
            <li>
                <a  href="login">Login</a>
            </li>
            <li>
                <a  href="register">Register</a>
            </li>
        @endif
            
        </ul>
    </nav>

