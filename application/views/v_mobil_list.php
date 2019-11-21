<!-- RATING / LIST PLAYER -->

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script type="text/javascript">

    $(document).ready(function() {
		
        var table = $('#result_data').DataTable( {
												scrollY:        "600px",
												scrollX:        "100%",
												scrollCollapse: true,
												info:           true,
												searching:      true,
												paging:         true,
												bSort:          false,
												fixedColumns:   false,
												iDisplayLength: 50,
												columnDefs: [
																				{ width: '100px', targets: 0 }, //NO_KERANGKA
																				{ width: '100px', targets: 1 }, //NO POLISI
																				{ width: '100px', targets: 2 }, //MEREK
																				{ width: '100px', targets: 3 }, //TIPE
																				{ width: '70px', targets: 4 }, //TAHUN
																				{ width: '100px', targets: 5 }, //action
																		],
									});

									$('.btnDelete').click(function(){
											if( confirm('Yakin data akan dihapus?') ){
													return true;
											}

											return false;
									});
		});
</script>

<style>
	thead, th { text-align: center; }
	.card-header{ padding-bottom: 0; }
	.div-header {
			margin: 10px 0 10px 0;
			border-bottom: 1px solid grey;
	}
	
	tr { height:20px; }
	body{ 
		font-size: 14px;
		line-height: 0.5;
	}
	.btn {
		font-size: 12px;
		line-height: 1em;
	}
	.float-right{ margin-bottom: 10px; }
</style>
<!-- Page Content -->

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="div-header">
				<h4><?php echo $judul ?></h4>
			</div>
					<?php //if( $this->session->flashdata('action_mode') != null ) { ?>
					<div class="alert alert-info" role="alert" style="margin-top: 20px;">
							<?php //echo $this->session->flashdata('insert_mode');?>
					</div>
					<?php //} ?>
					<div class="float-right"><a href="mobil/create" role="button" class="btn-cut-off btn btn-success">Tambah Mobil</a></div>
					<div class="table-responsive">
						<table id="result_data" class="table table-bordered table-striped"  style="width:100%;  table-layout: fixed">
							<thead>
								<tr>
									<th>NOMER KERANGKA</th>
									<th>NOMER POLISI</th>
									<th>MEREK</th>
									<th>TIPE</th>
									<th>TAHUN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php
										foreach( $mobil as $row ){
												echo '<tr>';
												echo '<td align="center">'.$row->NO_RANGKA.'</td>';
												echo '<td align="center">'.$row->NO_POLISI.'</td>';
												echo '<td align="center">'.$row->MEREK.'</td>';
												echo '<td align="center">'.$row->TIPE.'</td>';
												echo '<td align="center">'.$row->TAHUN.'</td>';
												echo '<td align="center">
												<a href="mobil/update/'.$row->IDX.'" class="btn btn-xs btn-warning">Edit</a> <a href="mobil/delete/'.$row->IDX.'" class="btnDelete btn btn-xs btn-danger">Hapus</a>
												</td>';
												echo '</tr>';
										}
								?>
							</tbody>
						</table>
					</div> <!-- table-responsive -->
		</div> <!-- col-lg-12 -->
	</div> <!-- row -->
</div> <!-- container -->