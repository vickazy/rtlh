<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Pelaksana PSU</h3>
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
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('psu?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&kabupaten=<?php echo $this->input->get('kabupaten'); ?>';">
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
					
					<a href="<?php echo site_url('psu/create_master_jenis') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
					<a href="<?php echo site_url("psu/print_out_jenis_psu?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
					<a href="<?php echo site_url("psu/export_jenis_psu?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
				</div>
			</div>
			<div class="box-body">
		
				<div class="col-md-3">
					<div class="form-group">
						<label>Kata Kunci :</label>
						<input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="Nama Jenis. . . ">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
						<a href="<?php echo site_url('psu/master_jenis') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
					</div>
				</div>
			</div>
			<?php
			// End form pencarian
			echo form_close();
			?>
			<div class="box-body">
				
				<table class="table table-hover table-bordered  mini-font" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="50">NO</th>
							<th class="text-center" width="580">Nama Jenis</th>
							<th class="text-center" width="290">Keterangan</th>
							<th width="200"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						/*
						* Loop data
						*/
						$number = ( ! $this->page ) ? 0 : $this->page;

						foreach($master_jenis as $row) :
						?>
						<tr>
							<td class="text-center">
								<?php echo ++$number ?>
							</td>
							<td><?php echo highlight_phrase($row->nama_jenis, $this->input->get('query'),'<span style="color:red; font-weight: bold;">', '</span>');    ?></td>
							<td><?php echo $row->keterangan; ?></td>						
							<td class="text-center" style="font-size: 12px;" id="tombol-filter">
								<a href="<?php echo site_url("psu/update_master_jenis/{$row->id}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
								<?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Admin'): ?>
								<a class="icon-button text-red get-delete-jenis-psu" data-id="<?php echo $row->id; ?>"  data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
							<?php endif ?>
							</td>
						</tr>
						<?php
						endforeach;
						?>
					</tbody>
					<tfoot>
					
					<th colspan="9">
						
						<small class="pull-right"><?php echo count($master_jenis) . " dari " . $num_master_jenis . " data"; ?></small>
					</th>
					
					</tfoot>
				</table>
				
				<div class="modal animated fadeIn modal-danger" id="modal-delete-calon-multiple" tabindex="-1" data-backdrop="static" data-keyboard="false">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
								<span>Hapus data yang terpilih dari Calon Penerima?</span>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
								<button type="submit" name="action" value="delete" id="btn-delete" class="btn btn-outline"> Hapus </button>
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>

<div class="modal animated fadeIn modal-danger" id="modal-delete-jenis-psu" tabindex="-1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				<span>Hapus data ini?</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				<a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
			</div>
		</div>
	</div>
</div>