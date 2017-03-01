<!doctype html>
<html>
  <?php $this->load->view('partial/header'); ?>
  <style media="screen">
    #message {
      color: red;
      font-size: 18px;

    }
  </style>
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
            <a class="navbar-brand" href="<?php echo site_url('projects/index'); ?>">CI ToDo</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo site_url('projects/index'); ?>">Home <span class="sr-only">(current)</span></a></li>
              <li class="dropdown">
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
          <div class="col col-sm-12 text-center">
            <h1>Assignment 3 using CodeIgniter by Kaiser Ahmed</h1> <hr><br>
            <h2 style="text-align:left;">Projects List</h2>
          </div>
        </div>

        <div class="row" style="margin-bottom: 10px">
              <div class="col-md-4">
                  <?php echo anchor(site_url('projects/create'),'Create', 'class="btn btn-primary"'); ?>
              </div>
              <div class="col-md-4 text-center">
                  <div style="margin-top: 8px" id="message">
                      <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                  </div>
              </div>
              <div class="col-md-4 text-right">
              </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered" style="margin-bottom: 10px">
                  <tr>
                      <th>ID</th>
                  		<th>Name</th>
                  		<th>Description</th>
                  		<th>Action</th>
                              </tr><?php
                              foreach ($projects_data as $projects)
                              {
                                  ?>
                                  <tr>
                  			<td width="80px"><?php echo $projects->id ?></td>
                  			<td><?php echo $projects->name ?></td>
                  			<td><?php echo $projects->description ?></td>
                  			<td style="text-align:center" width="200px">
                          <a class="btn btn-warning" href="<?php echo site_url('projects/read/'.$projects->id); ?>"><em class="fa fa-hand-o-up"></em></a>
                          <a class="btn btn-success" href="<?php echo site_url('projects/update/'.$projects->id); ?>"><em class="fa fa-pencil"></em></a>
                          <a class="btn btn-danger" href="<?php echo site_url('projects/delete/'.$projects->id); ?>" onclick="javasciprt: return confirm('Are you sure to delete this project?')"><em class="fa fa-trash"></em></a>
                  			</td>
                  	</tr>
                  <?php
                  }
                  ?>
              </table>
            </div>
          </div>

        <?php $this->load->view('partial/copy_right'); ?>

      </div>

      <?php $this->load->view('partial/footer'); ?>
    </body>
</html>
