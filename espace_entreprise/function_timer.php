<html></html><?php 

if ($_SESSION['workspace'] == true) {
function timer()
{
    $time = time() - $_SESSION['timer'];
    if ($time > 600) { //subtract new timer from the old one
        session_destroy();
        echo "<script>window.location.href = 'login.php?logout=2'</script>"; //redirect to login.php
        exit;
    } else {
        $_SESSION['timer'] = time(); //set new timer
    }
}
function setTimer()
{
    $_SESSION['timer'] = time();
}
}
include_once('function_notif.php');
?>