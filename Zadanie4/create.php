<style>
    a{
        color: white;
        text-decoration: none;
    }
    form{
        color:blue;
        width:100%;
        height: 500px;
        text-align:center;
    }
    #name{
        width:200px;
        height:50px;
    }
    #price{
        width:200px;
        height:50px;
    }
    #description{
        width:200px;
        height:50px;
    }
    #submit{
        width:100px;
        height:50px;
        margin-top:-20px;
    }
</style>
<?php
    $xml = simplexml_load_file("flowers.xml");
    $count = count($xml);
    $last_item = $xml->id[$count-1];
    $last_id = (int) $last_item->ids;
    $newItemId = $last_id + 1;
?>
<form  method="POST" action="index.php?id=<?php echo $newItemId; ?>">
<div>Создайте новый товар:</div>
<div>Название товара</div>
<input type="text" name="name" id="name" required="required">
<div>Цена</div>
<input type="number" min="1000" name="price" id="price" required="required">
<div>Описание</div>
<textarea name="description" id="description"></textarea>
<p><input type="submit" name="submit_btn" id="submit" value="Отправить"></p>
</form>