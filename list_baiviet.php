<?php  include('include/header.php');?>
<?php include('../inc/connect.php');?>
<?php include('../inc/function.php');?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách Bài viết</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Mã</th>
					<th>Danh mục bài viết</th>
					<th>Tiêu đề</th>
					<th>Ảnh</th>
					<th>Lượt xem</th>
					<th>Ngày đăng</th>
					<th>Thứ tự</th>
					<th>Trạng thái</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php $query1="SELECT * FROM tblbaiviet ORDER BY ordernum DESC";
				$result1=mysqli_query($dbc,$query1);
				kt($result1,$query1);
				while ($baiviet=mysqli_fetch_array($result1, MYSQLI_ASSOC))
				 {
	
				?>
				<tr>
					<td><?php echo $baiviet['id'] ; ?></td>
					<td><?php echo $baiviet['id_dm'] ; ?></td>
					<td><?php echo $baiviet['tieude'] ; ?></td>
					<td><?php echo $baiviet['anh'] ; ?></td>
					<td><?php echo $baiviet['view'] ; ?></td>
					<td><?php echo $baiviet['ngaydang'] ; ?></td>
					<td><?php echo $baiviet['ordernum'] ; ?></td>
					<td><?php if($baiviet['status']==1)
					{
						echo "Hiện Thị";
					}
					else
					{
						echo "Không hiện thị";
					}  ; ?></td>
					<td style="align:center"><a href="edit_baiviet.php?id=<?php echo $baiviet['id']; ?>"><img width="16" src="../images/sua.png"></a></td>
					<td style="align:center"><a onclick="return confirm('bạn có thật sự muốn xoá không'); " href="delete_baiviet.php?id=<?php echo $id['id']; ?>"><img width="16" src="../images/xoa.png "></a></td>

				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php include('include/footer.php'); ?>    