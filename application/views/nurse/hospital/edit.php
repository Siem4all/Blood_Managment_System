<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update hospital </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
				<?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
			  
			  <?php  
             foreach ($hospital as $row)  
               {  
                ?>
            <form class="form-horizontal" action="<?php echo base_url('nurse/hospital/update/'.$row->h_id) ?>" method="post">
              <div class="box-body">  
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Staff Email:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="work" placeholder="this is optional" name="email">
                  </div>
                </div>
				  
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Hospital name:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="work" value="<?php echo $row->h_name;?>" name="name">
                  </div>
                </div>
				   <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Hospital Region:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="wieght" value="<?php echo $row->region;?>" name="region">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Hospital wereda:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="wieght" value="<?php echo $row->wereda;?>" name="wereda">
                  </div>
                </div>
				   <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Hospital City:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="wieght" value="<?php echo $row->city;?>" name="city">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="phone" class="col-sm-3 control-label">Hospital phone:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  value="<?php echo $row->h_phone;?>" name="phone">
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