<?php
$pantai = [
    [
        'image' => 'images/book1.jpg',
        'title' => 'Pantai Maukaro',
        'location' => 'Kecamatan Mauklaro, Kabupaten Ende, Nusa Tenggara Timur'
    ],
    [
        'image' => 'images/book2.jpg',
        'title' => 'Pantai Koka',
        'location' => 'Desa Wolowiro, Kec. Paga, Kab. Sikka, Nusa Tenggara Timur'
    ],
    [
        'image' => 'images/book3.jpg',
        'title' => 'Pantai Oa',
        'location' => 'Kecamtan Wulanggitang, Kabupaten Flores Timur, Nusa Tenggara Timur'
    ],

];

$horor = [
    [
            'image' => 'images/book4.jpg',
            'title' => 'Pantai Watotena',
            'location' => 'Kecamtan Mauklaro, Kabupaten Ende, Nusa Tenggara Timur'
        ],
        [
            'image' => 'images/book5.jpg',
            'title' => 'Pantai Mbu\'u',
            'location' => 'Desa Ippi, Kabupaten Ende, Nusa Tenggara Timur'
        ],
        [
            'image' => 'images/book6.jpg',
            'title' => 'Pantai Batu Biru Penggajawa',
            'location' => 'Kecamatan Nangapanda, Kabupaten Ende, Nusa Tenggara Timur'
        ],

];

$seru = [
   
    [
        'image' => 'images/book7.jpg',
        'title' => 'Pantai Bathesda Wihara',
        'location' => 'Pulau Flores, Kabupaten Ende, Nusa Tenggara Timur'
    ],
    [
        'image' => 'images/book8.jpg',
        'title' => 'Pink Beach',
        'location' => 'Labuan Bajo, Kabupaten Manggarai Barat, Nusa Tenggara Timur'
    ],
    [
        'image' => 'images/book9.jpg',
        'title' => 'Pantai Watulajar',
        'location' => 'Kecamtan Riung, Kabupaten Ngada, Nusa Tenggara Timur'
    ]
];
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://font.googleapis.com/css?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Box item -->
    <link rel="stylesheet" 
     href="https:/unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- remix item -->
      <link href="https:/cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"/>
    <!-- remix item -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap" rel="stylesheet">
    <title>Penjualan</title>
</head>
<body>
    

<header>
        <a href="#" class="logo"><img src="logo.png" alt=""></a>
        <ul class="menulist">
            <a href="#home" class="active">Home</a>
            <a href="#about">About Me</a>
            <a href="#skills">Skills</a>
            <a href="#Portofolio">Portofolio</a>
            <a href="#contact">Contact</a>
        </ul>

            <div class="menu-right">
                <a href="#" class="menu-btn">
                <i class='bx bx-user-circle'></i>
                    <span>Sign Up</span>
                    
                </a>

                <div class="bx bx-menu" id="menu-icon"></div>

            </div>
</div>
    </header>





<!-- best -->






  






<div class="body">
  

<main>


    <section class="destinasi">
        <h2>Destinasi Pantai</h2>
        <?php foreach ($pantai as $panti) : ?>
            <div class="destinasi-item">
                <img src="<?= htmlspecialchars($panti['image']) ?>" alt="<?= htmlspecialchars($panti['title']) ?>" width="100px" height="100px">
                <h3><?= htmlspecialchars($panti['title']) ?></h3>
                <p><?= htmlspecialchars($panti['location']) ?></p>
                <button>Detail</button>
            </div>
        <?php endforeach; ?>
    </section>



    <section class="destinasi">
        <h2>Destinasi Pantai</h2>
        <?php foreach ($horor as $horo) : ?>
            <div class="destinasi-item">
                <img src="<?= htmlspecialchars($horo['image']) ?>" alt="<?= htmlspecialchars($horo['title']) ?>" width="100px" height="100px">
                <h3><?= htmlspecialchars($horo['title']) ?></h3>
                <p><?= htmlspecialchars($horo['location']) ?></p>
                <button>Detail</button>
            </div>
        <?php endforeach; ?>
    </section>



    <section class="destinasi">
        <h2>Destinasi Pantai</h2>
        <?php foreach ($seru as $ser) : ?>
            <div class="destinasi-item">
                <img src="<?= htmlspecialchars($ser['image']) ?>" alt="<?= htmlspecialchars($ser['title']) ?>" width="100px" height="100px">
                <h3><?= htmlspecialchars($ser['title']) ?></h3>
                <p><?= htmlspecialchars($ser['location']) ?></p>
                <button>Detail</button>
            </div>
        <?php endforeach; ?>
    </section>

        </div>
</main>


<!-- kontak -->

<section class="contact" id="contact">

    <div class="contact-main">
        <a href="#" class="h-line">
            <i class="ri-shining-2-line"></i>
            <span>Kontak!</span>
        </a> 
        <h2><span>Membacalah jika ingin menganal dunia</span></h2>
        <div class="email">
            <p>email:</p>
            <h6>svrktvn@gmail.com</h6>
        </div>
        <div class="num">
            <p>Call:</p>
            <h6>081246483950</h6>
        </div>

        <div class="social-icon">
            <a href="https://www.bing.com/ck/a?!&&p=101eb168aca3e809JmltdHM9MTcyMjU1NjgwMCZpZ3VpZD0yMzZjY2I5NC1kMmJjLTZmYWQtM2VlNy1kODczZDNlYTZlM2YmaW5zaWQ9NTE5MA&ptn=3&ver=2&hsh=3&fclid=236ccb94-d2bc-6fad-3ee7-d873d3ea6e3f&psq=instagram+viraktvn&u=a1aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS92aXJha3R2bi8&ntb=1" class="ri-instagram-line"></a>

            <a href="https://www.bing.com/ck/a?!&&p=b46953026262b567JmltdHM9MTcxODkyODAwMCZpZ3VpZD0zMDQzMWMzNi0zNWNjLTY0YzctMWUzNS0wODQ3MzQ5YTY1YjUmaW5zaWQ9NTE4OA&ptn=3&ver=2&hsh=3&fclid=30431c36-35cc-64c7-1e35-0847349a65b5&psq=svrktvn%40gmail.com&u=a1aHR0cHM6Ly9hY2NvdW50cy5nb29nbGUuY29tL2xvZ2luP3NlcnZpY2U9bWFpbCZscD0x&ntb=1" class="bx bxl-gmail"></a>
      </div>

    </div>
      
    <form class="contact-form">
      <input type="text" placeholder="Nama" required>
      <input type="email" name="" placeholder="Email address..." required>
      <textarea name="" id="" cols="30" rows="10" placeholder="Write Message here..." required> </textarea>
      <input type="submit" value="Kirim" class="submit-btn">
    </form>
 </section>
<div class="footer">
    <div class="copyright">
        <p>©Copyright Savira Otavianiii</p>
    </div>
    <a href="#home" class="scroll-top">
        <i class="ri-arrow-up-s-line"></i>
    </a>
</div>

<!-- 
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main.js"></script> -->

</body>



</html>