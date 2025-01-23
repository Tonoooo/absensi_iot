<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Scan Kartu</title>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function(){
                $("#cekkartu").load('bacakartu.php');
            }, 2000);
        })
    </script>
</head>
<body>

<?php include "menu.php";?>
<div class="container-fluid" style="margin-top: 20px;">
    <div id="cekkartu">
        
    </div>
</div>

<?php include "footer.php"; ?>
    
</body>
</html>