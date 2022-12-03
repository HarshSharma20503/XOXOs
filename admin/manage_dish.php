<?php 
include('header.php');

//variables to store the data that is fetched from the
$msg="";
$category_id="";
$dish="";
$dish_detail="";
$price="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);     //gets id from url
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from dish where id='$id'"));  //fetches all the data that matches id
	$category_id=$row['category_id'];
	$dish=$row['dish'];
	$dish_detail=$row['dish_detail'];
	$price=$row['price'];
}

if(isset($_POST['submit'])){   //if the submit button has been clicked 
	$category_id=get_safe_value($_POST['category_id']);
	$dish=get_safe_value($_POST['dish']);
	$dish_detail=get_safe_value($_POST['dish_detail']);
	$price=get_safe_value($_POST['price']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){   //condition to check weather to add dish or edit it
		$sql="select * from dish where dish='$dish'";
	}else{
		$sql="select * from dish where dish='$dish' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){  //condition to check if the dish is already added
		$msg="Dish already added";
	}else{
		if($id==''){
				mysqli_query($con,"insert into dish(category_id,dish,dish_detail,status,added_on,price) values('$category_id','$dish','$dish_detail',1,'$added_on','$price')");
		}else{
				mysqli_query($con,"update dish set category_id='$category_id', dish='$dish' , dish_detail='$dish_detail',price='$price'  where id='$id'");
			}
		
		redirect('dish.php');
	}
}
$res_category=mysqli_query($con,"select * from category where status='1' order by category asc")
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Dish</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <select class="form-control" name="category_id" required>
						<option value="">Select Category</option>
						<?php
						while($row_category=mysqli_fetch_assoc($res_category)){
							if($row_category['id']==$category_id){
								echo "<option value='".$row_category['id']."' selected>".$row_category['category']."</option>";
							}else{
								echo "<option value='".$row_category['id']."'>".$row_category['category']."</option>";
							}
						}
						?>
					  </select>
					  
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Dish</label>
                      <input type="text" class="form-control" placeholder="Dish" name="dish" required value="<?php echo $dish?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Dish Detail</label>
                      <textarea name="dish_detail" class="form-control" placeholder="Dish Detail"><?php echo $dish_detail?></textarea>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail3" required>Price</label>
                      <input type="text" class="form-control" placeholder="Price" name="price" required value="<?php echo $price?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>