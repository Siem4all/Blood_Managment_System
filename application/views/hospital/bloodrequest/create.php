<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Blood Request</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
				<?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
            <form class="form-horizontal" action="<?php echo base_url('hospital/bloodRequest/store') ?>" method="post">
              <div class="box-body">  
				  
				<div class="row form-group">
                  <label for="name" class="col-sm-3 control-label">Hospital Name:</label>
                  <div class="col-sm-9">  	  
					  
		 <input list="browsers" id="myBrowser" name="hospital" class="form-control"/>
<datalist id="browsers">
  <?php  
             foreach ($hospital as $row)  
               {  
                ?>
	<option value="<?php echo $row->h_name;?>">					
			 <?php }  
                        ?>
  
</datalist>
					  
                  </div>
                </div> 
				  <div class="row form-group">
                  <label for="name" class="col-sm-3 control-label">Blood Type:</label>
                  <div class="col-sm-9">  	  
					  
		 <select class="form-control" name="blood">
		<option>--select--</option>
		<option>A+</option>
		<option>A-</option>
		<option>B+</option>
		<option>B-</option>
	  <option>AB+</option>
		<option>AB-</option>
		<option>O+</option>
		<option>O-</option>
					  </select>
					  
                  </div>
                </div>

				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Unit(ml):</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" placeholder="unit" name="unit">
                  </div>
                </div>	
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Reason:</label>

                  <div class="col-sm-9">
               <textarea id="form7" class="md-textarea form-control" rows="3" name="reason"></textarea>
                  </div>
                </div>
				  
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-5">
                <button type="submit" class="btn btn-primary">Send</button>
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