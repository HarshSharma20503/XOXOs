<?php 
include('header.php');

//varibales to store the data
$msg="";
$category="";
$order_number="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){ 
	$id=get_safe_value($_GET['id']);  // gets id from url 
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from category where id='$id'")); //gets all the data that matches the id
	$category=$row['category'];
	$order_number=$row['order_number'];
}

if(isset($_POST['submit'])){
	$category=get_safe_value($_POST['category']);
	$order_number=get_safe_value($_POST['order_number']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){   //if id is not present in url(adding category)
		$sql="select * from category where category='$category'";
	}else{         //if id is present in url(editing category)
		$sql="select * from category where category='$category' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){   // condition to check if category is already entered
		$msg="Category already added";
	}else{
		if($id==''){ // inserting category
			mysqli_query($con,"insert into category(category,order_number,status,added_on) values('$category','$order_number',1,'$added_on')");
		}else{       //updating category
			mysqli_query($con,"update category set category='$category', order_number='$order_number' where id='$id'");
		}
		
		redirect('category.php'); //redirect to category page
	}
}
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">  
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <input type="text" class="form-control" placeholder="Category" name="category" required value="<?php echo $category?>">
					  <div class="error mt8"><?php echo $msg?></div>    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Order Number</label>
                      <input type="textbox" class="form-control" placeholder="Order Number" name="order_number"  value="<?php echo $order_number?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>