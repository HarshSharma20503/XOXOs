<?php 
include('header.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']); //gets type from url
	$id=get_safe_value($_GET['id']); //gets id from url
	if($type=='delete'){    //condition for delete type
		mysqli_query($con,"delete from coupon_code where id='$id'");
		redirect('coupon_code.php');
	}
	if($type=='active' || $type=='deactive'){  // condition for active deactive
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update coupon_code set status='$status' where id='$id'");  //query to update status
		redirect('coupon_code.php');
	}

}

$sql="select * from coupon_code order by id desc"; //fetch all data from coupon code table
$res=mysqli_query($con,$sql);   

?>
  <div class="card">
            <div class="card-body">
              <h1 class="grid_title">Coupon Codes</h1>
			  <a href="manage_coupon_code.php" class="add_link">Add Coupon Code</a>
			  <div class="row grid_box">
				
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%">S.No #</th>
                            <th width="10%">Code/Value</th>
                            <th width="10%">Type</th>
							<th width="15%">Cart Min</th>
							<th width="15%">Expired On</th>
							<th width="15%">Added On</th>
                            <th width="20%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){   //loop to display all the fetched data
						?>
						<tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $row['coupon_code']?><br/>
							<?php echo $row['coupon_value']?></td>
							<td><?php echo $row['coupon_type']?></td>
							<td><?php echo $row['cart_min_value']?></td>
							<td>
							<?php 
							if($row['expired_on']=='0000-00-00'){   //checks if there is expired date or not
								
							}else{
								echo $row['expired_on'];
							}
							?>
							</td>
							<td>
							<?php 
							$dateStr=strtotime($row['added_on']);  //converts time and date to seconds
							echo date('d-m-Y',$dateStr);  //converts seconds to date
							?>
							</td>
							<td>
								<a href="manage_coupon_code.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
								<?php
								if($row['status']==1){
								?>
								<a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger hand_cursor">Active</label></a>
								<?php
								}else{
								?>
								<a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
								<?php
								}
								?>
								&nbsp;
								<a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
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