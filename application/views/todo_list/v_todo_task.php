<div class="pageheader">
	<h3><i class="fa fa-home"></i> Todo Task - <b><?= $todo['todo']?></b> </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> ToDo Tasks </a> </li>
			<li class="active"> Home </li>
		</ol>
	</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">
	<div class="row">
		<div class="col-md-12">

			<div class="panel">
				<div class="panel-heading" style="padding: 10px;">
					<a href="#" class="btn btn-success " data-toggle="modal" data-target="#modalAddTask"><i
							class="fa fa-plus"></i>
						Add
						Task</a>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<table id="dt-task" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>TASK</th>
								<th>TANGGAL MULAI</th>
								<th>TANGGAL SELESAI</th>
								<th>STATUS</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if (!empty($tasks)) {
								$i=1;
							foreach ($tasks as $task): ?>
							<tr>
								<td width="70">
									<?php echo $i ?>
								</td>
								<td>
									<?php echo $task->task ?>
								</td>
								<td>
									<?php echo $task->tgl_mulai ?>
								</td>
								<td>
									<?php echo $task->tgl_selesai ?>
								</td>
								<td>
									<?php if($task->status == "B") : ?>
									<div>
										<p class="btn-danger text-center text-bold">BELUM</p>
									</div>
									<?php elseif($task->status == "D") : ?>
									<div>
										<p class="btn-warning text-center text-bold">DIKERJAKAN</p>
									</div>
									<?php elseif($task->status == "S") : ?>
									<div>
										<p class="btn-success text-center text-bold">SELESAI</p>
									</div>
									<?php endif; ?>
								</td>

								<td width="350">
								<?php if($this->session->userdata('id') == $todo['user'] || $this->session->userdata('jabatan')== 'A') { ?>
									<a href="#" data-id="<?= $task->id;?>" data-task="<?= $task->task;?>"
										data-tgl_mulai="<?= $task->tgl_mulai;?>" data-todo="<?= $task->todo?>"
										data-tgl_selesai="<?= $task->tgl_selesai;?>" data-status="<?= $task->status;?>"
										class=" btn btn-small btn-edit" data-toggle="modal"
										data-target="#modalEditTask">
										<i class=" fa fa-pencil"></i>
										Edit</a>
									<a href="<?= site_url('c_todo_task/hapus/'. $task->id . "/" . $task->todo )?>"
										class="btn btn-small text-danger"><i class="fa fa-trash"></i>
										Hapus</a>
									<?php }?>

									<?php if($task->status== "B") : ?>
									<a href="<?= site_url('c_todo_task/dikerjakan/'. $task->id . "/" . $task->todo )?>" 
									class="btn btn-small btn-warning">
									<i class="fa fa-circle-o-notch"></i> Dikerjakan
									</a>
									<?php elseif ($task->status== "D") : ?>
									<a href="<?= site_url('c_todo_task/selesai/'. $task->id . "/" . $task->todo )?>" 
									class="btn btn-small btn-primary">
									<i class="fa fa-check"></i> Selesai
									<?php elseif ($task->status== "S") : ?>
										<a href="<?= site_url('c_todo_task/batal/'. $task->id . "/" . $task->todo )?>" 
									class="btn btn-small btn-danger">
									<i class="fa fa-times"></i> Batal
									<?php endif; ?>
									</a>
									
								</td>
							</tr>
							<?php
							$i++;
							 endforeach; 
							}  ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>

</div>

<!-- MODAL ADD -->
<div class="modal modal-default fade" id="modalAddTask">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title"><span class="fa fa-plus"></span> Tambah Task</h3>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('c_todo_task/tambah')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="todo" value="<?= $todo['id']?>" />
					<input type="hidden" name="status" value="B" />
					<div class="form-group">
						<label class="control-label">Task</label>
						<input type="text" class="form-control" id="task" name="task">
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

<!-- MODAL EDIT -->
<div class="modal modal-default fade" id="modalEditTask">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title"><span class="fa fa-plus"></span> Edit Task</h3>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('c_todo_task/edit')?>" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="todo" class="todo" />
					<input type="hidden" name="id" class="id" />
					<?php if($this->session->userdata('id') == $todo['user'] || $this->session->userdata('jabatan')== 'A') { ?>
					<div class="form-group">
						<label class="control-label">Task</label>
						<input type="text" class="form-control task" id="task" name="task">
					</div>
					<?php }?>
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


<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets/admin/js/jquery-2.1.1.min.js')?>"></script>

<script>
	$(document).ready(function () {
		// get Edit Product
		$('.btn-edit').on('click', function () {
			// get data from button edit
			const id = $(this).data('id');
			const todo = $(this).data('todo');
			const task = $(this).data('task');
			const tgl_mulai = $(this).data('tgl_mulai');
			const tgl_selesai = $(this).data('tgl_selesai');
			const status = $(this).data('status');
			// Set data to Form Edit
			$('.id').val(id);
			$('.task').val(task);
			$('.tgl_mulai').val(tgl_mulai);
			$('.tgl_selesai').val(tgl_selesai);
			$('.todo').val(todo);
		});
	});

</script>