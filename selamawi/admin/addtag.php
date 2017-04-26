<?php
/**
 * Created by PhpStorm.
 * User: yehuala
 * Date: 6/22/2016
 * Time: 2:59 PM
 */
include "DB.php";

?>

<html>
<head>
    <title>Your Home Page</title>

    <link href="csst.css" rel="stylesheet" type="text/css">

</head>
<body>
<header>

<a href="profile.php" class="action-button shadow animate blue">home</a>
<a href="petitionlist.php" class="action-button shadow animate red">petition list</a>
<a href="addtag.php" class="action-button shadow animate green">add tag</a>
<a href="blockAccount.php" class="action-button shadow animate yellow">block Account</a>
<a href="logout.php" class="action-button shadow animate yellow"> log out</a>
</header>
    <div class="contanier">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
            <label for="tag">write the tag name

            </label>
            <input type="text" name="tag" id="tag">

        
        <input type="submit" id="blue" name="add" value="add">
    </form>
           <?php
    $database=new DB();
    if(isset($_POST['add'])){
        $tag=$_POST['tag'];
        $query="insert into tag (tagName) values('$tag')";
        $stms2=$database->db->query($query);

    
    if ($database->db->query($query) === TRUE) {
        echo "you add succesfully";

    } else {
        echo "Error deleting record: " . $database->db->error;
    }
    }
    ?>
</div>
</body>
</html>
