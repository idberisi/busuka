<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Rute Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('rute/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Nama</th>
						<th>Warna</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($rute as $d){ ?>
                    <tr>
						<td><?php echo $d['nama_rute']; ?></td>
						<td><?php echo $d['warna']; ?></td>
						<td>
                            <a href="<?php echo site_url('rute/edit/'.$d['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('rute/remove/'.$d['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
