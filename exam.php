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
        let timer = 60 * 5;
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
<body onload="startTimer()" class="bg-light">
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Online Exam</h3>
        <div><strong>Time Left:</strong> <span id="timer" class="text-danger">5:00</span></div>
    </div>
    <form id="examForm" action="submit_exam.php" method="POST" class="mt-4">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card p-3 mb-3'>";
            echo "<p class='mb-2'><strong>{$row['question']}</strong></p>";
            echo "<div class='form-check'><input class='form-check-input' type='radio' name='q{$row['id']}' value='A'> <label class='form-check-label'>{$row['option_a']}</label></div>";
            echo "<div class='form-check'><input class='form-check-input' type='radio' name='q{$row['id']}' value='B'> <label class='form-check-label'>{$row['option_b']}</label></div>";
            echo "<div class='form-check'><input class='form-check-input' type='radio' name='q{$row['id']}' value='C'> <label class='form-check-label'>{$row['option_c']}</label></div>";
            echo "<div class='form-check'><input class='form-check-input' type='radio' name='q{$row['id']}' value='D'> <label class='form-check-label'>{$row['option_d']}</label></div>";
            echo "</div>";
        }
        ?>
        <button type="submit" class="btn btn-success">Submit Exam</button>
    </form>
</div>
</body>
</html>