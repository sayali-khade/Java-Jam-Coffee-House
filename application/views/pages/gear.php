<div class="gear_column2">
				<header><h1>JavaJam Coffee House</h1></header>
				<img id="couch1" src="<?php echo base_url();?>.\images\couch.jpeg" height="180px" width="100%" >
				<h2> JavaJam Gear</h2>
				<p> JavaJam gear not only looks good, it's good to your wallet, too.<br>
					Get a 10% discount when you wear a JavaJam shirt or bring in your JavaJam Mug!
				</p>
					
					<?php
					$pro1 = 0;
					foreach($products as $rec)
					{
					
                                

                                 
        			    echo "<form method='POST' action='gears/addToCart')>";
                        echo "<table>";
                        echo "<tr>";
                        echo "<td align='left' rowspan='2'><img height='100px' width='100px' src=".$rec -> Product_Image_URL."></td>";
                      	echo "<td valign='top' align='left'>".$rec -> Name.' '.$rec -> Description. ' '.$rec -> Price."</td>";
                        echo "</tr>";
                        echo form_open('gears/addToCart');         
                  	   	echo '<input type="hidden" name="desc'.$pro1.'" id="desc'.$pro1.'" value="'.$rec ->Name.'">';
                        echo '<input type="hidden" name="cost'.$pro1.'" id="cost'.$pro1.'" value="'.$rec ->Price.'">'; 
                        echo '<input type="hidden" name="proId'.$pro1.'" id="proId'.$pro1.'" value="'.$rec->ProductId.'">';
                        $pro1 = $pro1 + 1;
                         $_SESSION['dbRecords'] = $pro1;

                        echo "<tr>";
                        echo "<td align='left' valign='top'><input type='submit' name = 'submit' value ='Add to Cart'></td>";
                        echo "</tr>";
                        echo "</table>";
                        echo '</form>';
                                      


					}

				?>
          
</div>