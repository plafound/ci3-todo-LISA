<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Todo Group </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> ToDo Groups </a> </li>
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
<!-- Alert Success -->
<?php if($this->session->flashdata('success')): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success');?>
					</div>
					<?php endif;?>

			<div class="panel">
				<div class="panel-heading" style="padding: 10px;">
					<a href="<?php echo site_url('c_todo_group/form_tambah') ?>" class="btn btn-success "><i
							class="fa fa-plus"></i>
						Add
						Group</a>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<table id="demo-dt-basic" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Group</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							if (!empty($groups)) {
								$i=1;
							foreach ($groups as $group): ?>
							<tr>
								<td width="70">
									<?php echo $i ?>
								</td>
								<td>
									<?php echo $group->nama ?>
								</td>

								<td width="350">
								<a href="<?php echo site_url('c_todo_list/group/'.$group->id) ?>"
										class="btn btn-primary">Todo List</a>
									<a href="<?php echo site_url('c_todo_group/list_tutor/'.$group->id) ?>"
										class="btn btn-success">Data Tutor</a>
									<a href="<?php echo site_url('c_todo_group/form_ubah/'.$group->id) ?>"
										class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?php echo site_url('c_todo_group/hapus/'.$group->id) ?>"
										class="btn btn-small text-danger"><i class="fa fa-trash"></i>
										Hapus</a>
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

