<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Blood Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
				<?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
			  
			   <?php  
             foreach ($blood as $row)  
               {  
                ?>
            <form class="form-horizontal" action="<?php echo base_url('admin/blood/update/'.$row->blood_id) ?>" method="post">
              <div class="box-body">  
				  
				 
				  <div class="row form-group">
                  <label for="name" class="col-sm-3 control-label">Blood Type:</label>
                  <div class="col-sm-9">  	  
					  
		 <select class="form-control" name="blood">
		<option>---select---</option>
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
                  <label for="work" class="col-sm-3 control-label">Disease:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="work" value="<?php echo $row->disease;?>" name="disease">
                  </div>
                </div> 
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">WBC:</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->wbc_count;?>" name="wbc">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">RBC:</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->rbc_count;?>" name="rbc">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Platelet:</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->platelet_count;?>" name="pc">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Unit(ml):</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->unit;?>" name="unit">
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