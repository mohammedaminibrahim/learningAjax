<?php require_once("./config.php");
        
        $counter = $_POST['counterVal'];
        $sql = "SELECT * FROM comments LIMIT $counter";
        $statement = $conn->prepare($sql);
        $results = $statement->execute();
        $colums = $statement->fetchAll();

        foreach($colums as $colum){
            echo $colum['message'];

            echo "<br>";

            echo " ";
            echo $colum['author'];
        }
        
        ?>