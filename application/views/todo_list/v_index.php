<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Todo List </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> ToDo List</a>
			</li>
			<li class="active"> Home </li>
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
			<div class="panel">

				<div class="panel-heading" style="padding: 10px;">
					<a class="btn btn-success " data-toggle="modal" data-target="#modalAddList"><i
							class="fa fa-plus"></i>
						Add Todo List</a>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Todo</th>
								<th class="none">Tanggal Mulai</th>
								<th class="none">Tanggal Akhir</th>
								<th class="none">Tanggal Selesai</th>
								<th>Progress</th>
								<th>Todo Group</th>
								<th>Status</th>
								<th>Status</th>
								<th>User</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if (!empty($list)) {
								$i=1;
							foreach ($list as $list): ?>
							<tr>

								<td width="40">
									<?php echo $i ?>
								</td>
								<td>
									<?php echo $list->todo ?>

								</td>
								<td>
									<?php echo $list->tgl_mulai ?>
								</td>
								<td>
									<?php echo $list->tgl_akhir ?>
								</td>
								<td>
									<?php echo $list->tgl_selesai ?>
								</td>

								<td>
									<?php 
									if($list->jml_list==0){
									$persen = 0;
									} else {
									$persen = $list->jml_selesai / $list->jml_list *100;
									}
								?>
									<div class="progress progress-striped active">
										<div class="progress-bar <?php echo $persen!=100 ? 'progress-bar-danger' : 'progress-bar-success' ?>"
											style="width:<?=$persen?>%">
											<span> <?=$persen?> Completed</span>
										</div>
									</div>

								</td>
								<td>
									<?php echo $list->nama_group ?>
								</td>
								<td>
									<?php if($list->status == "B") : ?>
									<div>
										<p class="btn-danger text-center text-bold">BELUM</p>
									</div>
									<?php elseif($list->status == "D") : ?>
									<div>
										<p class="btn-warning text-center text-bold">DIKERJAKAN</p>
									</div>
									<?php elseif($list->status == "S") : ?>
									<div>
										<p class="btn-success text-center text-bold">SELESAI</p>
									</div>
									<?php endif; ?>
								</td>
								<td>
									<?php if(date('Y-m-d') > $list->tgl_akhir && ($list->status != "S")) : ?>
										TERLAMBAT
									<?php else : ?>
										TEPAT WAKTU
									<?php endif;?>

								</td>
								<td>
									<?php echo $list->nama_user ?>
								</td>

								<td width="350">
									<a href="<?php echo site_url('c_todo_group/list_tutor/'.$list->group_id) ?>"
										class="btn btn-primary"><i class="fa fa-group"></i>Group</a>
									<a href="<?php echo site_url('c_todo_task/task/'.$list->id) ?>"
										class="btn btn-success">Data Task</a>
									<?php if($this->session->userdata('id')==$list->user || $this->session->userdata('jabatan')=='A'){?>
									<a href="#" data-id="<?= $list->id;?>" data-group_id="<?= $list->group_id;?>"
										data-tgl_mulai="<?= $list->tgl_mulai;?>"
										data-tgl_akhir="<?= $list->tgl_akhir;?>" data-todo="<?= $list->todo;?>"
										data-tgl_selesai="<?= $list->tgl_selesai;?>" data-status="<?= $list->status;?>"
										class="btn btn-small btn-edit" data-toggle="modal"
										data-target="#modalEditList"><i class="fa fa-edit"></i> Edit</a>
									<?php } else {?>
									<a href="#" data-id="<?= $list->id;?>" data-group_id="<?= $list->group_id;?>"
										data-tgl_mulai="<?= $list->tgl_mulai;?>"
										data-tgl_akhir="<?= $list->tgl_akhir;?>" data-todo="<?= $list->todo;?>"
										data-tgl_selesai="<?= $list->tgl_selesai;?>" data-status="<?= $list->status;?>"
										class="btn btn-small btn-edit" data-toggle="modal"
										data-target="#modalEditListUser"><i class="fa fa-edit"></i> Edit</a>
									<?php }?>
									<?php if($this->session->userdata('id')==$list->user || $this->session->userdata('jabatan')=='A'){?>
									<form action="<?php echo site_url('c_todo_list/hapus_list') ?>" method="post">
										<input type="hidden" name="id" value="<?=$list->id?>">
										<input type="hidden" name="group_id" value="<?=$list->group_id?>">
										<button class="btn btn-small text-danger" type="submit"><i
												class="fa fa-trash"></i>
											Hapus</button>
										<?php }?>
										<?php if($list->status== "B") : ?>
										<a href="<?= site_url('c_todo_list/dikerjakan/'. $list->id . "/" . $list->group_id ) ?>"
											class="btn btn-small btn-warning">
											<i class="fa fa-circle-o-notch"></i> Dikerjakan
										</a>
										<?php elseif ($list->status== "D" & $persen==100) : ?>
										<a href="<?= site_url('c_todo_list/selesai/'. $list->id . "/" . $list->group_id )?>"
											class="btn btn-small btn-primary">
											<i class="fa fa-check"></i> Selesai
											<?php elseif ($list->status== "S") : ?>
											<a href="<?= site_url('c_todo_list/batal/'. $list->id . "/" . $list->group_id )?>"
												class="btn btn-small btn-danger">
												<i class="fa fa-times"></i> Batal
												<?php endif; ?>
											</a>
									</form>

								</td>
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
<!-- modal addlist -->
<div class="modal modal-default fade" id="modalAddList">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('c_todo_list/tambah_list')?>" method="POST"
					enctype="multipart/form-data">
					<input type="hidden" name="user" value="<?= $this->session->userdata('id');?>">
					<?php if($this->session->userdata('jabatan')== 'A'){ ?>
					<div class="form-group">
						<label class="control-label"></label>
						<select id="todo_group" name="todo_group" class="form-control" style="width: 100%;" required>
							<?php foreach($group as $group) : ?>
							<option value="<?= $group->id?>"><?= $group->nama?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<?php } else{ ?>
					<input type="hidden" name="todo_group" value="<?= $list->todo_group?>">
					<?php }?>
					<div class="form-group">
						<label class="control-label">Tanggal Mulai</label>
						<input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai"
							value="<?php echo date('Y-m-d')?>">
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Akhir</label>
						<input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir"
							value="<?php echo date('Y-m-d')?>">
					</div>
					<div class="form-group">
						<label class="control-label">Todo</label>
						<input type="text" class="form-control" id="todo" name="todo">
					</div>

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
</div>

<!-- MODAL EDIT -->
<div class="modal modal-default fade" id="modalEditList">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title"><span class="fa fa-plus"></span> Edit List</h3>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('c_todo_list/edit_list')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" class="id">
					<input type="hidden" name="group_id" class="group_id">
					<?php if($this->session->userdata('jabatan')== 'A' || $this->session->userdata('id')== $list->user) { ?>
					<div class="form-group">
						<label class="control-label">Tanggal Mulai</label>
						<input type="date" class="form-control tgl_mulai" id="tgl_mulai" name="tgl_mulai">
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Akhir</label>
						<input type="date" class="form-control tgl_akhir" id="tgl_akhir" name="tgl_akhir">
					</div>
					<div class="form-group">
						<label class="control-label">Tanggal Selesai</label>
						<input type="date" class="form-control tgl_selesai" id="tgl_selesai" name="tgl_selesai">
					</div>
					<div class="form-group">
						<label class="control-label">Todo</label>
						<input type="text" class="form-control todo" id="todo" name="todo">
					</div>
					<?php }?>
					<div class="form-group">
						<label class="control-label">Status</label>

						<div class="radio">
							<label class="form-radio form-icon btn btn-success form-text">
								<input type="radio" name="status" value="S"> Sudah
							</label>
							<label class="form-radio form-icon btn btn-danger form-text">
								<input type="radio" name="status" value="B" checked> Belum
							</label>
							<label class="form-radio form-icon btn btn-warning form-text">
								<input type="radio" name="status" value="D"> Dikerjakan
							</label>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="delName" value="">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span
								class="fa fa-close"></span> Batal</button>
						<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Ubah</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<!-- MODAL EDIT USER -->
<div class="modal modal-default fade" id="modalEditListUser">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title"><span class="fa fa-plus"></span> Edit List</h3>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('c_todo_list/edit_list')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" class="id">
					<input type="hidden" name="group_id" class="group_id">
					<div class="form-group">
						<label class="control-label">Status</label>
						<div class="radio">
							<label class="form-radio form-icon btn btn-success form-text">
								<input type="radio" name="status" value="S"> Sudah
							</label>
							<label class="form-radio form-icon btn btn-danger form-text">
								<input type="radio" name="status" value="B"> Belum
							</label>
							<label class="form-radio form-icon btn btn-warning form-text">
								<input type="radio" name="status" value="D"> Dikerjakan
							</label>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="delName" value="">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span
								class="fa fa-close"></span> Batal</button>
						<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Ubah</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>

<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets/admin/js/jquery-2.1.1.min.js')?>"></script>
<!--BootstrapJS [ RECOMMENDED ]-->
<script>
	$(document).ready(function () {

		// get Edit Product
		$('.btn-edit').on('click', function () {
			// get data from button edit
			const id = $(this).data('id');
			const group_id = $(this).data('group_id');
			const todo = $(this).data('todo');
			const tgl_mulai = $(this).data('tgl_mulai');
			const tgl_akhir = $(this).data('tgl_akhir');
			const tgl_selesai = $(this).data('tgl_selesai');
			const status = $(this).data('status');
			// Set data to Form Edit
			$('.id').val(id);
			$('.group_id').val(group_id);
			$('.todo').val(todo);
			$('.tgl_mulai').val(tgl_mulai);
			$('.tgl_akhir').val(tgl_akhir);
			$('.tgl_selesai').val(tgl_selesai);


		});
	});

</script>
