<?php
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
$subjects = ['English','Nepali','Math','Science','Social','Grammar','Health','Occupation','Computer','Moral','Optmath'];

$name = $_GET['name'];
$class = $_GET['class'];
$roll = $_GET['roll'];
$averageGradePoint = $_GET['average_grade_point'];

$subjectGrades = [];
$subjectGradePoints = [];

foreach ($subjects as $subject) {
    $subjectGrades[$subject] = $_GET[$subject];
    $subjectGradePoints[$subject] = $_GET[$subject . '_point'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L5-Q2</title>
</head>
<body>

            <p>Gradesheet</p>
      
            <p>The marks secured by: <?= $name ?></p>
            <p>Class: <?= $class ?>, Roll No: <?= $roll ?></p>
    
            <table border = "1">
                <tr>
                    <th rowspan="2">SN</th>
                    <th rowspan="2">Subject(Code)</th>
                    <th rowspan="2">Credit Hour</th>
                    <th colspan="2">Obtained Grade</th>
                    <th rowspan="2">Final Grade</th>
                    <th rowspan="2">Gradepoint</th>
                </tr>
                <tr>
                    <th>TH</th>
                    <th>PR</th>
                </tr>
                <?php foreach ($subjects as $index => $subject): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $subject ?></td>
                    <td>4</td>
                    <td><?= $subjectGrades[$subject] ?></td>
                    <td></td>
                    <td><?= $subjectGrades[$subject] ?></td>
                    <td><?= $subjectGradePoints[$subject] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr style="font-weight: bold">
                    <td colspan="6">Grade Point Average (GPA)</td>
                    <td><?= $averageGradePoint ?></td>
                </tr>
                <tr style="font-weight: bold">
                    <td colspan="4" >Attendance: 190</td>
                    <td colspan="3">Remarks: </td>
                </tr>
            </table>

     
            <ul>
                <li>TH:Theory</li>
                <li>PR:Practical</li>
            </ul>

        <h3>Details for Grade Sheet</h3>

            <table border='1'>
                <tr>
                    <th>S.N.</th>
                    <th>Interval in Percentage</th>
                    <th>Grade</th>
                    <th>Description</th>
                    <th>Gradepoint</th>
                </tr>
                <?php foreach($descriptions as $index=>$description): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td ><?= $description[0] ?></td>
                    <td><?= $description[1] ?></td>
                    <td ><?= $description[2] ?></td>
                    <td><?= $description[3] ?></td>                 
                </tr>
                <?php endforeach; ?>
            </table>

</body>
</html>