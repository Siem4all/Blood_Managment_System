<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Hospital Registration</h3>
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
            <form class="form-horizontal" action="<?php echo base_url('inventory/hospital/store') ?>" method="post">
              <div class="box-body">
                <div class="row form-group">
                  <label for="name" class="col-sm-3 control-label">Staff Email:</label>
                  <div class="col-sm-9">  	  
					  
		 <input list="browsers" id="myBrowser" name="emaill" class="form-control"/>
<datalist id="browsers">
  <?php  
             foreach ($user as $row)  
               {  
                ?>
	<option value="<?php echo $row->email;?>">					
			 <?php }  
                        ?>
  
</datalist>
					  
                  </div>
                </div>  
				  
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Hospital name:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="work" placeholder="Name..." name="name">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Hospital Region:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="wieght" placeholder="benishangul" name="region">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Hospital Wereda:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="wieght" placeholder="wereda" name="wereda">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Hospital City:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="wieght" placeholder="city" name="city">
                  </div>
                </div>
				  		  
				 <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Hospital Phone:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="wieght" value="+251" name="phone">
                  </div>
                </div> 
				  
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-5">
                <button type="submit" class="btn btn-primary">Submit</button>
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