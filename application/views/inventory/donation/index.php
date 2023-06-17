

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Donation History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
															<input id="myInput" type="text" placeholder="Search..">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
			     <th>#</th>
                  <th>Fname</th>
                  <th>Lname</th>
                  <th>Age</th>
                  <th>Sex</th>
				  <th>Mobile</th>
                  <th>Address</th>
				<th>Blood</th>
				  <th>Health_status</th>
				<th>Wieght</th>
				<th>Unit</th>
				<th>Exp. Date</th>
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
					</td><td><?php echo $row->blood_type;?></td>
					<td><?php echo $row->health_status;?></td>
                  <td><?php echo $row->wieght;?></td>
                 <td><?php echo $row->unit;?></td>
				<td><?php echo $row->expiration_date;?></td>
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
  
