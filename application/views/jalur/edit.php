<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Jalur Edit</h3>
            </div>
			<?php echo form_open('jalur/edit/'.$jalur['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_halte" class="control-label"><span class="text-danger">*</span>Halte</label>
						<div class="form-group">
							<select name="id_halte" class="form-control">
								<option value="">select halte</option>
								<?php 
								foreach($all_halte as $halte)
								{
									$selected = ($halte['id'] == $jalur['id_halte']) ? ' selected="selected"' : "";

									echo '<option value="'.$halte['id'].'" '.$selected.'>'.$halte['nama'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_halte');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_rute" class="control-label"><span class="text-danger">*</span>Rute</label>
						<div class="form-group">
							<select name="id_rute" class="form-control">
								<option value="">select rute</option>
								<?php 
								foreach($all_rute as $rute)
								{
									$selected = ($rute['id'] == $jalur['id_rute']) ? ' selected="selected"' : "";

									echo '<option value="'.$rute['id'].'" '.$selected.'>'.$rute['nama_rute'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_rute');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="type" class="control-label"><span class="text-danger">*</span>Type</label>
						<div class="form-group">
							<select name="type" class="form-control">
								<option value="">select</option>
								<?php 
								$type_values = array(
									'1'=>'Start',
									'2'=>'End',
									'3'=>'Mid',
									'4'=>'Transit',
									'5'=>'Waypoint',
								);

								foreach($type_values as $value => $display_text)
								{
									$selected = ($value == $jalur['type']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('type');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="urutan" class="control-label">Urutan</label>
						<div class="form-group">
							<input type="text" name="urutan" value="<?php echo ($this->input->post('urutan') ? $this->input->post('urutan') : $jalur['urutan']); ?>" class="form-control" id="urutan" />
							<span class="text-danger"><?php echo form_error('urutan');?></span>
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