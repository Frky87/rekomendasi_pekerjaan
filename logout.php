<?php 
    session_start();
    session_unset();
    echo "
        <script>
            alert('Berhasil Logout');
            window.location = 'index.php';
        </script>
    ";
?>
<li>
   <a href="logout.php">
	<i class="bx bx-log-out"></i>
	<span class="links_name">Log out</span>
   </a>
</li>
