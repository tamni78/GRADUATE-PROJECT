<?php 

    error_reporting(E_ALL); 
    ini_set('display_errors',1); 

    include('dbcon.php');


    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");


    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {

        // 안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받습니다.

    $rentSeq = $_POST["rentSeq"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $rentFee = $_POST["rentFee"];
    $userID = $_POST["userID"];
    $mcSeq = $_POST["mcSeq"];


        if(!isset($errMSG)) 
        {
            try{
                // SQL문을 실행하여 데이터를 MySQL 서버의 person 테이블에 저장합니다. 
                $stmt = $con->prepare('INSERT INTO RENT (rentSeq, startTime, endTime, rentFee, userID, mcSeq  ) VALUES(:rentSeq, :startTime, :endTime, :rentFee, :userID, :mcSeq)');
                $stmt->bindParam(':rentSeq', $rentSeq);
                $stmt->bindParam(':startTime', $startTime);
                $stmt->bindParam(':endTime', $endTime);
                $stmt->bindParam(':rentFee', $rentFee);
                $stmt->bindParam(':userID', $userID);
                $stmt->bindParam(':mcSeq', $mcSeq);

                if($stmt->execute())
                {
                    $successMSG = "예약 추가했습니다.";
                }
                else
                {
                    $errMSG = "예약 추가 에러";
                }

            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage()); 
            }
        }

    }

?>


<?php 
    if (isset($errMSG)) echo $errMSG;
    if (isset($successMSG)) echo $successMSG;

	$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
   
    if( !$android )
    {
?>
    <html>
       <body>

            <form action="<?php $_PHP_SELF ?>" method="POST">
                rentSeq: <input type = "text" name = "rentSeq" />
                startTime: <input type = "text" name = "startTime" />
                endTime: <input type = "text" name = "endTime" />
                rentFee: <input type = "text" name = "rentFee" />
                userID: <input type = "text" name = "userID" />
                mcSeq: <input type = "text" name = "mcSeq" />
                <input type = "submit" name = "submit" />
            </form>
       
       </body>
    </html>

<?php 
    }
?>
