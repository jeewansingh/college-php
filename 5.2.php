<!DOCTYPE html>
<html>
<head>
    <title>Student Grade Calculator</title>
</head>
<body>
    <h2>Student Grade Calculator</h2>
    <form method="post" action="">
        <label for="name">Student Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="roll">Roll Number:</label><br>
        <input type="text" id="roll" name="roll" required><br><br>
        
        <label for="eng">English Marks:</label><br>
        <input type="number" id="eng" name="eng" min="0" max="100" required><br><br>
        
        <label for="nep">Nepali Marks:</label><br>
        <input type="number" id="nep" name="nep" min="0" max="100" required><br><br>
        
        <label for="math">Math Marks:</label><br>
        <input type="number" id="math" name="math" min="0" max="100" required><br><br>
        
        <label for="sci">Science Marks:</label><br>
        <input type="number" id="sci" name="sci" min="0" max="100" required><br><br>
        
        <input type="submit" value="Calculate GPA">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extracting input data
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $eng = (int)$_POST['eng'];
        $nep = (int)$_POST['nep'];
        $math = (int)$_POST['math'];
        $sci = (int)$_POST['sci'];
        
    // Function to calculate GP
    // function calculateGP($marks) {
    //     if ($marks >= 90) {
    //         return "A+" ;
    //     } elseif ($marks >= 80) {
    //         return "A";
    //     } elseif ($marks >= 70) {
    //         return "B+";
    //     } elseif ($marks >= 60) {
    //         return "B";
    //     } elseif ($marks >= 50) {
    //         return "C+";
    //     } elseif ($marks >= 40) {
    //         return "C";
    //     } elseif ($marks >= 30) {
    //         return "D+";
    //     } elseif ($marks >= 20) {
    //         return "D";
    //     } elseif ($marks >= 10) {
    //         return "E";
    //     } else {
    //         return "F";
    //     }
    // }

        // Function to calculate GPA
        // function calculateGPA($marks) {
        //     if ($marks >= 90) {
        //         return 4.0;
        //     } elseif ($marks >= 80) {
        //         return 3.6;
        //     } elseif ($marks >= 70) {
        //         return 3.2;
        //     } elseif ($marks >= 60) {
        //         return 2.8;
        //     } elseif ($marks >= 50) {
        //         return 2.4;
        //     } elseif ($marks >= 40) {
        //         return 2.0;
        //     } elseif ($marks >= 30) {
        //         return 1.6;
        //     } elseif ($marks >= 20) {
        //         return 1.2;
        //     } elseif ($marks >= 10) {
        //         return 0.8;
        //     } else {
        //         return 0.0;
        //     }
        // }
        
        function calculateGPA($marks) {
            if ($marks >= 90) {
                return array("A+", 4.0,);
            } elseif ($marks >= 80) {
                return array("A", 3.6);
            } elseif ($marks >= 70) {
                return array("B+", 3.2);
            } elseif ($marks >= 60) {
                return array("B", 2.8);
            } elseif ($marks >= 50) {
                return array("C+", 2.4);
            } elseif ($marks >= 40) {
                return array("C", 2.0);
            } elseif ($marks >= 30) {
                return array("D+", 1.6);
            } elseif ($marks >= 20) {
                return array("D", 1.2);
            } elseif ($marks >= 10) {
                return array("E", 0.8);
            } else {
                return array("F", 0.0);
            }
        }
        

        // Calculate GPA for each subject
        $gpa_eng = calculateGPA($eng);
        $gpa_nep = calculateGPA($nep);
        $gpa_math = calculateGPA($math);
        $gpa_sci = calculateGPA($sci);

        
        // Calculate final GPA
        $final_gpa = ($gpa_eng + $gpa_nep + $gpa_math + $gpa_sci) / 4;
        
        // Calculate final grade for each subject
        $final_grade_eng = ($gpa_eng + 4) / 2;
        $final_grade_nep = ($gpa_nep + 4) / 2;
        $final_grade_math = ($gpa_math + 4 ) / 2;
        $final_grade_sci = ($gpa_sci + 4 ) / 2;
                
        // Display results in a table
        echo '
        <h2>Results</h2>
        <table border="1">
            <tr>
                <th>Subject (Code)</th>
                <th>Credit Hour</th>
                <th>Obtained Mark</th>
                <th>Final Grade</th>
                <th>Gradepoint</th>
            </tr>
            <tr>
                <td>English (ENG)</td>
                <td>3</td>
                <td>' . $eng . '</td>
                <td>' . $gp_eng . '</td>
                <td>' . $gpa_eng . '</td>
            </tr>
            <tr>
                <td>Nepali (NEP)</td>
                <td>3</td>
                <td>' . $nep . '</td>
                <td>' . $gp_nep . '</td>
                <td>' . $gpa_nep . '</td>
            </tr>
            <tr>
                <td>Math (MTH)</td>
                <td>3</td>
                <td>' . $math . '</td>
                <td>' . $gp_math . '</td>
                <td>' . $gpa_math . '</td>
            </tr>
            <tr>
                <td>Science (SCI)</td>
                <td>3</td>
                <td>' . $sci . '</td>
                <td>' . $gp_sci . '</td>
                <td>' . $gpa_sci . '</td>
            </tr>
            <tr>
                <td colspan="4" align="right">Final GPA:</td>
                <td>' . number_format($final_gpa, 2) . '</td>
            </tr>
        </table>';
    }
    ?>
</body>
</html>
