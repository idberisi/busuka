<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Jalur Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('jalur/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
                        <th>Rute</th>
						<th>Halte</th>
						<th>Type</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($jalur as $d){ ?>
                    <tr>
						<td><?php echo $d['id']; ?></td>
						<td><?php echo $d['nama']; ?></td>
						<td><?php echo $d['nama_rute']; ?></td>
						<td><?php $type=$d['type']; if($type==1){echo "Awal";}else if($type==2){ echo "Tengah";}else if($type==3){echo "Akhir";}else if($type==4){echo "Transit";}else{echo "Waypoint";} ?></td>
						<td>
                            <a href="<?php echo site_url('jalur/edit/'.$d['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('jalur/remove/'.$d['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
