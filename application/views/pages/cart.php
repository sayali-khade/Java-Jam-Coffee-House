<div class="column2">
                <header><h1>JavaJam Coffee House</h1></header>
            
                <h2 align="center">Shopping Cart</h2>
                
        <table id ="cart_table" align="center" border="0" cellpadding="10">
                         <tr id="cart_tablerow1">
                              <td align="center"><b>Description</b></td>
                                      <td><b>Quantity</b></td>
                                      <td><b>Price</b></td>

							<?php 
                                $qty1 = 1;
                                $qty =1;
                                $cost1 = 0;
                                $numberOfRecords = 0; //number of records in session
                                $prodNumber = 0;
                                $currentProduct = "";
                                $totalCost = 0;
                                $num_dbRecords = 0; // number of records in db
                                if(isset($_POST["submit"])){
                                    if(isset($_SESSION['numberOfRecords'])){
                                        $_SESSION['numberOfRecords'] = $_SESSION['numberOfRecords'] + 1;
                                    }else{
                                        $_SESSION['numberOfRecords'] = 1;
                                        //echo $_SESSION['numberOfRecords'];                    
                                    }//end of if
                                    
                                    if (isset($_SESSION['dbRecords']))
                                    {
                                        $num_dbRecords = $_SESSION['dbRecords'];
                                       // echo "sahi";
                                    }else{
                                        $num_dbRecords = 10;
                                    }
                                    $num_dbRecords = $num_dbRecords - 1;
                                    //get Number of records in DB
                                    $numberOfRecords = $_SESSION['numberOfRecords'];
                                    
                                    while($num_dbRecords >= 0){
                                        //echo $num_dbRecords;
                                        if(isset($_POST["desc".$prodNumber])){
                                            echo '<tr id="cart_tablerow1">';
                                            echo '<td>'.$_POST["desc".$prodNumber] .'</td>';
                                            $_SESSION['cost'.$prodNumber] = $_POST["cost".$prodNumber];
                                            $_SESSION['desc'.$prodNumber] = $_POST["desc".$prodNumber];
                                            $_SESSION['proId'.$prodNumber] = $_POST["proId".$prodNumber];
                                            
                                            //kepp track of current product to display other selected products
                                            $_SESSION['currentProduct'] = $_POST["desc".$prodNumber];
                                            if(isset($_SESSION['Qty'.$prodNumber])){
                                                $_SESSION['Qty'.$prodNumber] = $_SESSION['Qty'.$prodNumber] + 1;   
                                            }
                                            else{
                                                $_SESSION['Qty'.$prodNumber] = 1;
                                            }
                                            $qty = $_SESSION['Qty'.$prodNumber];
                                            echo '<td> '.$qty. '</td>';
                                            $cost1 = $_SESSION["cost".$prodNumber] * $qty;
                                            echo '<td>$'.$cost1 .'</td>';
                                            echo '</tr>';
                                        }/* end of first*/
                                        $num_dbRecords = $num_dbRecords - 1;
                                        $prodNumber = $prodNumber + 1;
                                    }//end of while

                                    $prodNumber = 0;
                                    while($numberOfRecords >= 0)
                                    {
                                        if(isset($_SESSION['desc'.$prodNumber])){
                                            if($_SESSION['desc'.$prodNumber] != $_SESSION['currentProduct']){
                                                echo '<tr id="cart_tablerow1">';
                                                echo '<td>'.$_SESSION['desc'.$prodNumber] .'</td>';
                                                $qty = $_SESSION['Qty'.$prodNumber];
                                                echo '<td> '.$qty. '</td>';
                                                $cost1 = $_SESSION['cost'.$prodNumber] * $qty;
                                                echo '<td>$'.$cost1.'</td>';
                                                echo '</tr>';   
                                            }//current product 
                                        }//end of if session
                                        $numberOfRecords = $numberOfRecords - 1;
                                        $prodNumber = $prodNumber + 1;
                                    }//end of while
                                        
                                   
                                    $numberOfRecords = 4;
                                    
                                    $prodNumber = 0;
                                    while($numberOfRecords >= 0){
                                        //echo "in Wbhile";
                                        if(isset($_SESSION['desc'.$prodNumber])){
                                            $totalCost = $totalCost + ($_SESSION['cost'.$prodNumber] * $_SESSION['Qty'.$prodNumber]);
                                        }//end of if
                                        $prodNumber = $prodNumber + 1;
                                        $numberOfRecords = $numberOfRecords - 1;
                                    }//end while
                                    echo '<tr id="cart_tablerow1"><td></td><td>Total</td><td>$'.$totalCost.'</td></tr>';

                                }else{
                                    if(isset($_SESSION['numberOfRecords'])){
                                        $numberOfProduct = $_SESSION['numberOfRecords'];
                                    }else{
                                        $numberOfProduct = -1;
                                    }
                                $prodNumber = 0;
                                while($numberOfProduct >= 0 ){
                                    if(isset($_SESSION['desc'.$prodNumber])){
                                        echo '<tr id="cart_tablerow1">';
                                        echo '<td id = "product">'.$_SESSION['desc'.$prodNumber] .'</td>';
                                        echo '<td id = "qty"> '.$_SESSION['Qty'.$prodNumber].' </td>';
                                        $cost = $_SESSION['Qty'.$prodNumber] * $_SESSION['cost'.$prodNumber]; 
                                        echo '<td id = "price">$'.$cost.'</td>';
                                        echo '</tr>';
                                    }//end of if
                                    $prodNumber = $prodNumber  + 1;
                                    $numberOfProduct = $numberOfProduct - 1;
                                }//end of while
                                $total = 0;
                                $numberOfRecords = 0;
                                if(isset($_SESSION['numberOfRecords'])){
                                    $numberOfRecords = $_SESSION['numberOfRecords'];
                                }else{
                                    $numberOfRecords = -1;
                                }
                                $prodNumber = 0;
                                while($numberOfRecords >= 0){
                                    //echo "in Wbhile";
                                    if(isset($_SESSION['desc'.$prodNumber])){
                                        $total = $total + ($_SESSION['cost'.$prodNumber] * $_SESSION['Qty'.$prodNumber]);
                                    }//end of if
                                    $prodNumber = $prodNumber + 1;
                                    $numberOfRecords = $numberOfRecords - 1;
                                }//end while
                                echo '<tr id="cart_tablerow1"><td></td><td>Total</td><td>$'.$total.'</td></tr>';
                            } //end of submit
/************************************************************************/
                            //echo "</table>";
                                # close the connection    
                        ?>
                        <tr>
                            <td>
                                <form method="post" action="<?php echo base_url();?>gears" align="center">
                                <input type="submit" name="continue" value="Continue Shopping"">
                                </form>
                            </td>
                            <td>
                                <form method="post" action="<?php echo base_url();?>gears/placeyourorder" >
                                <input type="submit" name="submit" value="Place Order" class="cart_input" >
                                </form>
                            </td>
                        </tr>
                        </table>
               </div>

</div>