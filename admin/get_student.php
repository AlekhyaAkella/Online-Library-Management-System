<?php 
require_once("includes/config.php");
if(!empty($_POST["studentid"]))
 {
  	$studentid= strtoupper($_POST["studentid"]);
	$sql ="SELECT FullName,Status ,StudentId FROM tblstudents WHERE StudentId=:studentid";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':studentid', $studentid, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;


if($query -> rowCount() > 0)
{
	foreach ($results as $result)
	{
	 if($result->Status==0)
	 {
		$_SESSON['stuid']=$result->StudentId;
	
		echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
		echo "<b>Student Name-</b>" .$result->FullName;
		echo  "<b>issued books-</b>" .$result->count(StudentId);
 		echo "<script>$('#submit').prop('disabled',true);</script>";
     } 
     else 
 	 {
		?>
		<?php  
		echo "Student Name: ";
		echo htmlentities($result->FullName);
		//echo nl2br("\n");
/*BOOKS ISSUED*/
		$sql1 ="SELECT StudentId from tblissuedbookdetails where StudentID=:studentid";
        $query1 = $dbh -> prepare($sql1);
        $query1->bindParam(':studentid',$studentid,PDO::PARAM_STR);
        $query1->execute();
        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
        $issuedbooks=$query1->rowCount();
		?>
						<table>

                             <td>Books Issued:</td>
                             <td><h3><?php echo htmlentities($issuedbooks);?> </h3></td>
 					   </table>

<!--BOOKS REURNED-->					   
<?php
$rsts=1;
$sql2 ="SELECT StudentId from tblissuedbookdetails where StudentID=:studentid and RetrunStatus=:rsts";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':studentid',$studentid,PDO::PARAM_STR);
$query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>
						<table>                      
	                         <td> Books Returned:</td>
                            <td><h3><?php echo htmlentities($returnedbooks);?></h3></td>
                        </table>
                          
                            

				<?php echo "<script>$('#submit').prop('disabled',false);</script>";
	 }
   }
} 
 else
 {
  
  echo "<span style='color:red'> Invalid Student Id. Please Enter Valid Student Id .</span>";
  echo "<script>$('#submit').prop('disabled',true);</script>";
 }
}


?>
