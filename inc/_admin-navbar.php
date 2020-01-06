<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="img/logos/NoitiGrammiLogo.png" alt="noiti-logo" width="50"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#admin-navbar" aria-controls="admin-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="admin-navbar">

        <ul class="navbar-nav mr-auto ml-auto align-items-center">

            <li class="nav-item">
                <a class="nav-link disabled"><span class="noitigrammi">ΝΟΗΤΗ ΓΡΑΜΜΗ</span></a>

            </li>



            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="/admin">Administration Panel</a>
            </li>

<!--            <li class="nav-item">-->
<!--                <a class="nav-link d-flex align-items-center" href="/dashboard">Dashboard</a>-->
<!--            </li>-->

            <li class="dropdown nav-item">
                <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dashboard
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/dashboard">Productions Page</a>
                    <a class="dropdown-item" href="/links-section">Links</a>
                    <a class="dropdown-item" href="/references-panel">References</a>
                </div>
            </li>
        </ul>


        <form class="form-inline" name="logoutForm" action="" method="post">

            <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="logoutSubmit">Logout</button>
        </form>

        </div>
    </div>
</nav>