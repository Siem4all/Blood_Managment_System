<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	<section class="content">
	  <div class="col-md-7 d-flex justify-content-center col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Donor Registration</h3>
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
            <form class="form-horizontal" action="<?php echo base_url('donor/donor/store') ?>" method="post">
              <div class="box-body">
                <div class="row form-group">
                  <label for="name" class="col-sm-3 control-label">Emial:</label>
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
                  <label for="work" class="col-sm-3 control-label">Work:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="work" placeholder="Work" name="work">
                  </div>
                </div>
				  
                <div class="form-group">
                  <label for="disease" class="col-sm-3 control-label">Health status:</label>
					<div class="col-sm-9">
          <input list="ice-cream-flavors" id="ice-cream-choice" name="health" class="form-control" />

                 <datalist id="ice-cream-flavors">
				  <option value="nothing">
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
                  <label for="wieght" class="col-sm-3 control-label">Wieght(kg):</label>

                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="wieght" placeholder="Wieght" name="wieght" min="45">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Date appointed:</label>

                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="wieght" placeholder="date " name="date">
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