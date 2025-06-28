<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $q = $_POST['question'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $correct = $_POST['correct'];
    $conn->query("INSERT INTO questions (question, option_a, option_b, option_c, option_d, correct) 
                  VALUES ('$q', '$a', '$b', '$c', '$d', '$correct')");
    echo "Question added.<br><br>";
}
?>
<form method="POST">
    Question: <input type="text" name="question"><br>
    A: <input type="text" name="a"><br>
    B: <input type="text" name="b"><br>
    C: <input type="text" name="c"><br>
    D: <input type="text" name="d"><br>
    Correct (A/B/C/D): <input type="text" name="correct"><br>
    <input type="submit" value="Add Question">
</form>