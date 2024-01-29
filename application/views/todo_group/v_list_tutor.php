<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Todo Group - <?= $groups['nama'] ?></h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> ToDo Groups </a> </li>
			<li class="active"> List Tutor </li>
		</ol>
	</div>
</div>
<!-- Basic Data Tables -->
<!--===================================================-->
<!--Page content-->
<!--===================================================-->
<div id="page-content">
	<div class="row">
		<div class="col-md-12">
			<!-- Alert Success -->
			<?php if($this->session->flashdata('success')) : ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success');?>
			</div>
			<?php elseif($this->session->flashdata('hapus')) : ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $this->session->flashdata('hapus');?>
			</div>
			<?php elseif($this->session->flashdata('gagal')) : ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $this->session->flashdata('gagal');?>
			</div>
			<?php endif; ?>

			<div class="panel">
				<div class="panel-heading">
				<?php if($this->session->userdata('jabatan')=='A'){?>
					<a href="#" class="btn btn-success " data-toggle="modal" data-target="#modalAddTutor"><i
							class="fa fa-plus"></i>
						Tambah Tutor</a>
					<?php } else {?>
					<h3 class="panel-title">Data Tutor</h3>
					<?php }?>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<table id="" class="table table-striped table-bordered dt-basic">
						<thead>
							<tr>
								<th>#</th>
								<th class="text-center">Nama Tutor</th>
								<?php if($this->session->userdata('jabatan')=="A"){?>
								<th class="text-center">Action</th>
								<?php }?>
							</tr>
						</thead>
						<tbody>
							<?php 
							if (!empty($tutors)) {
								$i=1;
							foreach ($tutors as $tutor): ?>
							<tr>

								<td width="40">
									<?php echo $i ?>
								</td>
								<td class="200">
									<?php echo $tutor->nama ?>
								</td>
								<?php if($this->session->userdata('jabatan')=="A"){?>
								<td width="350">
									<a href="<?= site_url('c_todo_group/hapus_ptk/'.$tutor->id.'/'.$tutor->todo_group )?>"
										class="btn btn-small text-danger"><i class="fa fa-trash"></i>
										Hapus</a>
								</td>
							<?php }?>
							</tr>
							<?php
							$i++;
							 endforeach; 
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal modal-default fade" id="modalAddTutor">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title"><span class="fa fa-plus"></span> Tambah Tutor</h3>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_todo_group/add_tutor_group')?>" method="POST"
					enctype="multipart/form-data">
					<input type="hidden" name="todo_group" value="<?php echo $groups['id']?>" />
					<select id="daftar" name="ptk" class="form-control select2bs4_daftar" style="width: 100%;" required>
						<option></option>
					</select>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="delName" value="">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span
						class="fa fa-close"></span> Batal</button>
				<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Tambah</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script>
	
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" />
<script>
	$('.select2bs4_daftar').select2({
		placeholder: "Pilih Tutor",
		theme: 'bootstrap4',
		ajax: {
			dataType: 'json',
			delay: 250,
			url: '<?php echo site_url('api/get_tutor'); ?>',
			data: function (params) {
				return {
					search: params.term
				}
			},
			processResults: function (data) {
				return {
					results: $.map(data, function (obj) {
						return {
							id: obj.id,
							text: obj.nama
						};
					})
				};
			}
		}
	});

</script>

