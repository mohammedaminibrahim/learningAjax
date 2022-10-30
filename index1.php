<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load FROM DB</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var counter = 2;
            $("#btn").click(function(){
                counter = counter + 2;
                $("#comments").load(
                    "load-comments.php",
                    
                    {counterVal : counter}
                    
                )
            })
        });
    </script>
</head>
<body>
    
    <div id="comments">
        <?php require_once("./config.php");
        
            
        $sql = "SELECT * FROM comments LIMIT 2";
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

    </div>

    <button id="btn">Show More</button>


</body>
</html>