<style>
    body{
        background-color:#AE7C78;
    }
    #return{
        text-align:center;
        width:100px;
        height:50px;
    }
    a{
        color: white;
        text-decoration: none;
        font-size:100px;
    }
    #submit{
        width:200px;
        height:100px;
    }
    .container1{
        text-align:center;
    }
</style>
<body class ="container1">
<a id="return" href="index.php?id=<?php echo $_GET["id"]; ?>">Назад</a>
<form  method="POST"">
<p><input type="submit" name="submit_btn" id="submit" value="Отправить"></p>
</form>
</body>
<?php
    $xml = simplexml_load_file("flowers.xml");
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $count = 0;
        foreach ($xml as $id){
            $count++;
        }
        if ($count>1){
            $id = $_GET["id"];
            $target = $xml->xpath("//id[@id='$id']");
            $domRef = dom_import_simplexml($target[0]); //Select position 0 in XPath array
            $domRef->parentNode->removeChild($domRef);
            $dom = new DOMDocument('1.0');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $dom->loadXML($xml->asXML());
            $dom->save('flowers.xml');
            echo "<script>document.location.href='list.php';</script>";
        }else{
            $id = $_GET["id"];
            echo "<script>alert('Удаление невозможно, это послдений товар')</script>";
            echo "<script>self.location='index.php?id=$id';</script>";
        }
    }
?>