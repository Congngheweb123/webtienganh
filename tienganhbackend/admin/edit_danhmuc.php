<?php ob_start(); ?>
<style type="text/css">
	.required{
		color: red;
	}
</style>
<?php include('include/header.php') ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<?php
			include('../inc/connect.php');
			include('../inc/function.php');
			if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT, array('min_range' =>1 )))
			{
		          $id=$_GET['id'];
		    }
		    else{
		    	header('Location: list_danhmuc.php');
		    	exit();
		    }
				if($_SERVER['REQUEST_METHOD']=='POST')
				{   
					$errors=array();
					if(empty($_POST['danhmucbaiviet']))
					{
						$errors[]='danhmucbaiviet';
					}
					else{
						$title=$_POST['danhmucbaiviet'];
					}

					if(empty($_POST['ordernum']))
					{
						$errors[]='ordernum';
					}
					else{
						$ordernum=$_POST['ordernum'];
					}
					$menu=$_POST['menu'];
					$status=$_POST['status'];
					if (empty($errors)) 
					{
						$query ="UPDATE tbldanhmucbaiviet
					    SET danhmucbaiviet='{$title}',
					    menu={$menu},
						ordernum={$ordernum},
						status='{$status}'
					    WHERE id={$id};";
						$results=mysqli_query($dbc,$query);
						kt($results,$query);
						if(mysqli_affected_rows($dbc)==1)
						{
							echo "<p style='color:green;'>  Sửa  thành công</p>";
						}
						else
						{
							echo "<p class= 'required'> Sửa không thành công</p>";
					    }
					    $_POST['danhmucbaiviet']='';
					    $_POST['ordernum']='';
                    }

				else
				{
					$message="<p class='required'> Bạn hãy nhập đây đủ thông tin</p>";
				}
			}
			/*$query_id="SELECT danhmucbaiviet,menu,ordernum,status FROM tbldanhmucbaiviet WhERE id={$id}";
			$result_id=mysqli_query($dbc, $query_id)or die("query {$query} \n <br/> Mysqlerr:".mysqli_error($dbc));
			if(mysqli_num_rows($result_id)==1)
			{
				list($title,$menu,$ordernum,$status)=mysqli_fectch_array($result_id,MYSQLI_NUM);
			}
			else
			{
				$message="<p class='required'> id danh mục không tồn tại</p>";
			}*/
		?>
		
			<form name="fradd_danhmuc" method="POST">
				<?php
				  if(isset($message))
				  {
				  	echo $message;
				  }
				?>
			<h3>Sửa danh mục bài viết</h3>
			<div class="form-group">
				<label>Danh mục bài viết</label>
				<input type="text" name="danhmucbaiviet" value="<?php if(isset($_POST['danhmucbaiviet'])){echo $_POST['danhmucbaiviet'];} ?>" class="form-control" placeholder="Danh mục bài viết" ><br>
				<?php
					if(isset($errors)&& in_array('danhmucbaiviet',$errors ))
					{
						echo " <p class='required' >Bạn chưa nhập danh mục bài viết</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label style="display: block;">Hiện thị menu</label>
				<label class="radio-inline"></label>
				<input type="radio" name="menu" value="1" checked="checked" >Hiện Thị</label>
				<label class="radio-inline"></label>
				<input type="radio" name="menu" value="0" > Không hiện Thị</label>
			</div>
			<div class="form-group">
				<label>Thứ tự</label>
				<input type="text" name="ordernum" value="<?php if(isset($_POST['ordernum'])){echo $_POST['ordernum'];} ?>" class="form-control" placeholder="Thứ tự" >
			</div>
			<div class="form-group">
				<label style="display: block;">Trạng thái</label>
				<label class="radio-inline"></label>
				<input type="radio" name="status" value="1" checked="checked" >Hiện Thị</label>
				<label class="radio-inline"></label>
				<input type="radio" name="status" value="0" > Không hiện Thị</label>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		</form>
	</div>
</div>
<?php include('include/footer.php'); ?>
<?php ob_flush(); ?>