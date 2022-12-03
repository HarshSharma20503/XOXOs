<?php 
include('header.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']); // gets type of query from url
	$id=get_safe_value($_GET['id']);     // gets id from url
	if($type=='active' || $type=='deactive'){ //active deactive query
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update user set status='$status' where id='$id'"); //query to update status
		redirect('user.php');
	}

}

$sql="select * from user order by id desc"; //query to fetch all the data
$res=mysqli_query($con,$sql);

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Users</h1>
			  <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">  
                      <thead>
                        <tr>  
                            <th width="10%">S.No #</th>
                            <th width="20%">Name</th>
                            <th width="20%">Email</th>
							<th width="20%">Mobile</th>
                            <th width="15%">Added On</th>
							<th width="15%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){    //loop to print all the data
						?>
						<tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['name']?></td>
							<td><?php echo $row['email']?></td>
							<td><?php echo $row['mobile']?></td>
							<td>
							<?php 
							$dateStr=strtotime($row['added_on']);  // converts date to second
							echo date('d-m-Y',$dateStr);           // converts seconds to date in particular format
							?>
							</td>
							<td>
								<?php
								if($row['status']==1){   //condition for active status
								?>
								<a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger hand_cursor">Active</label></a>
								<?php 
								}else{                   //condition for deactive status
								?>
								<a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
								<?php
								}
								
								?>
							</td>
                           
                        </tr>
                        <?php 
						$i++;
						} } else { ?>
						<tr>
							<td colspan="5">No data found</td>
						</tr>
						<?php } ?>
                      </tbody>
                    </table>
                  </div>
				</div>
              </div>
            </div>
          </div>
        
<?php include('footer.php');?>