<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content -->
	 <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content --><?php  
             foreach ($stock as $key => $row)  
               {  
                ?>	
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>A+</h3>

              <p><?php echo $row->Ap;?></p>
            </div>
            <div class="icon">
              <span class="iconify" data-icon="healthicons:blood-a-p"></span>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>A-</h3>

              <p><?php echo $row->An;?></p>
            </div>
            <div class="icon">
      <span class="iconify" data-icon="healthicons:blood-a-n-outline"></span>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>B+</h3>

              <p><?php echo $row->Bp;?></p>
            </div>
            <div class="icon">
              <span class="iconify" data-icon="healthicons:blood-b-p"></span>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>B-</h3>

              <p><?php echo $row->Bn;?></p>
            </div>
            <div class="icon">
      <span class="iconify" data-icon="healthicons:blood-b-n"></span>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
        <!-- right col -->
      <!-- /.row (main row) -->

    </section>
	<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>AB+</h3>

              <p><?php echo $row->ABp;?></p>
            </div>
            <div class="icon">
             <span class="iconify" data-icon="healthicons:blood-ab-p"></span>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>AB-</h3>

              <p><?php echo $row->ABn;?></p>
            </div>
            <div class="icon">
              <span class="iconify" data-icon="healthicons:blood-ab-n"></span>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>O+</h3>

              <p><?php echo $row->Op;?></p>
            </div>
            <div class="icon">
             <span class="iconify" data-icon="healthicons:blood-o-p"></span>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>O-</h3>

              <p><?php echo $row->On;?></p>
            </div>
            <div class="icon">
              <span class="iconify" data-icon="healthicons:blood-o-n"></span>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
        <!-- right col -->
      <!-- /.row (main row) -->

    </section>
	<?php }  
                        ?>
  </div>