<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User message</h3>
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
             foreach ($messages as $row)  
               {  
                ?>
            <form class="form-horizontal" action="" method="post">
              <div class="box-body">
				  
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Subject:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $row->subject;?>" name="fname" readonly>
                  </div>
                </div>
				  <div class="form-group purple-border">
                <label for="work" class="col-sm-3 control-label">Message:</label>
                    <div class="col-sm-9">
					   <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" readonly>
					  <?php echo $row->message;?>
					  </textarea></div>
                        </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-9">
               <a href="<?php echo base_url('inventory/user/message'); ?>" class="btn bg-success">back</a>
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