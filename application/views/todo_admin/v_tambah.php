<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Tambah Admin </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Tambah Admin </a> </li>
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
				<h3 class="panel-title"><a href="<?php echo site_url('c_admin')?>">
						<i class="fa fa-arrow-left"></i>
						Back</a></h3>
			</div>
			<form action="<?php echo site_url('c_admin/tambah')?>" method="post" enctype="multipart/form-data">
				<div class="panel-body">
					<div class="row">
						<div class="col">
							<input type="hidden" name="jabatan" value="A">
							<div class="form-group">
								<label class="control-label">Nama Admin</label>
								<input type="text" class="form-control" id="nama" name="nama" required>
							</div>
                            <div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" class="form-control" id="user" name="user" required>
								<small class="help-block">Please enter username</small>
							</div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <small class="help-block">Please enter password</small>
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
