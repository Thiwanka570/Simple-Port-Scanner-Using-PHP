<form method="POST">
    <label>Domain :</label>
    <input type='text' name='domain'/>
    <input type='submit' value='scan'/>
</form>


<?php 
    if(!empty($_POST['domain'])){

        $host=$_POST['domain'];
        $ports=array(21, 25, 80, 81, 110, 143, 443, 587, 2525, 3306);

    foreach ($ports as $port)
    {
        $connection = @fsockopen($host, $port, $errno, $errstr, 2);

    if (is_resource($connection))
    {
        echo '<h2 class="open">' . $host . ':' . $port . ' ' . '(' . getservbyport($port, 'tcp') . ') is open.</h2>' . "\n";
        fclose($connection);
    }
    else
    {
        echo '<h2 class="close">' . $host . ':' . $port . ' is not responding.</h2>' . "\n";
    }
    }

    }
    
?>

<style>
    .open{
        bgcolor:green;
        color:green;
    }
    .close{
        color:red;
    }
</style>