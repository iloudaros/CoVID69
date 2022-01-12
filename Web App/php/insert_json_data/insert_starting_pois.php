<?php
require_once("config.php");
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);


// reading json file
$json = file_get_contents('starting_pois.json');

//converting json object to php associative array
$obj = json_decode($json, true);


// processing the array of objects
foreach ($obj as $poi) {


// /*poi table*/
$id = $poi['id'];
$name = $poi['name'];
$address = $poi['address'];
$lat = $poi['coordinates']['lat'];
$lng = $poi['coordinates']['lng'];
$rating = $poi['rating'];
$rating_n = $poi['rating_n'];

// // preparing statement for insert query
$st_poi = mysqli_prepare($conn, 'INSERT INTO poi(id, name, address, lat, lng, rating, rating_n) VALUES (?, ?, ?, ?, ?, ?, ?)');

// // bind variables to insert query params
mysqli_stmt_bind_param($st_poi, 'sssssss', $id, $name, $address, $lat, $lng, $rating, $rating_n);

// // executing insert query
mysqli_stmt_execute($st_poi);




//echo $name;
//echo":"."<br>";
foreach ($poi['populartimes'] as $populartimes){
$day = $populartimes['name'];
//echo $day;
    

    $time = 0 ;

    foreach ($populartimes['data'] as $people){
    
    $data = $people; 
//echo ("(".$time."->".$people.") ");
    $time +=1;
    
    // preparing statement for insert query
    $st_populartimes = mysqli_prepare($conn, 'INSERT INTO populartimes(poi, day, time, data) VALUES (?, ?, ?, ?)');        
    // bind variables to insert query params
    mysqli_stmt_bind_param($st_populartimes, 'ssss', $id, $day, $time, $data);    
    // executing insert query
    mysqli_stmt_execute($st_populartimes);        
}//echo"<br>";
}

//echo"<br><br>";

    foreach ($poi['types'] as $types){
        // echo $name.':';
        // echo $types.'<br>';    
        

        /*types table*/
        //$id = $poi['id'];
        
        // preparing statement for insert query
        $st_types = mysqli_prepare($conn, 'INSERT INTO types(poi, type) VALUES (?, ?)');
        // bind variables to insert query params
        mysqli_stmt_bind_param($st_types, 'ss', $id, $types);
        // executing insert query
        mysqli_stmt_execute($st_types);
    }
        
}

?>
