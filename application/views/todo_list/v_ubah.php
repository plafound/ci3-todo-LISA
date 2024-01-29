<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Edit List </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Tutor </a> </li>
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
				<h3 class="panel-title"><a href="<?php echo site_url('list')?>">
						<i class="fa fa-arrow-left"></i>
						Back</a></h3>
			</div>
			<form action="<?php echo site_url('c_todo_list/ubah')?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $list['id'] ?>" />
				<div class="panel-body">
					<div class="row">
						<div class="col">
                        <!-- <div class="form-group">
								<label class="control-label">Nama Tutor</label>
								<input type="text" class="form-control" id="nama" name="nama" value="<?= $tutor['nama'] ?>">
							</div>
                            <div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" class="form-control" id="user" name="user" value="<?= $tutor['user']?>">
								<small class="help-block">Please enter username</small>
							</div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<? $tutor['pass'] ?>">
                                <small class="help-block">Please enter password</small>
                            </div>
							<div class="text-right">
								<button class="btn btn-info" type="submit">Submit</button>
							</div>			 -->
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
