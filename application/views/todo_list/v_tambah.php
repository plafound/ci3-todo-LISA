<div class="pageheader ">
	<h3><i class="fa fa-home"></i> Tambah Todo List </h3>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li> <a href="#"> Tambah Todo List</a> </li>
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
				<h3 class="panel-title"><a href="<?php echo site_url('list')?>">
						<i class="fa fa-arrow-left"></i>
						Back</a></h3>
			</div>
			<form action="<?php echo site_url('c_list/tambah')?>" method="post" enctype="multipart/form-data">
				<div class="panel-body">
					<div class="row">
						<div class="col">
						<div class="form-group">
								<label class="control-label">Todo Group</label>
								<input type="text" class="form-control" id="todo_group" name="todo_group">
							</div>
						<div class="form-group">
								<label class="control-label">Tanggal Mulai</label>
								<input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
							</div>
						<div class="form-group">
								<label class="control-label">Tanggal Akhir</label>
								<input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
							</div>
						<div class="form-group">
								<label class="control-label">Tanggal Selesai</label>
								<input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai">
							</div>
						<div class="form-group">
								<label class="control-label">Todo</label>
								<input type="text" class="form-control" id="todo" name="todo">
							</div>
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
						<div class="form-group">
								<label class="control-label">User</label>
								<input type="text" class="form-control" id="user" name="user">
							</div>
							<div class="text-right">
								<button class="btn btn-info" type="submit">Submit</button>
							</div>			
						</div>
                     </div>
					</div>
			</form>
		</div>
	</div>


