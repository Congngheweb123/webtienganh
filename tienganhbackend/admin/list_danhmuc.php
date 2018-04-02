<?php  include('include/header.php');?>
<?php include('../inc/connect.php');
include('../inc/function.php');?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách danh mục</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Mã</th>
					<th>Danh mục bài viết</th>
					<th>Menu</th>
					<th>Thứ tự</th>
					<th>Trạng Thái</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php $query1="SELECT * FROM tbldanhmucbaiviet ORDER BY ordernum DESC";
				$result1=mysqli_query($dbc,$query1);
				kt($result1,$query1);
				while ($danhmuc=mysqli_fetch_array($result1, MYSQLI_ASSOC))
				 {
	
				?>
				<tr>
					<td><?php echo $danhmuc['id'] ; ?></td>
					<td><?php echo $danhmuc['danhmucbaiviet'] ; ?></td>
					<td><?php if($danhmuc['menu']==1) 
					{
						echo "Hiện thị";
					}
					else
					{
						echo "Không hiện thị";
					}; ?></td>
				    
					<td><?php echo $danhmuc['ordernum'] ; ?></td>
					<td><?php if($danhmuc['status']==1)
					{
						echo "Hiện Thị";
					}
					else
					{
						echo "Không hiện thị";
					}  ; ?></td>
					<td style="align:center"><a href="edit_danhmuc.php?id=<?php echo $danhmuc['id']; ?>"><img width="16" src="../images/sua.png"></a></td>
					<td style="align:center"><a onclick="return confirm('bạn có thật sự muốn xoá không'); " href="delete_danhmuc.php?id=<?php echo $danhmuc['id']; ?>"><img width="16" src="../images/xoa.png "></a></td>

				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php include('include/footer.php'); ?>    