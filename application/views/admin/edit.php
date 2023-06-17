<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Role Assignment</h3>
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
            <form class="form-horizontal" action="<?php echo base_url('admin/account/update/'.$row->user_id) ?>" method="post">
              <div class="box-body">
				  
                <div class="col-sm-12">
                    <input type="hidden" class="form-control" value="<?php echo $row->user_id;?>" name="id" readonly>
                  </div>
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">First name:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->fname;?>" name="fname" readonly>
                  </div>
                </div>
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Last name:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->lname;?>" name="lname" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="work" class="col-sm-3 control-label"> mobile:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->mobile;?>" name="mobile" readonly>
                  </div>
                </div>
				  
				   <div class="form-group">
                  <label for="work" class="col-sm-3 control-label"> Assign Role:</label>

                  <div class="col-sm-9">
					  <select class="form-control"  name="at">
					  <option>admin</option>
					<option>hospital</option>
				    <option>donor</option>
					<option>inventory manager</option>
					<option>nurse</option>
				  <option>lab technician</option>
				<option>blocked</option>
					  </select>
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