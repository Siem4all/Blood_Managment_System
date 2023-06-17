

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
              <h3 class="box-title">Blood Request Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<input id="myInput" type="text" placeholder="Search..">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
			     <th>#</th>
                  <th>hospital Name</th>
                  <th>Bloodtype</th>
                  <th>unit(ml)</th>
				<th>reason</th>
                  <th>Requested Date</th>
			  <th scope="col" colspan = 3>Action</th>
                </tr>
                </thead>
                <tbody id="myTable">
					<?php  
					if( !empty($request) ) {
             foreach ($request as $key => $row)  
               {  
                ?>			 
                <tr>
				<td><?php echo ++$key;?></td>
					<td><?php echo $row->h_name;?></td>
					<td><?php echo $row->blood_type;?></td>
					<td><?php echo $row->unit;?>
					<td><?php echo $row->reason;?>
					<td><?php echo $row->requested_date;?></td>
				<td><?php echo $row->status;?></td>
					 <td>
       
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
  
