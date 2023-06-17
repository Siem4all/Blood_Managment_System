

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
              <h3 class="box-title">All Available bloods in stock</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped bg-success">
                <thead class="bg-success">
                <tr>
			     <th>#</th>
                  <th>A+(ml)</th>
                  <th>A-(ml)</th>
				 <th>B+(ml)</th>
                  <th>B-(ml)</th>
                  <th>AB+(ml)</th>
				  <th>AB-(ml)</th>
				<th>O+(ml)</th>
					<td>O-(ml)</td>
                </tr>
                </thead>
                <tbody>
					<?php  
					if( !empty($stock) ) {
             foreach ($stock as $key => $row)  
               {  
                ?>			 
                <tr>
				<td><?php echo ++$key;?></td>
					<td><?php echo $row->Ap;?></td>
					<td><?php echo $row->An;?></td>
                    <td><?php echo $row->Bp;?></td>
					<td><?php echo $row->Bn;?></td>
					<td><?php echo $row->ABp;?></td>
					<td><?php echo $row->ABn;?></td>
					<td><?php echo $row->Op;?></td>
					<td><?php echo $row->On;?></td>

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
  
