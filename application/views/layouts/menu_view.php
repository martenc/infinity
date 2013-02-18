<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="#">Infinity</a>
      <div class="nav-collapse collapse">
        <p class="navbar-text pull-right"><?php echo anchor('users/logout', 'Logout'); ?></p>
        <ul class="nav">
          <li><?php echo anchor('users/profile', 'Dashboard'); ?></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Projects<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?php echo anchor('project/view', 'View Projects'); ?></li>
              <li><?php echo anchor('project/create', 'Add Projects'); ?></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>