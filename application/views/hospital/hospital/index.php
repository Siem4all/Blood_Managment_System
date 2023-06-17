

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
              <h3 class="box-title">Hospital Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
											<input id="myInput" type="text" placeholder="Search..">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
			     <th>#</th>
                  <th>User_email</th>
                  <th>Hospital name</th>
				 <th>Region</th>
                  <th>Wereda</th>
                  <th>City</th>
				  <th>Phone</th>
				<th>Date Registered</th>
                </tr>
                </thead>
                <tbody id="myTable">
					<?php  
					if( !empty($hospital) ) {
             foreach ($hospital as $key => $row)  
               {  
                ?>			 
                <tr>
				<td><?php echo ++$key;?></td>
					<td><?php echo $row->email;?></td>
					<td><?php echo $row->h_name;?></td>
                    <td><?php echo $row->region;?></td>
					<td><?php echo $row->wereda;?></td>
					<td><?php echo $row->city;?></td>
					<td><?php echo $row->h_phone;?></td>
					<td><?php echo $row->h_date;?>
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
  
