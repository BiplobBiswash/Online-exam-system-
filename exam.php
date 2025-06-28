<?php
session_start();
if (!isset($_SESSION['logged_in'])) header("Location: login.php");

include 'db.php';
$result = $conn->query("SELECT * FROM questions ORDER BY RAND()");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        let timer = 60 * 5; // 5 minutes
        function startTimer() {
            const interval = setInterval(function () {
                let minutes = Math.floor(timer / 60);
                let seconds = timer % 60;
                document.getElementById("timer").textContent = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
                if (--timer < 0) {
                    clearInterval(interval);
                    document.getElementById("examForm").submit();
                }
            }, 1000);
        }
    </script>
</head>
<body onload="startTimer()" class="container mt-4">
    <h3>Online Exam</h3>
    <div><strong>Time Left:</strong> <span id="timer">5:00</span></div>
    <form id="examForm" action="submit_exam.php" method="POST">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<div class='mb-3'><strong>{$row['question']}</strong><br>";
            echo "<input type='radio' name='q{$row['id']}' value='A'> {$row['option_a']}<br>";
            echo "<input type='radio' name='q{$row['id']}' value='B'> {$row['option_b']}<br>";
            echo "<input type='radio' name='q{$row['id']}' value='C'> {$row['option_c']}<br>";
            echo "<input type='radio' name='q{$row['id']}' value='D'> {$row['option_d']}<br></div>";
        }
        ?>
        <button type="submit" class="btn btn-success">Submit Exam</button>
    </form>
</body>
</html>