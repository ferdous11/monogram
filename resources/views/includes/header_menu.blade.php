<nav class = "navbar navbar-default">
    <div class = "container">
        <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse"
                    data-target = "#bs-example-navbar-collapse-1" aria-expanded = "false">
                <span class = "sr-only">Toggle navigation</span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
            </button>
            <a class = "navbar-brand" href = "{{url('/')}}">{{ env('APPLICATION_NAME') }}</a>
        </div>

        <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav navbar-right">
                <li><a href = "{{url('logout')}}"><i class = "fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>