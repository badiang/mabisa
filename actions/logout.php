<?

    error_reporting(E_ALL ^ E_NOTICE);

    session_start();


    session_destroy();

?>

<script>

clearstatcache();

</script>

<?php header('location:../');?>