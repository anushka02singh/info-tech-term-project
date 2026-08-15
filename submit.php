<?php
require_once 'config.php';

// ✅ Check all expected POST values
$expected = ['html','css','javascript','xml','python','mysql','php','bootstrap','apis','vsCode'];

foreach($expected as $tool){
    if(!isset($_POST[$tool])){
        die("Error: Missing value for $tool.");
    }
}

// ✅ Prepare insert statement
$stmt = $conn->prepare(
  "INSERT INTO info_tech_feedback 
  (html, css, javascript, xml, python, mysql, php, bootstrap, apis, vsCode) 
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
  "iiiiiiiiii", 
  $_POST['html'],
  $_POST['css'],
  $_POST['javascript'],
  $_POST['xml'],
  $_POST['python'],
  $_POST['mysql'],
  $_POST['php'],
  $_POST['bootstrap'],
  $_POST['apis'],
  $_POST['vsCode']
);

// ✅ Execute insert
$success = $stmt->execute();

$stmt->close();
$conn->close();

// ✅✅✅ REDIRECT BACK TO SURVEY (THIS CLEARS THE FORM)
if ($success) {
    header("Location: tools-survey.php?success=1");
} else {
    header("Location: tools-survey.php?error=1");
}
exit();