<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>jQuery Example</title>
<style>
    .box {
        width: 100px;
        height: 100px;
        background-color: red;
        margin: 10px;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // Hide the box initially
        $(".box").hide();

        // Show the box when the button is clicked
        $("#showButton").click(function(){
            $(".box").show();
        });

        // Hide the box when the button is clicked
        $("#hideButton").click(function(){
            $(".box").hide();
        });

        // Toggle the box visibility when the button is clicked
        $("#toggleButton").click(function(){
            $(".box").toggle();
        });

        // Change the background color of the box on click
        $(".box").click(function(){
            $(this).css("background-color", "blue");
        });

        // Change the background color of the box on change of select
        $("#colorSelect").change(function(){
            var selectedColor = $(this).val();
            $(".box").css("background-color", selectedColor);
        });
    });
</script>
</head>
<body>

<button id="showButton">Show Box</button>
<button id="hideButton">Hide Box</button>
<button id="toggleButton">Toggle Box</button>

<select id="colorSelect">
    <option value="red">Red</option>
    <option value="green">Green</option>
    <option value="blue">Blue</option>
</select>

<div class="box"></div>

</body>
</html>
