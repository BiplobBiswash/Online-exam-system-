<?php
session_start();
include 'db.php';

$score = 0;
$total = 0;
$username = $_SESSION['username'];
$answers = [];

$result = $conn->query("SELECT * FROM questions");
while ($row = $result->fetch_assoc()) {
    $qid = $row['id'];
    $correct = $row['correct'];
    $user_ans = $_POST["q$qid"] ?? '';
    $answers[$qid] = $user_ans;
    if ($user_ans === $correct) $score++;
    $total++;
}

$conn->query("INSERT INTO results (username, score, total) VALUES ('$username', $score, $total)");

echo "<h2>Your Score: $score / $total</h2>";
echo "<a href='logout.php'>Logout</a>";
?>