<?php
// process_form.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo  $question = $_POST["question"];
    echo  $questionType = $_POST["question_type"];
    echo   $options = $_POST["options"]; // This will be an array for dropdown, checkboxes, and radio_buttons types

    // Process the data and store it in the database
    // You'll need to write the appropriate code to handle database operations
     
}
?>
