<?php

    $db = "db_name";
    $user = "db_user";
    $pass = "WvSkX4qoSshd";
    
    $str_search = "string.search";
    $str_replace = "string.replace";

    echo "Exemplo de consulta realizada:\n <br>";
    echo "UPDATE {TABLE} SET {COLUMN} = REPLACE({COLUMN}, '{$str_search}', '{$str_replace}') \n<br>";

    $dbh = new PDO("mysql:host=localhost;dbname={$db}", "{$user}", "{$pass}");

    $aTables = array();

    $query = "SHOW TABLES FROM {$db}";
    $result = $dbh->query($query);
    echo "<ul>\n";
    foreach($result as $row){
        $table = $row["Tables_in_{$db}"];
        $aTables[$table] = array();
        $query_column = "SHOW COLUMNS IN {$table}";
        $result_column = $dbh->query($query_column);

        echo "<li>{$table}<ul>\n";
        foreach($result_column as $row_column){
            $column = $row_column['Field'];
            $column_type = $row_column['Type'];
            $query_update = "UPDATE {$table} SET {$column} = REPLACE({$column}, '{$str_search}', '{$str_replace}')";
            $result_update = $dbh->query($query_update);
            echo "<li>{$column}</li>\n";
        }
        echo "</ul></li>\n";

    }
    echo "</ul>";
