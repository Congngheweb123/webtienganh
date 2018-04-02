<?php  include('include/header.php');?>
<?php include('../inc/connect.php');?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách Tài khoản</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Mã</th>
					<th>Họ tên</th>
					<th>Email</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php $query1="SELECT id,hoten,email FROM tlbtaikhoan ORDER BY id DESC";
				$result1=mysqli_query($dbc,$query1) ;
				while ($user=mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
				?>
				<tr>
					<td><?php echo $user['id'] ; ?></td>
					<td><?php echo $user['hoten'] ; ?></td>
					<td><?php echo $user['email'] ; ?></td>
>
					<td style="align:center"><a onclick="return confirm('bạn có thật sự muốn xoá không');" href="delete_user.php?id=<?php echo $user['id']; ?>"><img width="16" src="../images/xoa.png "></a></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php include('include/footer.php'); ?>    