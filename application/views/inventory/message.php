

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
              <h3 class="box-title">All Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<input id="myInput" type="text" placeholder="Search..">

              <table id="example1" class="table table-bordered table-striped bg-success">
                <thead class="bg-success">
                <tr>
			     <th>#</th>
                  <th>User name</th>
                  <th>User mobile</th>
				 <th>User email</th>
                  <th>Subject</th>
                  <th>Message</th>
				  <th>Date</th>
					<td>Action</td>
                </tr>
                </thead>
                <tbody id="myTable">
					<?php  
					if( !empty($comments) ) {
             foreach ($comments as $key => $row)  
               {  
                ?>			 
                <tr>
				<td><?php echo ++$key;?></td>
					<td><?php echo $row->fname;?></td>
					<td><?php echo $row->mobile;?></td>
                    <td><?php echo $row->email;?></td>
					<td><?php echo $row->subject;?></td>
					<td><?php echo $row->message;?></td>
					<td><?php echo $row->date;?></td>
					<td> <a href="<?php echo base_url('inventory/message/show/'.$row->contact_id); ?>" class="btn btn-primary">Show</a>
					<a href="<?php echo base_url('inventory/message/delete/'.$row->contact_id); ?>" class="btn btn-primary">Delete</a></td>
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
  
