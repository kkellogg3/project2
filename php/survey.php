<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Florida Residence Survey</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="../css/style.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>
    <?php
    
    $servername = getenv('kkellogg-valenciawebcoding-kendallkellogg92.c9users.io');
    $username = 'kendallkellogg92';
    $password = "";
    $database = "c9";
    $dbport = 3306;
    $dbname = "p2survey";
    
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
    if ($db->connect_error) {
        die("ConnectionFailed: " . $db->connect_error);
    }
    
    echo ("Connected Successfully: " . $db->host_info);
    
    mysquli_select_db($db, $dbname);
    
    if (empty($result)) {
        $sql = "CREATE TABLE project02(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, question1, question2, question3, question4, question5, question6)";
        
        if ($db->query($sql) === TRUE) {
            print_r("<br>Table p2survey was created successfully.");
        } else {
            print_r("<br>There was an error createing the table: " . $db->error);
        }
    }
    
    $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
            $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
            $question_1 = $_POST['radio_group_1'];
            $question_2 = $_POST['radio_group_2'];
            $question_3 = $_POST['radio_group_3'];
            $question_4 = $_POST['radio_group_4'];
            $question_5 = $_POST['radio_group_5'];
            $question_6 = $_POST['radio_group_6'];
            
            $survey_insert = "INSERT INTO p2survey (firstname, lastname, question1) VALUES ('$first_name', '$last_name', '$question_1')";
            
            if (mysquli_query($db, $survey_insert)) {
                print_r("<br>Record added successfully.");
            } else {
                print_r("<br>Error: " . mysquli_error($db));
            }
            
            print_r("<h1>Our Current Survey Results</h1>");
            
            $sql = "SELECT id, firstname, lastname, question1 FROM p2survey";
            $surveyresult = $db->query($sql);
            
            if ($surveyresult->num_rows > 0) {
                
                while ($row = $surveyresult->fecth_assoc()) {
                    echo "Participant ID: " . $row["id"] . "<br>Participant Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>Question 1: " . $row["question1"] . "<br>Question 2: " . $row["question2"] . "<br>Question 3: " . $row["question3"] . "<br>Question 4: " . ["question4"] . "<br>Question 5: " . ["question5"] . "<br>Question 6: " . ["question6"] . "<br><br>";
                }
            } else {
                print_r("<br>No results to display.");
            }
            
            $db->close();
            
    
    
    ?>
    
    <a href="../index.html">Back to Form</a>
   </body> 
   </html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    