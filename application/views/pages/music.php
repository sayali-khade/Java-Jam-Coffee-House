			<div class="music_column2">
				<header><h1>JavaJam Coffee House</h1></header>
				<img src=".\images\heroguitar.jpg" height="225px" width="100%" id="windingroad1">
				<h3 id="music_heading">Music at JavaJam</h3>
				<p>The first Friday night each month at JavaJam is a special night.Join us from 8pm to 11pm for some music you won't want to miss!
				</p>
				<?php
					$monthname="";
					foreach($artist as $rec)
					{
						if ($rec ->Month==$monthname) {
							echo "<table align='center' width='517' id='music_table'>";
								echo "	<tr>
								<td id='melanie_img'><img src=".$rec ->Musician_Image_URL." width='60px' height='60px'></td>
								<td id='music_text1'>".' ' .$rec ->Name.' '.$rec ->Description."</td>
								</tr>";
								echo "</table>";
								$monthname=$rec ->Month;

						}
						else{
							echo "<p id='Jan'>".$rec ->Month."</p>";
								echo "<table align='center' width='517' id='music_table'>";
								echo "	<tr>
								<td id='melanie_img'><img src=".$rec ->Musician_Image_URL." width='60px' height='60px'></td>
								<td id='music_text1'>".' ' .$rec ->Name.' '.$rec ->Description."</td>
								</tr>";
								echo "</table>";
								$monthname=$rec ->Month;
						}

					}

				?>