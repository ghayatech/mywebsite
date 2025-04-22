// زر القائمة - موبايل
const toggleButton = document.getElementById("menu-toggle");
const nav = document.getElementById("main-nav");

toggleButton.addEventListener("click", () => {
nav.classList.toggle("active");
});

const counters = document.querySelectorAll(".counter");
const duration = 2000; // مدة العد بالكامل بالمللي ثانية
let hasAnimated = false;

const animateCounters = () => {
counters.forEach((counter) => {
    counter.classList.add("visible");

    const target = +counter.getAttribute("data-target");
    let count = 0;
    const stepTime = 20; // كم مرة يحدث التحديث بالمللي ثانية
    const steps = duration / stepTime;
    const increment = target / steps;

    const updateCount = () => {
    count += increment;
    if (count < target) {
        counter.innerText = Math.floor(count);
        setTimeout(updateCount, stepTime);
    } else {
        counter.innerText = target;
    }
    };

    setTimeout(updateCount, 600); // نبدأ العد بعد ظهور الحركة من الأسفل
});
};

const section = document.querySelector(".about-stats-wrapper");

const observer = new IntersectionObserver(
(entries) => {
    entries.forEach((entry) => {
    if (entry.isIntersecting && !hasAnimated) {
        animateCounters();
        hasAnimated = true;
    }
    });
},
{ threshold: 0.5 }
);

const cards = document.querySelectorAll(".team-card");
let current = 2; // central card

function updateCarousel() {
cards.forEach((card, index) => {
    card.className = "team-card"; // reset all classes
    const diff = (index - current + cards.length) % cards.length;

    if (index === current) {
    card.classList.add("card-center");
    } else if (diff === 1 || diff === -cards.length + 1) {
    card.classList.add("card-right");
    } else if (diff === 2 || diff === -cards.length + 2) {
    card.classList.add("card-right-behind");
    } else if (diff === cards.length - 1 || diff === -1) {
    card.classList.add("card-left");
    } else if (diff === cards.length - 2 || diff === -2) {
    card.classList.add("card-left-behind");
    }
});
}

updateCarousel();
setInterval(() => {
current = (current + 1) % cards.length;
updateCarousel();
}, 3000);
window.addEventListener("beforeunload", function () {
window.scrollTo(0, 0);
});
observer.observe(section);

const popup = document.getElementById("popup");
const popupTitle = document.getElementById("popup-title");
const popupDescription = document.getElementById("popup-description");
const popupClose = document.getElementById("popup-close");
const popupImages = document.getElementById("popup-images");

const serviceBoxes = document.querySelectorAll(".service-box");

// const serviceData = {
//   "Social Media Design": {
//     description:
//       "Creative visuals that boost your brand's social media presence.",
//     images: [
//       "images/graphic design.jpg",
//       "images/graphic design.jpg",
//       "images/graphic design.jpg",
//       "images/graphic design.jpg",
//       "images/graphic design.jpg",
//       "images/graphic design.jpg",
//       "images/graphic design.jpg",
//       "images/graphic design.jpg",
//     ],
//   },
//   "Video Editing": {
//     description:
//       "Professional edits that keep your audience engaged and inspired.",
//     images: [
//       "images/web1.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//     ],
//   },
//   "Mobile Programming": {
//     description: "High-performance iOS & Android apps with smooth UX/UI.",
//     images: [
//       "images/web1.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//     ],
//   },
//   "Web Programming": {
//     description:
//       "Modern, responsive websites tailored for your business goals.",
//     images: [
//       "images/web1.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//     ],
//   },
//   "Voiceover Services": {
//     description: "Clear and compelling voiceovers for media and business use.",
//     images: [
//       "images/web1.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//     ],
//   },
//   "Content Writing": {
//     description: "SEO-friendly, engaging content crafted for your audience.",
//     images: [
//       "images/web1.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//       "images/web2.jpg",
//     ],
//   },
// };

