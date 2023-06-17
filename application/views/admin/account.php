

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Table</h3>
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
                  <th>address</th>
				  <th>email</th>
					<th>mobile</th>
					<th>Account Type</th>
					  <th scope="col" colspan = 1>Action</th>
                </tr>
                </thead>
                <tbody id="myTable">
					<?php  
             foreach ($users as $key => $row)  
               {  
                ?>			 
                <tr>
				<td><?php echo ++$key;?></td>
                  <td><?php echo $row->fname;?></td>
                  <td><?php echo $row->lname;?></td>
                  <td><?php echo $row->age;?></td>
                  <td><?php echo $row->sex;?></td>
				<td><?php echo $row->address;?></td>
                  <td><?php echo $row->email;?></td>
					<td><?php echo $row->mobile;?></td>
				<td><?php echo $row->account_type;?></td>
					 <td>
                <a href="<?php echo base_url('admin/account/edit/'.$row->user_id); ?>" class="btn btn-primary">Edit</a>
            </td>
                </tr>
		<?php }  
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
  
