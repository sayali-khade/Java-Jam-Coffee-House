<div class="column2">
				<header><h1>JavaJam Coffee House</h1></header>
				<div id="jobs_div"></div>
				<h2>Jobs at JavaJam</h2>
				<p>Want to work at JavaJam? Fill out the form below to start your application.Required fields are marked with an asterisk (*).</p>
				<?php
							if($this->uri->segment(2)=="inserted")
							{
								echo "Data Inserted Successfully!";
							}
						?>		

					<?php

							 
                            $attributes = array('id' => 'jobs_form');
                            echo form_open('jobs/form_validation',$attributes);

                            echo '<table cellpadding="5" id="jobs_table">';
                            echo '<tr>';
                             echo "<td>" .form_label('Name:') . "</td>";
                              
                                $data_name = array('name'=>'name', 'placeholder'=>'Please Enter Name');
                                echo "<td>" .form_input($data_name). "</td>";
                                echo '<div class = "error">';
                                echo form_error('name');
                            echo "</tr>";

                            echo "<tr>";
                                echo "<td>" .form_label('Email:'). "</td>";
                               
                                $data_email = array('name'=>'email', 'placeholder'=>'xyz@abc.com');
                                echo "<td>".form_input($data_email)."</td>";
                                echo '<div class = "error">';
                                echo form_error('email');
                            echo "</tr>";
                           
                            echo "<tr>";
                                echo "<td>" .form_label('Experience:'). "</td>";
                               
                                $data_exp = array('name'=>'experience', 'placeholder'=>'Please enter experience');
                                echo "<td>".form_input($data_exp)."</td>";
                                echo '<div class="error">';
                                echo form_error('experience');
                                echo "</div>";
                            echo "</tr>";

                            echo "<tr>";
								echo '<td><input type="submit" name="submit" value="Apply Now"></td>';
							echo "</tr> </table>";
							 echo form_close();
					?>

			</div>