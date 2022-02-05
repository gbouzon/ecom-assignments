<div class = "counter" style="text-align: right;">
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type = "text/javascript"> 
    $(document).ready(
        $.getJSON("/Count/index", function(data) {
            $("div.counter").html(data.count + " page visits");
        })
    );
</script>
</div>