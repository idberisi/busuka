<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Halte Add</h3>
            </div>
            <?php echo form_open('halte/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama" class="control-label"><span class="text-danger">*</span>Nama</label>
						<div class="form-group">
							<input type="text" name="nama" value="<?php echo $this->input->post('nama'); ?>" class="form-control" id="nama" />
							<span class="text-danger"><?php echo form_error('nama');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="longtitude" class="control-label"><span class="text-danger">*</span>Longtitude</label>
						<div class="form-group">
							<input type="text" name="longtitude" value="<?php echo $this->input->post('longtitude'); ?>" class="form-control" id="longtitude" />
							<span class="text-danger"><?php echo form_error('longtitude');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="langtitude" class="control-label"><span class="text-danger">*</span>Langtitude</label>
						<div class="form-group">
							<input type="text" name="langtitude" value="<?php echo $this->input->post('langtitude'); ?>" class="form-control" id="langtitude" />
							<span class="text-danger"><?php echo form_error('langtitude');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="icon" class="control-label">Icon</label>
						<div class="form-group">
							<input type="text" name="icon" value="<?php echo $this->input->post('icon'); ?>" class="form-control" id="icon" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gambar" class="control-label">Gambar</label>
						<div class="form-group">
							<textarea name="gambar" class="form-control" id="gambar"><?php echo $this->input->post('gambar'); ?></textarea>
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