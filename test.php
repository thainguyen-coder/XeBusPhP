<form action="#" class="seach" method="POST">
				<label for="gsearch">Tìm kiếm trạm</label>
				<input type="search" id="seach1" name="search1">
				<input type="search" id="seach2" name="search2">
				<input type="submit" value="Tìm" name="submit">
					</form>
					
					<?php 
						include "config.php";
						if(isset($_POST["submit"]))
							{
								$keyword = $_POST["search1"];
								$keyword1 = $_POST["search2"];
								$sql ="select routeId from route_setting where name LIKE '$keyword%' GROUP BY routeId";
								$result=mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
									$sql2="select * from route_setting where routeId='$row[routeId]'";
									$result2=mysqli_query($conn,$sql2);
									while($row2=mysqli_fetch_array($result2)){
										if($row2['name']==$keyword1)
										{
											$sql3="select * from route_description where routeId='$row[routeId]'";
											$result3=mysqli_query($conn,$sql3);
											while($row3=mysqli_fetch_array($result3))
											{
												echo "<table class='table'>";
												?>
												<tr>
									<!--	<td><a href="route_detail.php?id=<?php echo $row3['id'];?>"><?php echo $row3['id']; ?></a></td> -->
									<td><a href="routedetail.php?id=<?php echo $row3['routeId'];?>" ><?php echo $row3['name']; ?></a></td>
										</tr>
										<?php
											}
											}
										}
								}
							}
								
								
					?>
				