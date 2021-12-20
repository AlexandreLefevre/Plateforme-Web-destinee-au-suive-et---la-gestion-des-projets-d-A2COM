<?php 

function get_substeps_array($only_name = true){
    global $db;
    $substeps = [];
    $query = 'SELECT * FROM substeps ORDER BY `sort` DESC';
    $query_result = mysqli_query($db, $query);
    while($row = mysqli_fetch_array($query_result, MYSQLI_ASSOC)){
        if($only_name){
            $substeps[$row['id']] = $row['name'];
        }
        else{
            $substeps[$row['id']] = [
                'name' => $row['name'],
                'sort' => $row['sort']
            ];
        }
        
    }
    return $substeps;    
}
