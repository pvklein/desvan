<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("p").click();
    });
});
</script>
</head>
<body>

<button>Trigger click event for p element</button>

<p onclick="alert('Click event triggered')">This is a paragraph.</p>

</body>
</html>
