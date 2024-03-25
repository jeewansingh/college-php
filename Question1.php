<!DOCTYPE html>
<html lang="en">
<head>
    <title>jQuery</title>
</head>
<body>
    <p id="a">Lorem ipsum dolor sit amet consectetur adipisi. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, suscipit numquam, minus repellendus exercitationem asperiores eum cupiditate harum rerum tempora dolore illo cum laborum? Quod, ipsam. Consequatur molestias rem quidem.</p>    
    <button>Hide</button>
    <button>Show</button>
    <button id="t">Toogle</button>
    <button id="su">Slide Up</button>
    <button id="sd">Slide Down</button>
    <button id="red">Red</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
       $(document).ready(function(){
            $('button').click(function(){
                let text = $(this).text();
                if(text == 'Show'){
                    $('#a').show();
                } else {
                    $('#a').hide();
                }
            });

            $('#t').click(function(){
                $('#a').toggle();
            });

            
            $('#su').click(function(){
                $('#a').slideUp(5000);
            });

            $('#sd').click(function(){
                $('#a').slideDown(5000);
            });

            $('#red').click(function(){
                $('p').css({'color':'white','background-color':'red'})
                $('p').attr('class','nepal');
            });
       });
    </script>
</body>
</html>
