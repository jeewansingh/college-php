<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the data
    $name = $_POST['name'];
    $class = $_POST['class'];
    $roll = $_POST['roll'];
    $marks = [
        'English' => (int)$_POST['eng'],
        'Nepali' => (int)$_POST['nep'],
        'Math' => (int)$_POST['math'],
        'Science' => (int)$_POST['sci'],
        'Social' => (int)$_POST['soc'],
        'Grammar' => (int)$_POST['grm'],
        'Health' => (int)$_POST['eph'],
        'Occupation' => (int)$_POST['occ'],
        'Computer' => (int)$_POST['com'],
        'Moral' => (int)$_POST['mor'],
        'Optmath' => (int)$_POST['omat']
    ];

    $descriptions = [
        ['90 to 100', 'A+', 'Outstanding', 4],
        ['80 to below 90', 'A', 'Excellent', 3.6],
        ['70 to below 80', 'B+', 'Very Good', 3.2],
        ['60 to below 70', 'B', 'Good', 2.8],
        ['50 to below 60', 'C+', 'Satisfactory', 2.4],
        ['40 to below 50', 'C', 'Acceptable', 2],
        ['30 to below 40', 'D+', 'Partly Acceptable', 1.6],
        ['20 to below 30', 'D', 'Insufficient', 1.2],
        ['0 to below 20', 'E', 'Very Insufficient', 0.8]
    ];

    // Initialize arrays to store grades and grade points for each subject
    $subjectGrades = [];
    $subjectGradePoints = [];

    foreach ($marks as $subject => $mark) {
        $percentage = ($mark / 100)*100;

        $grade = '';
        $gradePoint = 0;

        foreach ($descriptions as $description) {
            if ($percentage >= (float)$description[0]) {
                $grade = $description[1];
                $gradePoint = $description[3];
                break;
            }
        }

        $subjectGrades[$subject] = $grade;
        $subjectGradePoints[$subject] = $gradePoint;
    }

    $totalGradePoints = array_sum($subjectGradePoints);
    $averageGradePoint = $totalGradePoints / count($subjectGradePoints);

    $url = "sheet.php?name=$name&class=$class&roll=$roll&average_grade_point=$averageGradePoint";
    foreach ($subjectGrades as $subject => $grade) {
        $url .= "&$subject=$grade";
    }
    foreach ($subjectGradePoints as $subject => $gradePoint) {
        $url .= "&{$subject}_point=$gradePoint";
    }
    header("Location: $url");
    exit;
}
?>



<form method="post" action="l5q2.php">
	Name of the student:  <input type="text" name="name"><br><br>
    Class of the student:  <input type="text" name="class"><br><br>
    Rollno of the student:  <input type="text" name="roll"><br><br>

    English: <input type="number" name="eng"><br>
    Nepali: <input type="number" name="nep"><br>
    Math: <input type="number" name="math"><br>
    Science: <input type="number" name="sci"><br>
    Social: <input type="number" name="soc"><br>
    Grammar: <input type="number" name="grm"><br>
    Health: <input type="number" name="eph"><br>
    Occupation: <input type="number" name="occ"><br>
    Computer: <input type="number" name="com"><br>
    Moral: <input type="number" name="mor"><br>
    Optmath: <input type="number" name="Optmath"><br>

    <input type="submit" name="submit">
</form>