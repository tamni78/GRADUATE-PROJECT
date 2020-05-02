<?php
    $con = mysqli_connect("jin10.dothome.co.kr", "jin10", "rudgh0730!", "jin10");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];
    
    $stmt = $con->prepare('select * from MC');
    $stmt->execute();

    if ($stmt->rowCount() > 0)
    {
        $data = array(); 

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
    
            array_push($data, 
                array('mcSeq'=>$mcSeq,
                'mcNum'=>$mcNum,
                'yata_zone'=>$yata_zone
            ));
        }

        header('Content-Type: application/json; charset=utf8');
        $json = json_encode(array("webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
        echo $json;
    }



?>
