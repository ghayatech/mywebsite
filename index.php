<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GhayaTech - غايتك</title>
  <link rel="icon" type="image/svg+xml" sizes="180x180" href="images/logo-ghaya2.png">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

  <header>
    <div class="logo">
      <a href="#">
        <img src="images/ghayatech-logo.svg" alt="GhayaTech Logo" class="logo-img" />
      </a>
    </div>
    <button class="menu-toggle" id="menu-toggle">
      <i class="fas fa-bars"></i>
    </button>
    <nav id="main-nav" class="nav">
      <ul class="nav-links">
        <li><a href="#hero">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact-section">Contact</a></li>
      </ul>
      <div class="language-switch">
        <a href="#" class="lang" onclick="setLanguage('en')">English</a> |
        <a href="#" class="lang" onclick="setLanguage('ar')">العربية</a>
      </div>
    </nav>
  </header>

  <section class="hero" id="hero">
    <video src="video/homepage-video.mp4" autoplay loop muted></video>
    <div class="hero-content">
      <h1 id="title-section-1">Welcome to GhayaTech</h1>
      <p>We build digital solutions to empower your business</p>
      <p class="description">
        At GhayaTech, we transform your ideas into professional digital
        products.<br />
        Whether design or development, we deliver solutions that make impact.
      </p>
      <div class="hero-buttons">
        <a href="#services" class="btn primary">
          <i class="fas fa-tools"></i> Our Services
        </a>
        <a href="#contact" class="btn secondary">
          <i class="fas fa-headset"></i> Contact Us
        </a>
      </div>
    </div>
  </section>

  <!-- Statistics Section -->
  <section class="about-stats-wrapper">
    <h2 class="section-title" id="title-section">Company Statistics</h2>
    <div class="about-stats-1">
      <div class="stat">
        <i class="fas fa-briefcase"></i>
        <h3 class="counter" data-target="250">0</h3>
        <p>Successful Projects</p>
      </div>
      <div class="stat">
        <i class="fas fa-users"></i>
        <h3 class="counter" data-target="140">0</h3>
        <p>Happy Clients</p>
      </div>
      <div class="stat">
        <i class="fas fa-award"></i>
        <h3 class="counter" data-target="8">0</h3>
        <p>Years of Experience</p>
      </div>
    </div>

    <!-- Previous Projects Section -->
    <section class="previous-projects">
      <h3 id="title-section">Our Previous Projects</h3>
      <div class="project-list">
        <div class="project-item">
          <img src="images/project1.jpg" alt="Project 1">
          <p id="title-section">Women's Fashion Store App</p>
        </div>
        <div class="project-item">
          <img src="images/project2.jpg" alt="Project 2">
          <p id="title-section">Sweets Booking & Ordering App</p>
        </div>
        <div class="project-item">
          <img src="images/project3.jpg" alt="Project 3">
          <p id="title-section">Modern Wooden Chairs Store</p>
        </div>
      </div>
    </section>
  </section>

  <section class="services-page" id="services">
    <h1 id="title-section">Our Services</h1>
    <div class="services-wrapper">
      <div class="service-box">
        <i class="fas fa-pencil-ruler"></i>
        <h3>Social Media Design</h3>
        <p>Creative visuals that boost your brand's social media presence.</p>
        <img src="images/social-media.jpg" alt="Social Media Design" class="service-img" />
      </div>
      <div class="service-box">
        <i class="fas fa-video"></i>
        <h3>Video Editing</h3>
        <p>Professional edits that keep your audience engaged and inspired.</p>
        <img src="images/video-editing.jpg" alt="Video Editing" class="service-img" />
      </div>
      <div class="service-box">
        <i class="fas fa-mobile-alt"></i>
        <h3>Mobile Programming</h3>
        <p>High-performance iOS & Android apps with smooth UX/UI.</p>
        <img src="images/mobile-programming.jpg" alt="Mobile Programming" class="service-img" />
      </div>
      <div class="service-box">
        <i class="fas fa-code"></i>
        <h3>Web Programming</h3>
        <p>Modern, responsive websites tailored for your business goals.</p>
        <img src="images/web-programming.jpg" alt="Web Programming" class="service-img" />
      </div>
      <div class="service-box">
        <i class="fas fa-microphone"></i>
        <h3>Voiceover Services</h3>
        <p>Clear and compelling voiceovers for media and business use.</p>
        <img src="images/voice-over.jpg" alt="Voiceover Services" class="service-img" />
      </div>
      <div class="service-box">
        <i class="fas fa-pencil-alt"></i>
        <h3>Content Writing</h3>
        <p>SEO-friendly, engaging content crafted for your audience.</p>
        <img src="images/writing.jpg" alt="Content Writing" class="service-img" />
      </div>
    </div>
  </section>

  <section class="about-us" id="about">
    <div class="about-container">
      <!-- الصورة المتحركة -->
      <div class="about-image">
        <img src="images/about-us-1.jpg" alt="GhayaTech Team" class="about-image-img">
      </div>

      <!-- محتوى حولنا -->
      <div class="about-content">
        <h2 id="title-section">About Us</h2>
        <p>
          GhayaTech is a creative digital agency based in Gaza, Palestine. Since 2018, we've delivered
          top-tier services in graphic design, motion graphics, mobile & web development, and more.
        </p>
        <p>
          Our team of professionals is passionate about helping brands grow with innovative solutions,
          meaningful design, and solid code. We combine creativity and technology to bring your vision to life.
        </p>
      </div>
    </div>
  </section>


  <!-- Team Carousel Section -->
  <section class="team-carousel-section">
    <h2 class="team-title">Our Team</h2>
    <p id="paragraph-team">Our talented team is dedicated to bringing your ideas to life with creativity and precision</p>
    <div class="carousel-container">
      <div class="team-card" id="card-0">
        <img src="images/mohd.jpg" alt="Team Member" />
        <h3>Mohammed Lulu</h3>
        <p class="role">CEO & Co-Founder</p>
        <p class="description">Leading the vision and growth of the company.</p>
        <p class="experience">7+ Years of Experience</p>
      </div>
      <div class="team-card" id="card-1">
        <img src="images/kareem-image.jpg" alt="Team Member" />
        <h3>Kareem Lulu</h3>
        <p class="role">Video editor</p>
        <p class="description">Crafting compelling visuals and seamless stories.</p>
        <p class="experience">6+ Years of Experience</p>
      </div>
      <div class="team-card" id="card-2">
        <img src="images/marwan-alrayes.png" alt="Team Member" />
        <h3>Marwan alrayes</h3>
        <p class="role">Full Stack Developer</p>
        <p class="description">Building smart, scalable, and secure web apps.</p>
        <p class="experience">4+ Years of Experience</p>
      </div>
      <div class="team-card" id="card-3">
        <img src="images/mohammed-abuhaseera.jpg" alt="Team Member" />
        <h3>Mohammed Abu Haseera</h3>
        <p class="role">Mobile Developer</p>
        <p class="description">Building smart and responsive apps.</p>
        <p class="experience">5+ Years of Experience</p>
      </div>
      <div class="team-card" id="card-4">
        <img src="images/Twfeeq.jpg" alt="Team Member" />
        <h3>Tawfeeq Abu Haseera</h3>
        <p class="role">Backend Developer</p>
        <p class="description">Designing robust and efficient server solutions.</p>
        <p class="experience">8+ Years of Experience</p>
      </div>
      <div class="team-card" id="card-4">
        <img src="images/abood.jpg" alt="Team Member" />
        <h3>Abdalmajid Aburahma</h3>
        <p class="role">Graphic Designer</p>
        <p class="description">Bringing ideas to life with visual creativity.</p>
        <p class="experience">5+ Years of Experience</p>
      </div>
      <div class="team-card" id="card-4">
        <img src="images/mahdy.jpg" alt="Team Member" />
        <h3>Mahdy Elkhoudary</h3>
        <p class="role">Graphic Designer</p>
        <p class="description">Bringing ideas to life with visual creativity.</p>
        <p class="experience">5+ Years of Experience</p>
      </div>
      <div class="team-card" id="card-4">
        <img src="images/Najd.jpg" alt="Team Member" />
        <h3>Najd Akila</h3>
        <p class="role">Voiceover</p>
        <p class="description">Delivering clear, engaging, and powerful voice.</p>
        <p class="experience">8+ Years of Experience</p>
      </div>
      <div class="team-card" id="card-4">
        <img src="images/alaa-1.jpg" alt="Team Member" />
        <h3>Alaa Dawoud</h3>
        <p class="role">Content Writing</p>
        <p class="description">Writing impactful, clear, and engaging content.</p>
        <p class="experience">5+ Years of Experience</p>
      </div>
    </div>
  </section>

  <section class="contact-section" id="contact-section">
    <h2 class="section-title contact-title" id="title-section">Contact With Us</h2>
    <div class="contact-flexbox">
      <div class="contact-left">
        <div class="contact-logo">
          <img src="images/ghayatech-logo.svg" alt="GhayaTech Logo" />
        </div>
        <h3 id="title-section">Contact Information</h3>
        <p><i class="fas fa-phone"></i> +970 567 776 659</p>
        <p><i class="fas fa-map-marker-alt"></i> Gaza, Palestine</p>
        <h3 id="title-section">Follow Us</h3>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-snapchat-ghost"></i></a>
          <a href="#"><i class="fab fa-x-twitter"></i></a>
          <a href="#"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
      <div class="contact-right">
        <h3 id="title-section">Send us a Message</h3>

        <form action="send_email.php" method="POST" class="contact-form" id="contactForm">
          <input type="text" name="name" placeholder="Full Name" required />
          <input type="email" name="email" placeholder="Email Address" required />
          <textarea rows="5" name="message" placeholder="Your Message" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Popup أثناء الإرسال -->
  <div id="sendingPopup" class="sending-popup">
    <div class="popup-content">
      ⏳ جاري إرسال البريد...
    </div>
  </div>


  <!-- إشعار النجاح -->
  <div id="successMessage" style="display:none; position:fixed; bottom:30px; right:30px; background:#4caf50; color:white; padding:15px 25px; border-radius:10px; font-size:16px; z-index:9999; box-shadow:0 2px 5px rgba(0,0,0,0.3);">
    ✅ تم إرسال الرسالة بنجاح!
  </div>





  <footer>
    <p>&copy; 2025 GhayaTech. All rights reserved.</p>
  </footer>

  <div id="popup" class="popup">
    <div class="popup-content">
      <span class="popup-close" id="popup-close">&times;</span>
      <h3 id="popup-title">Service Title</h3>
      <p id="popup-description">Service description goes here...</p>
      <div id="popup-images" class="popup-images"></div>
    </div>
  </div>

  <a href="https://wa.me/970599621187" class="whatsapp-float" target="_blank" aria-label="WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const form = document.getElementById("contactForm");
      const popup = document.getElementById("sendingPopup");
      const successMsg = document.getElementById("successMessage");

      form.addEventListener("submit", function(e) {
        e.preventDefault();

        // عرض popup ومنع التمرير
        popup.style.display = "flex";
        document.body.classList.add("no-scroll");

        // تجهيز البيانات
        const formData = new FormData(form);

        fetch("send_email.php", {
            method: "POST",
            body: formData
          })
          .then(res => res.text())
          .then(response => {
            popup.style.display = "none";
            document.body.classList.remove("no-scroll");

            if (response.includes("تم إرسال الرسالة")) {
              successMsg.style.display = "block";
              setTimeout(() => successMsg.style.display = "none", 5000);
            } else {
              alert("فشل الإرسال:\n" + response);
            }
          })
          .catch(error => {
            popup.style.display = "none";
            document.body.classList.remove("no-scroll");
            alert("حدث خطأ في الإرسال");
            console.error(error);
          });
      });
    });
  </script>



  <script src="Script.js"></script>
  <script src="translations.js"></script>

</body>

</html>