<?php
    session_start();
    // print '<script type="text/javascript">';
    // print 'alert("Hello: '.$_SESSION["validate_session"].'")';
    // print '</script>';
    session_unset();
    print '<script type="text/javascript">location.href = "../../Login/index.html";alert("Logged out Successfully");</script>';
?>