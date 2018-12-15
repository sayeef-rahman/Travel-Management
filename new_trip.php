<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>New Trip</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script> 

<SCRIPT language="javascript">
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 2) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
            }
            }catch(e) {
                alert(e);
            }
        }
    </SCRIPT>


</head>      

<style>
body {
    background-image: url("../images/d.jpg");
    background-repeat: no-repeat;
	background-size: 110%;

	
}
</style>
<body>



<form action="new_trip_action.php" method="post" enctype="multipart/form-data">
	<table class="table table-bordered">
	<tr>
					<td>Trip code :</td>
					<td><input  type="text"  class="form-control" name="trip_code" required placeholder="example : Dhk12" /></td>
	</tr>

				
	<tr>
					<td>Departure : </td>
					<td><input  type="text"  class="form-control" name="departure" /></td>
	</tr>
					
	<tr>
					<td>Destination : </td>
					<td><input  type="text"  class="form-control" name="destination" /></td>
	</tr>


	<tr>
					<td>Date : </td>
					<td><input  type="date"  class="form-control" name="date" /></td>
	</tr>
</table> 


<div class="w-75 p-3 ">
<table  id="dataTable" class="table table-bordered" >

<tr>
            <th>Select</th>
            <th>Location</th>
            <th>Time</th>
            

</tr>

	 <td><input type="checkbox" class="form-control" name="chk[]" /></td>
	
			<td><input  type="text"  class="form-control" name="location[]" /></td>
	
			<td><input  type="time"  class="form-control" name="time[]" /></td>

		
</div>
	

				

</table>
	<input type="submit" class="btn btn-primary" value="submit" name="submit"/>
	<input type="reset" class="btn btn-primary" value="Reset"/>			
	
</form>

<div class="text-right">


<INPUT type="button" class="btn btn-success " value="Add Row" onClick="addRow('dataTable')" />
<INPUT type="button"  class="btn btn-success" value="Delete Row" onClick="deleteRow('dataTable')" />

</div>


	
				
	

</body>
</html>