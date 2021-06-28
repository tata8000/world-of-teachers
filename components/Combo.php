<?php

function combo ($name, $table, $column)
{
    $db = Db::getConnection();
    $combobox="<select class='combo' name=$name>";
    $id="id";
    $table=$table;
    $sql = "SELECT $id, $column FROM $table"; 
    $result = $db->query($sql);
    $i = 0;
        while($row = $result->fetch())
        {
            $value=$row['id'];
            $text=$row['name'];
            $selected = (isset($_SESSION[$name]) && $_SESSION[$name]==$value) ? ' selected ' : "";
            $combobox=$combobox."<option value='$value' $selected>$text</option>";
            $i++;
        }
    $combobox=$combobox."</select>";
    return $combobox;
}

function check ($name, $table, $column)
{
    $db = Db::getConnection();
    $check="";
    $id="id";
    $table=$table;
    $sql = "SELECT $id, $column FROM $table WHERE user_id = ".$_COOKIE['user_id'];
    $result = $db->query($sql);
    while($row = $result->fetch()){  
        $value=$row['id'];
        $text=$row['name'];
        $check.="<p><input type='checkbox' name='$name' value='$value'>$text</input></p>";
    }
    echo $check;
}

