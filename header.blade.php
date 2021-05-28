<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/">
        <img src="https://www.amberusa.com/wp-content/uploads/2019/09/amber-diagnostics-logo-est-1994.png" alt="Amber Diagnostics">
    </a>
    <button id="mobile-nav-toggler" type="button">
        <span class="mobile-nav-toggler-icon"><i class="fas fa-bars fa-lg"></i></span>
    </button>
    <div id="mobile-nav-content" class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
                    <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/create">Add New Job</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jobs">Edit Job</a>
            </li>
        </ul>
    </div>
    <div>
    <form action="/search" method="POST" role="search">
    {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search jobs"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    </div>
</nav>
