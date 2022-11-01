			
			<div class="row">
			<div class="col-lg-12">
				<div class="heading"><h2>Tất cả sản phẩm</h2></div>

				<div class="products">
				<?php
				
					require 'inc/myconnect.php';
					$result = mysqli_query($conn, 'select count(ID) as total from sanpham' );
					$row = mysqli_fetch_assoc($result);
					$total_records = $row['total'];		
				   
					$offset =1;
					// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
					$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
					$limit = 6;
					// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
					// tổng số trang
					$total_page = ceil($total_records / $limit);
					 
					// Giới hạn current_page trong khoảng 1 đến total_page
					 
					// Tìm Start
					$start = ($current_page - 1) * $limit;
					
					$query="SELECT * from sanpham ORDER BY ID DESC LIMIT $start, $limit;";
					$rs = $conn->query($query);
					if ($rs->num_rows > 0) {
					// output data of each row
					while($row = $rs->fetch_assoc()) {

					?>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="product">
							
							<div class="image"><a <?php echo $row["ID"]?>"><img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px"/></div>
							
							
							<div class="caption">
								<div class="name">
								<?php
            if (isset($_SESSION['txtus']))  {
				?><h3><a href="product.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3><?php
            } else 
			
			{ 				?><h3><a href="account.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3><?php			}
			
        ?> 
		</div>
								
								<div class="price"><?php echo $row["Gia"] ?>.000 VNĐ</div>
							</div>
						</div>
		
					</div>
					<?php
	}
}
				?>
				</div>
				</div>
				<?php

