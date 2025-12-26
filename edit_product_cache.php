
 <?php 
if(isset($_POST["change"])==true){

    $hName='localhost'; // host name
    $uName='root';   // database user name
    $password='';   // database password
    $dbName = "kafala"; // database name
    $conn = mysqli_connect($hName,$uName,$password,"$dbName");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
      }


                $pid = $_POST["pid"];
                $p = $_POST["p"];
                $s = $_POST["s"];
                $r = $_POST["r"];
                $g = $_POST["g"];
                $t = $_POST["t"];
                $c = $_POST["c"];
                $d = $_POST["desc"];



    $sql3 = "update product
    set price=$p, stock=$s, rating=$r, gender=$g, type=$t, category=$c
    where pid=$pid;";
		
    if ($result3 = $conn->query($sql3)) {
        echo "CHANGE SUCCESSFUL !";
    }
    else
        echo "BAD CONNECTION !";
    


}

?>