serviceBoxes.forEach((box) => {
box.addEventListener("click", () => {
    const title = box.querySelector("h3").innerText;
    const data = serviceData[title];

    popupTitle.innerText = title;
    popupDescription.innerText = data.description;

    popupImages.innerHTML = ""; // Clear previous images
    data.images.forEach((imgSrc) => {
    const img = document.createElement("img");
    img.src = imgSrc;
    popupImages.appendChild(img);
    });

    popup.style.display = "block";
});
});

popupClose.addEventListener("click", () => {
popup.style.display = "none";
});

window.addEventListener("click", (e) => {
if (e.target === popup) {
    popup.style.display = "none";
}
});

function setLanguage(lang) {
  document.documentElement.lang = lang;
  document.body.dir = lang === "ar" ? "rtl" : "ltr";

  const t = translations[lang];

  // Navbar
  const navLinks = document.querySelectorAll(".nav-links li a");
  if (navLinks.length >= 4) {
    navLinks[0].innerText = t.home;
    navLinks[1].innerText = t.services;
    navLinks[2].innerText = t.about;
    navLinks[3].innerText = t.contact;
  }

  // Hero Section
  document.getElementById("title-section-1").innerText = t.welcome;
  document.querySelector(".hero-content p").innerText = t.welcomeText;
  document.querySelector(".description").innerText = t.description;
  document.querySelector(
    ".btn.primary"
  ).innerHTML = `<i class="fas fa-tools"></i> ${t.ourServices}`;
  document.querySelector(
    ".btn.secondary"
  ).innerHTML = `<i class="fas fa-headset"></i> ${t.contactUs}`;

  // Sections Titles
  const sectionTitles = document.querySelectorAll("#title-section");
  if (sectionTitles.length >= 6) {
    sectionTitles[0].innerText = t.statistics;
    sectionTitles[1].innerText = t.projects;
    sectionTitles[2].innerText = t.ourServices;
    sectionTitles[3].innerText = t.aboutTitle;
    sectionTitles[4].innerText = t.contactTitle;
    sectionTitles[5].innerText = t.sendMsg;
  }

  // About section
  const aboutPs = document.querySelectorAll(".about-content p");
  if (aboutPs.length >= 2) {
    aboutPs[0].innerText = t.aboutText1;
    aboutPs[1].innerText = t.aboutText2;
  }

  // Team section
  document.querySelector(".team-title").innerText = t.teamTitle;
  document.getElementById("paragraph-team").innerText = t.teamText;

  // Contact section
  const contactSection = document.querySelector(".contact-left");
  if (contactSection) {
    contactSection.querySelector("h3").innerText = t.contactInfo;
    contactSection.querySelectorAll("h3")[1].innerText = t.followUs;
  }

  // Contact form
  const inputs = document.querySelectorAll(".contact-form input");
  if (inputs.length >= 2) {
    inputs[0].placeholder = t.inputName;
    inputs[1].placeholder = t.inputEmail;
  }
  document.querySelector(".contact-form textarea").placeholder = t.inputMessage;
  document.querySelector(".contact-form button").innerText = t.btnSend;

  // Services
  const services = document.querySelectorAll(".service-box");
  services.forEach((box, index) => {
    const title = box.querySelector("h3");
    const desc = box.querySelector("p");
    if (t.serviceTitles[index]) title.innerText = t.serviceTitles[index];
    if (t.serviceDescriptions[index])
      desc.innerText = t.serviceDescriptions[index];
  });

  // فريق العمل
  const teamCards = document.querySelectorAll(".team-card");
  const roles = translations[lang].teamRoles;
  const descs = translations[lang].teamDescriptions;
  const exps = translations[lang].teamExperience;

  teamCards.forEach((card, i) => {
    const role = card.querySelector(".role");
    const desc = card.querySelector(".description");
    const exp = card.querySelector(".experience");

    if (role && roles[i]) role.innerText = roles[i];
    if (desc && descs[i]) desc.innerText = descs[i];
    if (exp && exps[i]) exp.innerText = exps[i];
  });

  const stats = document.querySelectorAll(".stat p");
  const labels = t.statsLabels;
  stats.forEach((p, i) => {
    if (labels[i]) p.innerText = labels[i];
  });
  document.querySelector(".contact-form button").innerText = t.btnSend;
  
  // Footer
  document.querySelector("footer p").innerText = t.footer;
}