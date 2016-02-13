<div class="perfumelist">
    		<?php 
    			require_once 'functions.php';
    				
				$query = "SELECT * from perfumes where brand_name ='".$_POST['brand_name']."'";
			
			   $result = fetchWithQuery($query);
			   ?>
			       	<div class="brand_name"><h4 class="brand"><? echo $_POST['brand_text']?></h4></div>

				<ul>
				<?
				$count = mysqli_num_rows($result); 
				$current_count = 0;
				while ($row=mysqli_fetch_array($result)){
    				?>
    				
					<li style="<?php if($current_count==3 || $current_count==7){
										echo "margin-right:0px;";
										}
									if($current_count > 3){
										echo "margin-top:10px;";
										}
								?>"><a href="selected.php?id=<?echo $row['id'] ?>"><img class="listed" src="<? echo "perfumes/".$row['pic_url'] ?>" alt="perfume" /></a>
						<div class="product-info <?php 
						
						if($current_count == ($count - 1))
							echo "last_element";
						
						?>">
							<h5 class="ltitle"><? echo $row['product_name']?></h5>
							<h5 class="lprice">&euro; <? echo $row['price']?></h5>
						</div>
					</li>
					<? 	$current_count ++; } ?>
				</ul>
				
</div>