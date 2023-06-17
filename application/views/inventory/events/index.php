

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
		<?php if($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" id="alert-success">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
				<?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Event Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
															<input id="myInput" type="text" placeholder="Search..">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
			     <th>#</th>
                  <th>Event name</th>
                  <th>Event place</th>
                  <th>Event date</th>
			  <th scope="col" colspan = 3>Action</th>
                </tr>
                </thead>
                <tbody id="myTable">
					<?php  
					if( !empty($events) ) {
             foreach ($events as $key => $row)  
               {  
                ?>			 
                <tr>
				<td><?php echo ++$key;?></td>
					<td><?php echo $row->event_name;?></td>
					<td><?php echo $row->event_place;?></td>
					<td><?php echo $row->event_date;?></td>
					 <td>
                <a href="<?php echo base_url('inventory/event/edit/'.$row->event_id); ?>" class="btn btn-primary">Edit</a>
						 <a href="<?php echo base_url('inventory/event/delete/'.$row->event_id); ?>" class="btn btn-primary">Delete</a>
            </td>
                </tr>
		<?php }  
					?><?php }  
					?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
