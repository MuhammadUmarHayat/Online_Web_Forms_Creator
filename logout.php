<?php include_once "header.php"; ?>
<main>
    <section>
     <?php 
     session_start();
     session_destroy();
    ?>
    <h2>Your session has been expire. To login again <a href="login.php">Click Here</a></h2>
    </section>
  
    <section>
    <!-- main content here -->
</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>