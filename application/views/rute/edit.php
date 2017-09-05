<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Rute Edit</h3>
            </div>
			<?php echo form_open('rute/edit/'.$rute['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $rute['nama_rute']); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama_rute');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="warna" class="control-label"><span class="text-danger">*</span>Warna</label>
						<div class="form-group">
							<input type="text" name="warna" value="<?php echo ($this->input->post('warna') ? $this->input->post('warna') : $rute['warna']); ?>" class="form-control jscolor" id="warna" />
							<span class="text-danger"><?php echo form_error('warna');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>