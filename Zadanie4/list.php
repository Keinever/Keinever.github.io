<style>
    body{
        font-size: 50px;
        background-color: #AE7C78;
    }
    a{
        color: white;
        text-decoration: none;
    }
</style>
<ul>
<?php
    $xml = simplexml_load_file("flowers.xml");
    foreach ($xml as $id){
        echo "<li><form><a href=\"index.php?id=$id->ids\">даные варианта по id:$id->ids</a></form></li></br>";
    }
    echo "<li><a href=\"create.php\">создать новый элемент</a></li>";
?>
</ul>
