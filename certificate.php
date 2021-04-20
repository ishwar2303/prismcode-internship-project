<?php 

    require_once('connection.php');
    require_once('middleware.php');
    if(isset($_GET['cid'])){
        $certificate_id = base64_decode(cleanInput($_GET['cid']));
        $sql = "SELECT * FROM certifications WHERE certificate_id='$certificate_id'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $quiz_name = $row['quiz_name'];
            $candidate_name = $row['candidate_name'];
            $score = $row['score'];
            $date = $row['date'];
            $date = new DateTime($date);
            $day = $date->format('d');
            $month = $date->format('F');
            $year = $date->format('Y');
        }
        else{
            $_SESSION['message'] = 'No certificate was found';
            $_SESSION['color'] = 'red';
            header('Location: index.php');
            exit;
        }
    }
    else{
        $_SESSION['message'] = 'Provid certificate ID';
        $_SESSION['color'] = 'red';
        header('Location: index.php');
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certification</title>
    <link rel="stylesheet" href="css/custom/certification.css">
    <script src="https://kit.fontawesome.com/f9bbf9ac4e.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="certificate-block">
            <div class="certificate-header">
                <h1 class="site-logo">QuizWit</h1>
                <h2 class="flex-col">
                    <span style="font-size:50px;">
                        <i class="fas fa-award" style="color:#7b41a7;"></i>
                    </span>
                    <span style="color:#676767;">Verified</span>
                </h2>
            </div>
            <div class="main-heading">
                <h2>Certificate of Achievement</h2>
            </div>
            <div class="date"><?php echo $day.' '.$month.', '.$year; ?></div>
            <div class="candidate-name">
                <div style="text-transform:capitalize;color:#a43db7;"><?php echo $candidate_name; ?></div>
            </div>
            <div class="message">
                <div>has shown excellent performance in <b><?php echo $quiz_name; ?> </b> test by scoring <?php echo $score; ?>%</div>
            </div>


            <!-- border design -->
            <div class="white-bar-1">
                <div class="cut-1"></div>
                <div class="line-1"></div>
            </div>
            <div class="white-bar-2">
                <div class="cut-2"></div>
                <div class="line-2"></div>
            </div>
            <div class="white-bar-3">
                <div class="cut-3"></div>
                <div class="line-3"></div>
            </div>
            <div class="white-bar-4">
                <div class="cut-4"></div>
                <div class="line-4"></div>
            </div>
        </div>

    </div>
</body>
</html>