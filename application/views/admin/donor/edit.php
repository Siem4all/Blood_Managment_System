<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
		<?php if($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" id="alert-success">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update donor and donate blood here</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
				<?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
			  
			  <?php  
             foreach ($donors as $row)  
               {  
                ?>
            <form class="form-horizontal" action="<?php echo base_url('admin/donor/update/'.$row->donor_id) ?>" method="post">
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
          <input list="ice-cream-flavors" id="ice-cream-choice" value="<?php echo $row->health_status;?>" name="health" class="form-control" />

                 <datalist id="ice-cream-flavors">
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
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Blood Pressure:</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->b_pressure;?>" name="pressure">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Repiratory rate:</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->r_rate;?>" name="rate">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Pulse:</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->pulse;?>" name="pulse">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Temprature:</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" value="<?php echo $row->temp;?>" name="temp">
                  </div>
                </div>
				  
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-3">
                <button type="submit" class="btn btn-primary">Update</button>
				<a href="<?php echo base_url('admin/blood/create/'.$row->donor_id); ?>" class="btn btn-success col-md-offset-6">Add Blood</a>
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