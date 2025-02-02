<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css"> 
  </head>

  <h1>This is a test</h1>

<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="/one">One</a>
        </li>
        <li>
            <a href="/two">Two</a>
        </li>
        <li>
            <a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle">
                Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li role="separator" class="divider"></li>
            </ul>
        </li>
    </ul>
</div>

</html>
