

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
              <h3 class="box-title">Donor Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<input id="myInput" type="text" placeholder="Search..">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
			     <th>#</th>
                  <th>Fname</th>
                  <th>Lname</th>
                  <th>Age</th>
                  <th>Sex</th>
				  <th>Mobile</th>
                  <th>address</th>
				  <th>Health Status</th>
				<th>wieght</th>
				<th>date appointed</th>
					<th>Status</th>
                </tr>
                </thead>
                <tbody id="myTable">
					<?php  
					if( !empty($donors) ) {
             foreach ($donors as $key => $row)  
               {  
                ?>			 
                <tr>
				<td><?php echo ++$key;?></td>
					<td><?php echo $row->fname;?></td>
					<td><?php echo $row->lname;?></td>
					<td><?php echo $row->age;?></td>
					<td><?php echo $row->sex;?></td>
					<td><?php echo $row->mobile;?></td>
					<td><?php echo $row->address;?>
					<td><?php echo $row->health_status;?></td>
                  <td><?php echo $row->wieght;?></td>
				<td><?php echo $row->date;?></td>
				<td><?php echo $row->status;?></td>
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
  
