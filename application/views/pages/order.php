<div class="gear_column2">
                <header><h1>JavaJam Coffee House</h1></header>
                
                <h2 align="center">Shopping Cart</h2>
                    
                  <table id ="cart_table" align="center" border="0" cellpadding="10">
                 <tr id="order_tablerow1">
                 <td align="center"><b>Description</b></td>
                 <td><b>Quantity</b></td>
                 <td><b>Price</b></td>
                            <?php
                          
                                if(isset($_SESSION['numberOfRecords'])){
                                    $numberOfProduct = $_SESSION['numberOfRecords'];
                                }else{
                                    $numberOfProduct = -1;
                                }
                                $prodNumber = 0;
                                //echo $_SESSION['desc0'];
                                while($numberOfProduct >= 0 ){
                                    if(isset($_SESSION['desc'.$prodNumber])){
                                        echo '<tr id="order_tablerow1">';
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

                                echo '<tr id="order_tablerow1"><td></td><td>Total</td><td>$'.$total.'</td></tr>';

                            ?>
                           
                               </table>
                      
                <?php
                  
                            
                            if(isset($_POST["submit"])){
                               if($this->form_validation->run() == TRUE){
                                    echo "<p> Your order is placed Successfully ! </p>";
                                }//end of inner if
                            }//end of of submit
                            $attributes = array('id' => 'order_form');
                            echo form_open('gears/checkValidationErrors',$attributes);

                        //<fieldset>
                            $att= array ('class' => 'order_fs');
                            echo form_fieldset('Fill Details',$att);
                            //<!--<legend>Fill Details:</legend>-->

                            echo '<table cellpadding="5" class="order_table" align="center">';
                               echo '<tr>';
                           
                          
                                echo "<td>" .form_label('Name:') . "</td>";
                              
                                $data_name = array('name'=>'myName', 'id'=>'myName', 'placeholder'=>'Please Enter Name');
                                echo "<td>" .form_input($data_name). "</td>";
                                echo '<div class = "error">';
                                echo form_error('myName');
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>" .form_label('Email:'). "</td>";
                               
                                $data_email = array('name'=>'myEmail', 'id'=>'myEmail', 'placeholder'=>'xyz@abc.com');
                                echo "<td>".form_input($data_email)."</td>";
                                echo '<div class = "error">';
                                echo form_error('myEmail');
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>".form_label('Address:')."</td>";
                               
                                $data_address = array('name'=>'myAddress', 'id'=>'myAddress', 'placeholder'=>'Enter Address');
                                echo "<td>".form_input($data_address)."</td>";
                                echo '<div class = "error">';
                                echo form_error('myAddress');
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>".form_label('City:')."</td>";
                                
                                $data_city = array('name'=>'myCity', 'id'=>'myCity', 'placeholder'=>'Enter City');
                                echo "<td>".form_input($data_city)."</td>";
                                echo '<div class = "error">';
                                        echo form_error('myCity');
                               echo "</tr>";

                                echo "<tr>";
                                echo "<td>".form_label('State:')."</td>";
                               
                                $data_state = array('name'=>'myState', 'id'=>'myState', 'placeholder'=>'Enter State');
                                echo "<td>".form_input($data_state)."</td>";
                                echo '<div class = "error">';
                                        echo form_error('myState');
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>".form_label('Zip:')."</td>";
                               
                                $data_zip = array('name'=>'myZip', 'id'=>'myZip', 'placeholder'=>'Enter Zip');
                                echo "<td>".form_input($data_zip)."</td>";
                                echo '<div class = "error">';
                                        echo form_error('myZip');
                                echo "</tr>";


                                echo "<tr>";
                                echo "<td>".form_label('Credit Card:')."</td>";
                              
                                $data_credit = array('name'=>'myCredit', 'id'=>'myCredit', 'placeholder'=>'Enter Credit Card Number');
                                echo "<td>".form_input($data_credit)."</td>";
                                echo '<div class = "error">';
                                        echo form_error('myCredit');
                               echo "</tr>";

                                echo "<tr>";
                                echo "<td>".form_label('Month:')."</td>";
                              
                                $data_month = array('name'=>'myMonth', 'id'=>'myMonth', 'placeholder'=>'Enter the Month');
                                echo "<td>".form_input($data_month)."</td>";
                                echo '<div class = "error">';
                                        echo form_error('myMonth');
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>".form_label('Year:')."</td>";
                                
                                $data_year = array('name'=>'myYear', 'id'=>'myYear', 'placeholder'=>'Enter the Year');
                                echo "<td>".form_input($data_year)."</td>";
                                echo '<div class = "error">';
                                        echo form_error('myYear');
                               echo "</tr>";

                           //<!-- <input id = "orderButton" type="submit" name="Place Order" value="Order Now" onclick="insertOrdersToDb()">-->
                               echo "<tr></tr><tr><td></td>";
                            echo '<td><input id = "orderButton" type="submit" name="submit" value="Order Now"></td>';
                        //</fieldset>
                            echo "</table>";
                           echo form_fieldset_close();
                    //</form>
                           echo form_close();

                           
                           ?>
                 
   </div>