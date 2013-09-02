<?php 
	set_time_limit(0);
	
	if(!empty($_FILES['csv_discount'])){
		$info = pathinfo($_FILES['csv_discount']['name']);
		
		if($info['extension'] == 'csv'){
			$csv = self::get_csv_parser();
			$csv->delimiter = ',';
				
			//making the first row independent
			$csv->heading = false;
			$csv->parse($_FILES['csv_discount']['tmp_name']);
			
			$imported = 0;
			$skipped = 0;
			
			foreach($csv->data as $key => $row){						
				
				if($key == 0) continue;	

				if(empty($row[0])){
					$skipped ++; 
					continue;
				}
				
				if(self::attach_discount($row)){
					$imported ++;
				}
			}
		}
	}
?>

<style>
	table.csvtable td{
		padding: 15px;
	}
</style>
<div class="wrap">
	<h2>Bulk Discount Management</h2>
	
	<p>Upload your csv to make the discount for poroducts</p>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="csv_bulk_discount" value="y" />
		
		<table class="csvtable">
			<tr>
				<td><input type="file" name="csv_discount"></td>
				<td><input type="submit" value="Import" class="button button-primary"></td>
			</tr>		
		</table>
		
	</form>
</div>