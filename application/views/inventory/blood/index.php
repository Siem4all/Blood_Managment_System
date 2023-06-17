

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
              <h3 class="box-title">Blood Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<input id="myInput" type="text" placeholder="Search..">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
			     <th>#</th>
                  <th>Blood</th>
                  <th>Disease</th>
                  <th>WBC</th>
                  <th>RBC</th>
				  <th>Platelet</th>
                  <th>Unit(ml)</th>
				  <th>Recieved Date</th>
				<th>Expiration Date</th>
				<th>Status</th>
			  <th scope="col" colspan = 3>Action</th>
                </tr>
                </thead>
                <tbody id="myTable">
					<?php  
					if( !empty($blood) ) {
             foreach ($blood as $key => $row)  
               {  
                ?>			 
                <tr>
				<td><?php echo ++$key;?></td>
					<td><?php echo $row->blood_type;?></td>
					<td><?php echo $row->disease;?></td>
					<td><?php echo $row->wbc_count;?></td>
					<td><?php echo $row->rbc_count;?></td>
					<td><?php echo $row->platelet_count;?></td>
					<td><?php echo $row->unit;?>
					<td><?php echo $row->recieved_date;?></td>
                  <td><?php echo $row->expiration_date;?></td>
				<td><?php echo $row->status;?></td>
					 <td>
                <a href="<?php echo base_url('inventory/blood/edit/'.$row->blood_id); ?>" class="btn btn-primary">Edit</a>
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
  
