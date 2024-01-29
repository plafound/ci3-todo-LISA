<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Todo Task </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> ToDo Tasks </a> </li>
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
					<a href="#modalAddTask" class="btn btn-success "><i class="fa fa-plus"></i>
						Add
						Task</a>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Group</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach ($groups as $group): ?>
							<tr>

								<td width="150">
									<?php echo $group->id ?>
								</td>
								<td>
									<?php echo $group->nama ?>
								</td>

								<td width="250">
									<a href="<?php echo site_url('c_todo_group/form_ubah/'.$group->id) ?>"
										class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?php echo site_url('c_todo_group/hapus/'.$group->id) ?>"
										class="btn btn-small text-danger"><i class="fa fa-trash"></i>
										Hapus</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>


