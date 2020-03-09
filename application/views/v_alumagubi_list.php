

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script type="text/javascript">

    $(document).ready(function() {
		
        var table = $('#result_data').DataTable( {
												scrollY:        "350px",
												scrollX:        "100%",
												scrollCollapse: true,
												info:           true,
												searching:      true,
												paging:         true,
												bSort:          false,
												fixedColumns:   false,
												iDisplayLength: 50,
												columnDefs: [
																				{ width: '250px', targets: 0 }, //product name
																				{ width: '50px', targets: 1 }, //category
																				{ width: '20px', targets: 2 }, //price
																		],
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
					<div class="table-responsive">
						<table id="result_data" class="table table-bordered table-striped"  style="width:100%;  table-layout: fixed">
							<thead>
								<tr>
									<th>Product Name</th>
									<th>Category</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<?php
										foreach( $items as $item ){
												echo '<tr>';
												echo '<td>'.$item->title.'</td>';
												echo '<td>'.$item->name.'</td>';
												echo '<td align="center">'.$item->price.'</td>';
												echo '</tr>';
										}
								?>
							</tbody>
						</table>
					</div> <!-- table-responsive -->
		</div> <!-- col-lg-12 -->
	</div> <!-- row -->
</div> <!-- container -->