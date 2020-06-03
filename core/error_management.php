<?php 


class error_management{

	public static function table_css_style(){

		echo "
			<style>
				table#tablaError{
					border:1px solid #000;
				}

				#tablaError tr{
					border:1px solid #000;
					padding: 5px;
				}
			
				#tablaError td{
					border:1px solid #000;
					padding: 5px;
				}

				table .Merror{
					color: red;
				}

				table .importante{
					color:blue;
					font-weight:bold;
				}

			</style>
		";

	}

	public static function error_table($error_data, $code){

		error_management::table_css_style();

		echo "<table id='tablaError'>
				<tr>
					<th colspan='2'>PDO ERROR MANAGEMENT: </th>
				</tr>
				<tr>
					<td><strong>ERROR FILE: </strong></td>
					<td class='Merror'>".$error_data[0]["file"]."</td>
				</tr>
				<tr>
					<td><strong>FUNCTION:</strong></td>
					<td class='Merror'>".$error_data[0]["function"]."</td>
				</tr>
				<tr>
					<td><strong>CLASS:</strong></td>
					<td class='Merror'>".$error_data[0]["class"]."</td>
				</tr>
				<tr>
					<td><strong>LINE: </strong></td>
					<td class='Merror'>#".$error_data[0]["line"]."</td>
				</tr>";

		if ($code=="42S02") {
			
			echo "<tr>
					<td><strong>DESCRIPTION: </strong></td>
					<td class='Merror'>THIS TABLE DOES NOT EXIST!</td>
				</tr>";
		}

		if ($code=="42S22") {
			echo "<tr>
					<td><strong>DESCRIPTION: </strong></td>
					<td class='Merror'>A FIELD OF QUERY IS WRONG!</td>
				</tr>";
		}

		if ($code=="1049") {
			echo "<tr>
					<td><strong>DESCRIPTION: </strong></td>
					<td class='Merror'>DATA BASE DOES NOT EXIST!</td>
				</tr>";
		}

		if ($code=="2002") {
			echo "<tr>
					<td><strong>DESCRIPTION: </strong></td>
					<td class='Merror'>SOMETHING WRONG WITH THE DNS!</td>
				</tr>";
		}

		if ($code=="1045") {
			echo "<tr>
					<td><strong>DESCRIPTION: </strong></td>
					<td class='Merror'>USER <span class='importante'>"
					.$error_data[0]["args"][1]."</span> DOES NOT EXIST OR PASSWORD IS WRONG!</td>
				</tr>";
		}

		if ($code=="42000") {
			echo "<tr>
					<td><strong>DESCRIPTION: </strong></td>
					<td class='Merror'>SOMETHING WRONG WITH QUERY!</td>
				</tr>";	
		}

		echo "</table>";

	}



}



