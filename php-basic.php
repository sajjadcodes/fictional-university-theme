<?php 


// What is WordPress ?


function myFirstFuction(){

    echo 2+2;
    echo"</br>";
}

//calling function
myFirstFuction();


// function with parameters

function greet($name, $color){

    echo "<p>Hi, my name is $name and my favorite color is $color.</p>";
}


greet('John','blue');

greet('Jane','green');



?>


<!-- Function is WordPress -->

<h1><?php bloginfo('name');?></h1>

<p><?php bloginfo('description');?></p>



<!-- What is Array: Think of an array is a collection -->



<?php

$names = array('Brad', 'John', 'Jane','Meowsalot');
// why store in a single ? severial reason but one of is looping

?>

<p>Hi, my name is <?php echo $names[2];?></p>



<!-- loop through the array -->

 
<?php
$count =0; 
while($count < count($names))
{
    echo "<li>Hi, my name is $names[$count]</li>";
    $count++;
}
?>