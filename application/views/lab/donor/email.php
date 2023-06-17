<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Email here</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
				<?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
			  
			  <?php  
             foreach ($donors as $key =>$row)  
               {  
                ?>
            <form class="form-horizontal" action="<?php echo base_url('lab/donor/edit/'.$row->donor_id) ?>" method="post">
              <div class="box-body">  
				  
				  <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Work:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="work" value="<?php echo $row->work;?>" name="work">
                  </div>
                </div>
				  
                <div class="form-group">
                  <label for="disease" class="col-sm-3 control-label">Health status:</label>
					<div class="col-sm-9">
          <input list="ice-cream-flavors" id="ice-cream-choice" name="health" class="form-control" />

                 <datalist id="ice-cream-flavors">
					 <option value="<?php echo $row->health_status;?>">
				  <option value="Nothing">
                   <option value="Hypertension">
                   <option value="Cold">
                   <option value="Flu">
                   <option value="Sore throat">
                   <option value="Cardiac arrest">
					<option value="Pregnant">
					<option value="breastfeeding">
                     </datalist>
                </div>
				  </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Wieght:</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->wieght;?>" name="wieght">
                  </div>
                </div>
				  <div class="row form-group">
                  <label for="name" class="col-sm-3 control-label">Blood Group:</label>
                  <div class="col-sm-9">  	  
					  
		 <select class="form-control" name="blood">
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
				  
				  
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-5">
                <button type="submit" class="btn btn-primary">Next</button>
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