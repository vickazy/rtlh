<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Penduduk</h3>
				</div>
			</div>
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
			<div class="box-body">
				<div class="col-md-4">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('population?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&village=<?php echo $this->input->get('village'); ?>';">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per halaman
				</div>
				<div class="pull-right">
				
					<a href="<?php echo site_url('population/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
				
					<a href="<?php echo site_url("population/print_out?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
					<a href="<?php echo site_url("population/export?per_page={$this->per_page}&page={$this->page}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>	
				
					<!-- <a href="<?php echo site_url('population/import') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-upload"></i> Impor</a> -->
				
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-2">
				    <div class="form-group">
				        <label>Jenis Kelamin :</label>
				        <select name="gender" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<option value="laki-laki" <?php if($this->input->get('gender')=='laki-laki') echo 'selected'; ?>>Laki-laki</option>
				        	<option value="perempuan" <?php if($this->input->get('gender')=='perempuan') echo 'selected'; ?>>Perempuan</option>
				        </select>	
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Desa / Kelurahan :</label>
				        <select name="village" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
					
				        </select>	
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="NIK / Nama . . . ">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('population') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				    </div>
				</div>
			</div>
<?php  
// End form pencarian
echo form_close();
?>
			<div class="box-body">

<?php  

/**
 * Start Form Multiple Action
 *
 * @return string
 **/
echo form_open(site_url('population/bulk_action'));
?>
				<table class="table table-hover table-bordered col-md-12 mini-font" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
					
							</th>
							<th class="text-center">NIK</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Jenis Kelamin</th>
							<th class="text-center">Tanggal Lahir</th>
							<th class="text-center">Desa / Kelurahan</th>
							<th width="200" class="text-center">Alamat</th>
							<th class="text-center">Pekerjaan</th>
							<th class="text-center" width="100">Status Perkawinan</th>
							<th width="100"></th>
						</tr>
					</thead>
					<tbody>
				<?php  
				/*
				* Loop data penduduk
				*/
				$number = ( ! $this->page ) ? 0 : $this->page;

				foreach($population as $row) :
				?>
						<tr>
							<td>
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox" name="populations[]" value="<?php echo $row->ID; ?>"> <label for="checkbox1"></label>
			                    </div>
						
							</td>
							<td class="text-center"><?php echo $row->nik; ?></td>
							<td><?php echo ucwords($row->nama_lengkap); ?></td>
							<td class="text-center"><?php echo ucfirst($row->jns_kelamin) ?></td>
							<td class="text-center"><?php echo date_id($row->tgl_lahir) ?></td>
							<td class="text-center"><?php echo $this->population->get_nama_desa($row->village)->name;  ?></td>
							<td><?php echo $row->alamat; ?></td>
							<td><?php echo $row->pekerjaan; ?></td>
							<td class="text-center"><?php echo ucfirst($row->status_kawin); ?></td>
							<td class="text-center" style="font-size: 12px;" id="tombol-filter">
							
								<a href="<?php echo site_url("population/update/{$row->ID}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
						
								<a class="icon-button text-red get-delete-population" data-id="<?php echo $row->ID; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
				
							</td>
						</tr>
				<?php  
				endforeach;
				?>
					</tbody>
					<tfoot>
					
						<th>
		                    <div class="checkbox checkbox-inline">
		                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
		                    </div>
						</th>
						<th colspan="9">
							<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
							<a class="btn btn-xs btn-round btn-danger get-delete-population-multiple"><i class="fa fa-trash-o"></i> Hapus</a>
							<small class="pull-right"><?php echo count($population) . " dari " . $num_population . " data"; ?></small>
						</th>
					
					</tfoot>
				</table>

				<div class="modal animated fadeIn modal-danger" id="modal-delete-population-multiple" tabindex="-1" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
				        <div class="modal-content">
				           	<div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				                <span>Hapus data penduduk yang terpilih dari sistem?</span>
				           	</div>
				           	<div class="modal-footer">
				                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				                <button type="submit" name="action" value="delete" id="btn-delete" class="btn btn-outline"> Hapus </button>
				           	</div>
				        </div>
				    </div>
				</div>
<?php  
// End Form Multiple Action
echo form_close();
?>
			</div>
			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>



<div class="modal animated fadeIn modal-danger" id="modal-delete-population" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus data penduduk ini dari sistem?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>