<!DOCTYPE html>
<html lang="en">
<head>
    <title>Phone number</title>
</head>
<body>
    <h1>Unique Phone number</h1>
    <form action="">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" />
        <span id="err_phone"></span>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#phone').keyup(function(){
                var num = $(this).val();
                // ajax call
                $.ajax('8.2.php',{
                    data:{'phone':num},
                    dataType:'text',
                    method:'post',
                    success:function(response){
                        $('#err_phone').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
