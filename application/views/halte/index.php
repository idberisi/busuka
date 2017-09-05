<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Halte Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('halte/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nama</th>
						<th>Longtitude</th>
						<th>Langtitude</th>
						<th>Icon</th>
						<th>Gambar</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($halte as $d){ ?>
                    <tr>
						<td><?php echo $d['nama']; ?></td>
						<td><?php echo $d['longtitude']; ?></td>
						<td><?php echo $d['langtitude']; ?></td>
						<td><?php echo $d['icon']; ?></td>
						<td><?php echo $d['gambar']; ?></td>
						<td>
                            <a href="<?php echo site_url('halte/edit/'.$d['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('halte/remove/'.$d['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
