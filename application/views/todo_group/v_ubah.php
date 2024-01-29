<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Edit ToDo Group </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Todo Groups </a> </li>
			<li class="active"> Edit </li>
		</ol>
	</div>
</div>
<!--Page content-->
<!--===================================================-->
<div id="page-content">

	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"><a href="<?php echo site_url('group')?>">
						<i class="fa fa-arrow-left"></i>
						Back</a></h3>
			</div>
			<form action="<?php echo site_url('c_todo_group/ubah')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $groups['id'] ?>" />
				<div class="panel-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="name" class="control-label">Nama Group</label>
								<input type="text" class="form-control" id="nama" name="nama"
									value="<?php echo $groups['nama'] ?>">
							</div>
							<div class="text-right">
								<button class="btn btn-info" type="submit">Submit</button>
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
