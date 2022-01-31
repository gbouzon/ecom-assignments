<div class = "counter"></div>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type = "text/javascript"> 
    $(document).ready(
        $.getJSON("/Main/count", function(data) {
            $("div.counter").html(data.count + " page visits");
        })
    );
</script>