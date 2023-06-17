<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			  <?php if($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
				<?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
			
             
            <form class="form-horizontal" action="<?php echo base_url('admin/user/change_psw/'.$user_id) ?>" method="post">
              <div class="box-body">
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Old Password:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="oldpass" required>
                  </div>
                </div>
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">New Password:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="newpass" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="work" class="col-sm-3 control-label"> Confirm password:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="passconf" required>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-5">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
			   
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          <!-- /.box -->
        </div>
        </section>

  </div>