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
             foreach ($event as $row)  
               {  
                ?>
            <form class="form-horizontal" action="<?php echo base_url('lab/event/update/'.$row->event_id) ?>" method="post">
              <div class="box-body">  
				   <div class="form-group">
                  <label for="work" class="col-sm-3 control-label">Event name:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="work" value="<?php echo $row->event_name;?>" name="name">
                  </div>
                </div> 
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Event place:</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="wieght" value="<?php echo $row->event_place;?>" name="place">
                  </div>
                </div>
				  <div class="form-group">
                  <label for="wieght" class="col-sm-3 control-label">Event date:</label>

                  <div class="col-sm-9">
                    <input type="datetime-local" class="form-control" id="wieght" value="<?php echo $row->event_date;?>" name="date">
                  </div>
                </div>
			  
              </div>
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-5">
                <button type="submit" class="btn btn-primary">Save</button>
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