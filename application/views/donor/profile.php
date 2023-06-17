<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change you Profile</h3>
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
			  <?php  
             foreach ($users as $row)  
               {  
                ?>
            <form class="form-horizontal" action="<?php echo base_url('donor/account/updateprofile/'.$row->user_id) ?>" method="post">
              <div class="box-body">
				  
                <div class="col-sm-12">
                    <input type="hidden" class="form-control" value="<?php echo $row->user_id;?>" name="id" readonly>
                  </div>
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">First name:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->fname;?>" name="fname" required>
                  </div>
                </div>
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Last name:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->lname;?>" name="lname" requierd>
                  </div>
                </div>
                <div class="form-group">
                  <label for="work" class="col-sm-3 control-label"> mobile:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->mobile;?>" name="mobile" required>
                  </div>
                </div>
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label"> address:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->address;?>" name="address" required>
                  </div>
                </div>
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label"> email:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->email;?>" name="email" required>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-5">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
			   <?php }  
                        ?>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          <!-- /.box -->
        </div>
        </section>

  </div>