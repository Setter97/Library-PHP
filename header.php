<?php
if(!isset($_COOKIE['idCliente'])){setcookie('idCliente',2);};
if($_COOKIE['idCliente']==0){
    echo '<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="http://localhost:8888/php/Library/">
            <img src="img/logo.png" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>


                <form class="form-inline" action="db_select_book.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                
                <li>&nbsp;&nbsp;</li>
                <li class="nav-item"><a class="nav-link text-white" href="http://localhost:8888/php/Library/html_insert_book.php?">Insert book</a></li>

                <li class="nav-item"><a class="nav-link text-white" href="http://localhost:8888/php/Library/html_create_member.php?">Create user</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        You
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="http://localhost:8888/php/Library/html_borrowsList.php">Borrows</a>
                        <a class="dropdown-item" href="http://localhost:8888/php/Library/html_historyBorrows.php">History</a>
                        <a class="dropdown-item" href="http://localhost:8888/php/Library/html_update_member.php">Configuration</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://localhost:8888/php/Library/signOut.php">Sign out</a>
                    </div>
                </li>
                
            </ul>
        </div>
    </nav>

</header>
<br><br><br>';

}else if($_COOKIE['idCliente']==1){
    echo '<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="http://localhost:8888/php/Library/">
            <img src="img/logo.png" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>


                <form class="form-inline" action="db_select_book.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                
                <li>&nbsp;&nbsp;</li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        You
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="http://localhost:8888/php/Library/html_borrowsList.php">Borrows</a>
                        <a class="dropdown-item" href="http://localhost:8888/php/Library/html_historyBorrows.php">History</a>
                        <a class="dropdown-item" href="http://localhost:8888/php/Library/html_update_member.php">Configuration</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://localhost:8888/php/Library/signOut.php">Sign out</a>
                    </div>
                </li>
                
            </ul>
        </div>
    </nav>

</header>
<br><br><br>';
}else{
    echo '<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="http://localhost:8888/php/Library/">
            <img src="img/logo.png" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>


                <form class="form-inline" action="db_select_book.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                
                <li>&nbsp;&nbsp;</li>
            

                <li class="nav-item"><a class="nav-link text-white" href="http://localhost:8888/php/Library/signIn.php">Sign in</a></li>

            
                
            </ul>
        </div>
    </nav>

</header>
<br><br><br>';
}
    
