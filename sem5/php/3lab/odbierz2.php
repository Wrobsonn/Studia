<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>


    <div>
        <h2>Dane odebrane z formularza:</h2>
        <?php
        
       // if (isset($_REQUEST['jezyki'])) {
        //    $jezyki = join(",", $_REQUEST['jezyki']);
         //   echo 'wybrano tutoriale ' . $jezyki . '<br/>';
        //}else
         //   echo 'nie wybrano tutoriala <br />';
        
        foreach ($_REQUEST['jezyki'] as $key => $value){
            //$jezyki = join(",", $_REQUEST['jezyki']);
            echo "$key = $value <br />"; 
        }
       echo 'wybrano tutoriale ' . $jezyki . '<br/>';
       
       if (isset($_REQUEST['zaplata']) && ($_REQUEST['zaplata'] != "")) {
        $kasa = htmlspecialchars(trim($_REQUEST['zaplata']));

        echo "zaplata: $kasa <br />";
    } else echo "Nie wpisano panstwa <br />";


    echo '<a href="klient.php">'."dane klienta".'</a>';
    echo '<a href="formularz.html">'."Powrto do formularza".'</a>';
       ?>
    </div>

</body>

</html>