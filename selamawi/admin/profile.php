<?php
/**
 * Created by PhpStorm.
 * User: yehuala
 * Date: 6/21/2016
 * Time: 6:24 PM
 */
include('session.php');
//require 'DB.php';

$year=[1=>'Year',2=>'I',3=>'II',4=>'III',5=>'IV',6=>'V'];
$semister=[1=>'Semister',2=>'I',3=>'II',4=>'III'];
$section=[1=>'Section',2=>'1',3=>'2',4=>'3',5=>'4',6=>'5',7=>'6'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Home Page</title>

    <link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
<a href="profile.php" class="action-button shadow animate blue">home</a>
<a href="petitionlist.php" class="action-button shadow animate red">petition list</a>
<a href="addtag.php" class="action-button shadow animate green">add tag</a>
<a href="blockAccount.php" class="action-button shadow animate yellow">block Account</a>
<a href="logout.php" class="action-button shadow animate yellow"> log out</a>
        <?php
      include"DB.php";
        //$query=mysql_query("select petID,title from petition where status=2",$connection);
        $database=new DB();
      /*  $query="select petID,title from petition where status=2";
        $stms=$database->db->query($query);
        if($stms->num_rows>0){
            echo"<ol>";
            foreach($stms as $item){
                echo"<li>". $item['title']."</a>";
                echo"<ul><li><a href='profile.php?petID=".$item['petID'] . "&type=yes' title='click to blick the message'> <input type='submit' value='yes'> </a></li>";
                echo"<li> <a href='profile.php?petID=".$item['petID'] . "&type=no' title='click to pass as it is!'><input type='submit' value=' No'> </a></li></ul></li>";
            }
            echo"</ol>";
        }
        else{
            echo "";
        }

        if (isset($_GET['petID']) and isset($_GET['type'])){
            if($_GET['type']=='yes')
                $status = '3';
            else
                $status = '1';

            $query="update petition set status='$status' where petID=". (int)$_GET['petID'];
            $stms2=$database->db->query($query);

        }
        if ($database->db->query($query) === TRUE) {
            echo "Record are changed successfully";
        } else {
            echo "" . $database->db->error;
        }

    */

        //$database->db->close();
        ?>
    </div>
    <div></div>
</div>

<div>
    <?php
    //include "DB.php";
    //$database = new DB();
    $fname=$lname=$id=$email=$department="";
    $mname=$semister1=$section1=$year1="";
    if(isset($_POST['create'])) {
        if (isset($_POST['first_name'])) {
            $fname = $_POST['first_name'];
        }
        if(isset($_POST['middle_name'])){
            $mname=$_POST['middle_name'];
        }

        if (isset($_POST['last_name'])) {
            $lname = $_POST['last_name'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        if (isset($_POST['department'])) {
            $department = $_POST['department'];
        }
        if(isset($_POST['section'])){
            $section=$_POST['section'];
        }
        if(isset($_POST['Semister'])){
            $semister=$_POST['Semister'];
        }
        if(isset($_POST['year'])){
            $year=$_POST['year'];
        }
        /*
        if($database->db->connect_error){
        echo"you are not connercted to the database";
        }
        else{
        echo"you are conneted";
        }
        */

        $query = "INSERT INTO student(fname,mname,lname,ID,email,semester,year,section,department) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $database->db->prepare($query);
        $stmt->bind_param("sssssiiii", $fname,$mname, $lname,$id, $email,$semister,$year,$section, $department);
        if ($stmt->execute()) {
            echo "<script type='javascript'>alert('you are succesfully register')</script>";
        } else {
            die("unable to register");
        }


    }

    ?>

    <div class="container">
        <div class="row header">
            <h1>Registe user &nbsp;</h1>
            <h3>Fill out the form below to register!</h3>
        </div>
        <div class="row body">
            <form name="account" method="post" action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>">
                <ul>

                    <li>
                        <p class="left">
                            <label for="first_name">first name</label>
                            <input type="text" name="first_name" placeholder="John" />
                        </p>
                        <p class="left">
                            <label for="middle_name">middle name</label>
                            <input type="text" name="middle_name" placeholder="John" />
                        </p>
                        <p class="pull-right">
                            <label for="last_name">last name</label>
                            <input type="text" name="last_name" placeholder="Smith" />
                        </p>
                    </li>

                    <li>
                        <p>
                            <label for="email">email <span class="req">*</span></label>
                            <input type="email" name="email" placeholder="john.smith@gmail.com" />
                        </p>
                        <p>
                            <label for="email">ID <span class="req">*</span></label>
                            <input type="text" name="id" placeholder="john.smith@gmail.com" />
                        </p>
                    </li>
                    <li>
                        <p>
                            <?php $semister=[1=>'Semister',2=>'I',3=>'II',4=>'III'];?>
                            <label for="email">semister <span class="req">*</span></label>
                            <select name="semister">
                                <?php foreach($semister as $key=>$elem){

                                    echo "<option value='$key'>$elem</option>";
                                }
                                ?>
                            </select>
                        </p>
                        <p>

                            <?php
                            $year=[1=>'Year',2=>'I',3=>'II',4=>'III',5=>'IV',6=>'V'];
                            ?>
                            <label for="email">year <span class="req">*</span></label>
                            <select name="year">
                                <?php
                                foreach($year as $k=> $item){
                                echo"<option value='$k'>$item</option>";
                                }
                                ?>
                            </select>
                        </p>
                    </li>
                    <li>
                        <p><?php
                            $section=[1=>'Section',2=>'1',3=>'2',4=>'3',5=>'4',6=>'5',7=>'6'];
                            ?>
                            <label for="email">section <span class="req">*</span></label>
                            <select name="section">
                                <?php
                                foreach($section as $ke=>$el){
                                    echo "<option value='$ke'>$el</option>";
                                }
                                ?>
                            </select>
                        </p>
                        <p>
                            <?php
                            $department=[
                                1 => 'Software Engineering',
                                2 => 'Mechanical Enginnering',
                                3 => 'Bio medical Engineering',
                                4 => 'Civil Engineering',
                                5 => 'Computer and Electrical Engineering',
                                6 => 'Chemical Engineering',
                                7 => 'Information Technology (IT)']
                            ?>
                            <label for="email">department <span class="req">*</span></label>
                            <select name="department">
                                <?php foreach($department as $key=>$item){
                                    echo "<option value='$key'>$item</option>";
                                }
                                ?>
                            </select>
                        </p>
                    </li>

                    <li>
                        <input class="btn btn-submit"  name="create" type="submit" value="Submit" />
                    </li>

                </ul>
            </form>
        </div>
    </div>

</body>
</html>