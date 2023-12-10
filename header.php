
<header class="header">
        <a href="#" class="logo">asmira</a>

        <i class='bx bx-menu' id="menu-icon"></i>

        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <?php if(checkLogin()): ?>
            <a href="adminbukutamu.php">Bukutamu</a>
            <a href="adminportofolio.php">portfolio</a>
            <a href="adminuser.php">User</a>
            <a  href="logout.php">Logout</a>
            <?php endif; ?>
        </nav>
    </header>