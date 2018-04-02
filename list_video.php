<?php  include('include/header.php');?>
<?php include('../inc/connect.php');
include('../inc/function.php');
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách video</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Mã</th>
					<th>Title</th>
					<th>Link</th>
					<th>Thứ tự</th>
					<th> Trạng thái</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php $query1="SELECT * FROM tblvideo ORDER BY ordernum DESC";
				$result1=mysqli_query($dbc,$query1);
				while ($video=mysqli_fetch_array($result1, MYSQLI_ASSOC))
				 {
	
				?>
				<tr>
					<td><?php echo $video['id'] ; ?></td>
					<td><?php echo $video['title'] ; ?></td>
					<td><?php echo $video['link'] ; ?></td>
					<td><?php echo $video['ordernum'] ; ?></td>
					<td><?php if($video['status']==1)
					{
						echo "Hiện Thị";
					}
					else
					{
						echo "Không hiện thị";
					}  ; ?></td>
					<td style="align:center"><a href="edit_video.php?id=<?php echo $video['id']; ?>"><img width="16" src="../images/sua.png"></a></td>
					<td style="align:center"><a onclick="return confirm('bạn có thật sự muốn xoá không'); " href="delete_video.php?id=<?php echo $video['id']; ?>"><img width="16" src="../images/xoa.png "></a></td>

				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php include('include/footer.php'); ?>    