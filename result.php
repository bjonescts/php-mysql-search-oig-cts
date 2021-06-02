<?php
$conn = mysqli_connect("192.168.134.129", "adminer", "Teamcts123","oig");
//mysql_select_db("oig", $conn);
//search code
//error_reporting(0);
if($_REQUEST['submit']){
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];

if(empty($lname)){
        $make = '<h4>You must type a word to search!</h4>';
}else{
        $make = '<h4>No match found!</h4>';
        $sele = "SELECT * FROM oig WHERE lastname LIKE '%$lname%' AND firstname LIKE '%$fname%'";
        $result = mysqli_query($conn,$sele);

        if($row = mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                echo '<h4> Last name                                             : '.$row['lastname'];
                echo '<br> First name                                            : '.$row['firstname'];
                echo '<br> Business Name                                         : '.$row['busname'];
                echo '<br> General Information                                   : '.$row['general'];
                echo '<br> Specialty                                             : '.$row['specialty'];
                echo '<br> Address                                               : '.$row['address'];
                echo '<br> City                                                  : '.$row['city'];
                echo '<br> ZIP                                                   : '.$row['zip'];
                echo '<br> DOB                                                   : '.$row['dob'];
                echo '<br> EXCL Type                                             : '.$row['excltype'];
                echo '<br> EXCL Date                                             : '.$row['excldate'];
                echo '</h4>';
        }
}else{
echo'<h2> Search Result</h2>';

print ($make);
}
mysqli_free_result($result);
mysqli_close($conn);
}
}

?>
