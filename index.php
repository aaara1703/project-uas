<?php 
session_start();
require_once('koneksi/database.php');
require_once('koneksi/auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Portfolio website Design</title>

    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- custom css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- header design -->
    <header class="header">
        <a href="#" class="logo">asmira</a>

        <i class='bx bx-menu' id="menu-icon"></i>

        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#service">Service</a>
            <a href="#portfolio">portfolio</a>
            <a href="#contact">Contact</a>
            <?php if(checkLogin()) : ?>
            <a href="admin.php" class="btn">Admin</a>
                <?php else: ?>
            <a href="login.php" class="btn">Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <!-- home section design -->
    <section class="home" id="home">
        <div class="home-content">
            <h3>Hello!</h3>
            <h1>I'm Asmira</h1>
            <h3> i'm <span>a Web Developer</span></h3>
            <p>My name is Asmira, born in Pattiro section of Sulawesi on July 11, 2003. I am </p>
            <P> I have a lot of hobbies. I like camping or all about nature and I also like dancing. </P>
            <p>the journey of life after graduating from high school I continued my education in </P>
            <p>in my opinion was very difficult but it's okay I have to be ready to take risks </P>
            <p>to add new experiences to my life that's all I can tell you a little about myself bye </p>

            <div class="social-media">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-whatsapp'></i></a>
            </div>
            <a href="#" class="btn">Dowload CV</a>
        </div>

        <div class="home-img">
            <img src="images/home (2).jpeg" alt="">
        </div>
    </section>

    <!-- about section design -->
    <section class="about" id="about">
        <div class="about-img">
            <img src="images/about.jpeg" alt="">
        </div>

        <div class="about content">
            <h2 class="heading">About <span>me</span></h2>
            <h3>a Web Developer!</h3>
            <p> My name is Asmira, born in Pattiro section of Sulawesi on July 11, 2003. I am the first child from a
                simple family.</p>
            <P> I have a lot of hobbies. I like camping or all about nature and I also like dancing. I also like to be
                lazy</P>
            <p>the journey of life after graduating from high school I continued my education in samarinda and took a
                major which</P>
            <p>in my opinion was very difficult but it's okay I have to be ready to take risks because this is indeed my
                choice </P>
            <p>to add new experiences to my life that's all I can tell you a little about myself bye. </p>
            <a href="#" class="btn">Read more</a>

        </div>
    </section>

    <!-- service section design -->
    <section class="Service" id="service">
        <h2 class="heading">our <span>service</span></h2>

        <div class="service-container">
            <div class="service-box">
                <i class='bx bx-code-alt'></i>
                <h3>Web Development</h3>
                <P>A web developer is someone who uses their </P>
                <P>technical skills to develop and maintain websites.</P>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="service-box">
                <i class='bx bxs-paint'></i>
                <h3>Graphic Design</h3>
                <P>Graphic designers are people who specialize </P>
                <P>in interpreting messages in the form of images.</P>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="service-box">
                <i class='bx bx-bar-chart-alt'></i>
                <h3>Digital Marketing</h3>
                <P>Digital marketing is an attempt to market products </P>
                <P>or services using digital media and the internet. </P>
                <a href="#" class="btn">Read More</a>
            </div>
        </div>
    </section>

    <!-- portfolio section design -->
    <section class="portfolio" id="portfolio">
        <h2 class="heading">Latest <span>Project</span></h2>

        <div class="portfolio-container">
        <?php
                $queryExp = "SELECT * FROM portofolio ORDER BY id ASC";
                $resultExp = mysqli_query($connectDb, $queryExp);
                
                while ($data = mysqli_fetch_array($resultExp)) : ?>
            <div class="portfolio-box">
                <img src="images/portofolio1.jpg" alt="">
                <div class="portfolio-layer">
                    <h4><?= $data['nama']; ?></h4>
                    <p><?= $data['deskripsi']; ?>.</p>
                    <a href="#"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
            <?php endwhile; ?>
            
        </div>
    </section>

    <!--  contact section design -->
    <secttion class="contact" id="contact">
        <h2 class="heading">contact <span>Me!</span></h2>

        <form action="bukutamu-save.php " method="post">
            <div class="input-box">
                <input type="text" name="nama" placeholder="Full Name">
                <input type="email" name="email" placeholder="Email Address">
            </div>
            <div class="input-box">
                <input cols="30" name="subjek" type="text" placeholder="subject">
            </div>
            <textarea name="pesan" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <input type="submit" value="Send Message" class="btn" name="submit">
        </form>
    </secttion>

    <!-- footer design -->
    <foother class="foother">
        <div class="foother-text">
            <p>copyright &copy; 2023 by Asmira</p>
        </div>

        <div class="foother-iconTop">
            <a href="#home"><i class='bx bx-up-arrow-alt'></i></a>
        </div>
    </foother>


    <!-- scroll reveal -->
    <script src="https:unkg.com/scrollreveal"></script>

    <!-- typed js -->
    <script>
        <?php 
        if (isset($_GET['bukutamu'])) {
            $statusBukutamu = $_GET['bukutamu'];
            if ($statusBukutamu == 'sukses') : ?>
                alert('Sukses menambah bukutamu');
            <?php elseif ($statusBukutamu == 'gagal') : ?>
                alert('Gagal menambah bukutamu');
            <?php endif;
        }
        ?>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      ;(() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach((form) => {
          form.addEventListener(
            'submit',
            (event) => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            },
            false
          )
        })
      })()
    </script>
    <!-- custum js -->
    <script src="js/script.js"></script>
</body>

</html>