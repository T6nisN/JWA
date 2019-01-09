<?php include('header.php');?>
<body>
<div class="main-wrapper">

	 <nav class="navbar jwa-navbar">
      <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">JWA</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li ><a href="/test">Test</a></li>
  		      <li class="active"><a href="/my-table">My Window</span></a></li>
  		      <li><a href="/profile">Profile</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/logout">Log Out</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="col-md-12">
      <div class="page-header">
        <h3>My Johar Window</h3>
      </div>
      <table border="1" class="my-johar-table">
        <tr>
          <th><span>Arena</span></th>
          <th><span>Blind spot</span></th>
        </tr>
        <tr>
          <td> <?php getMyArena() ?> </td>
          <td> <?php getMyBlindSpot() ?> </td>
        </tr>
        <tr>
          <th><span>Facade</span></th>
          <th><span>Unknown</span></th>
        </tr>
        <tr>
          <td> <?php getMyFacade() ?> </td>
          <td> <?php getMyUnknownAdjectives() ?> </td>
        </tr>
      </table>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</div>
<?php include('footer.php');?>
</body>
</html>
