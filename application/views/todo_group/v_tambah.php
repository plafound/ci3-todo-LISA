<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Tambah ToDo Groups </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Todo Groups </a> </li>
			<li class="active"> Tambah </li>
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
			<form action="<?php echo site_url('c_todo_group/tambah')?>" method="post" enctype="multipart/form-data">
				<div class="panel-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label class="control-label">Nama Group</label>
								<input type="text" class="form-control" id="nama" name="nama">
							</div>
						</div>
					</div>
					<div class="panel-footer text-right">
						<button class="btn btn-info" type="submit">Submit</button>
					</div>
			</form>
		</div>
	</div>
</div>
