<!doctype html>
<html>
    <head>
      <?php $this->load->view('partial/header'); ?>
    </head>
    <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo site_url('projects/index'); ?>">ToDo</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li ><a href="<?php echo site_url('projects/index'); ?>">Home <span class="sr-only">(current)</span></a></li>
              <li class="dropdown active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('projects/index'); ?>">View Projects</a></li>
                  <li><a href="<?php echo site_url('projects/create'); ?>">Add Project</a></li>
                </ul>
              </li>
              <li><a href="#">Tasks </a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Account</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
      </nav>

      <div class="container">
        <div class="row">
          <div class="col col-sm-12">
            <h2 style="margin-top:0px"> Read a Project</h2>
          </div>
        </div>
        <div class="row">
          <div class="col col-sm-12">
            <table class="table table-bordered">
                <tr><td>Name</td><td><?php echo $name; ?></td></tr>
                <tr><td>Description</td><td><?php echo $description; ?></td></tr>
                <tr><td></td><td><a href="<?php echo site_url('projects') ?>" class="btn btn-warning">Cancel</a></td></tr>
            </table>
          </div>
        </div>
      </div>



        <?php $this->load->view('partial/footer'); ?>
    </body>
</html>
