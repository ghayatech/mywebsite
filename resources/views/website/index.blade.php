<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>GhayaTech - غايتك</title>
    <link rel="icon" type="image/svg+xml" sizes="180x180" href="{{ asset('assets/images/logo-ghaya2.png') }}">

    <style>
        /* تأخير تحميل الخطوط حتى لا تؤثر على العرض */
        @font-face {
            font-display: swap;
            font-family: "Fairuz";
            src: url("/assets/fonts/Fairuz-Normal.otf") format("truetype")
        }

        @font-face {
            font-display: swap;
            font-family: "Fairuz-Bold";
            src: url("/assets/fonts/Fairuz-Bold.otf") format("truetype")
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    <header class="ghaya-header">
        <div class="ghaya-logo">
            <a href="#">
                <img src="{{ asset('assets/images/ghayatech-logo.svg') }}" alt="GhayaTech Logo" class="ghaya-logo-img">
            </a>
        </div>

        <button class="ghaya-menu-toggle" id="ghaya-menu-toggle">☰</button>

        <nav class="ghaya-nav" id="ghaya-nav">
            <ul class="ghaya-nav-links">
                @foreach ($menus as $menu)
                    @php
                        $translation = $menu->translation();
                    @endphp
                    @if ($translation)
                        <li><a href="{{ $menu->url }}" data-url="{{ $menu->url }}"
                                class="nav-item ghaya-nav-link ">{{ $translation->name }}</a>
                        </li>
                    @endif
                @endforeach


                {{-- <li><a href="#home" class="ghaya-nav-link">Home</a></li>
                <li><a href="#services" class="ghaya-nav-link">Services</a></li>
                <li><a href="#about" class="ghaya-nav-link">About</a></li>
                <li><a href="#contact" class="ghaya-nav-link">Contact</a></li> --}}
            </ul>

            <div class="ghaya-language-switch">
                <a href="{{ route('lang.switch', 'en') }}" class="ghaya-lang">English</a> |
                <a href="{{ route('lang.switch', 'ar') }}" class="ghaya-lang">العربية</a>
            </div>
        </nav>
    </header>

    <section class="hero" id="hero">
        <video src="{{ asset($hero->video_url) }}" autoplay loop muted></video>
        <div class="hero-content">
            <h1 id="title-section-1">{{ $hero->main_text }}</h1>
            <p>{{ $hero->small_paragraph }}</p>
            <p class="description">
                {{ $hero->description }}
            </p>
            <div class="hero-buttons">
                <a href="{{ $hero->services_button_link }}" class="btn primary">
                    <i class="fas fa-tools"></i> {{ $hero->services_button_text }}
                </a>
                <a href="#{{ $hero->contact_button_link }}" class="btn secondary">
                    <i class="fas fa-headset"></i> {{ $hero->contact_button_text }}
                </a>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    @if ($statisticsSection)
        <section class="about-stats-wrapper">
            <h2 class="section-title" id="title-section">{{ $statisticsSection->main_text }}</h2>
            <div class="about-stats-1">
                @foreach ($statisticsSection->statistics as $stat)
                    <div class="stat">
                        <i class="fas fa-{{ $stat->icon }}"></i>
                        <h3 class="counter" data-target="{{ $stat->number }}">{{ $stat->number }}</h3>
                        {{-- <p class="text-4xl font-extrabold text-blue-600">{{ $stat->number }}</p> --}}
                        <p>{{ $stat->title }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    <!-- Blog Section -->
    @if (!empty($blogPosts))
        <section class="blog-section" id='blog'>
            <h2 class="section-title">{{ __('messages.section-title.blog-section') }}</h2>

            <!-- Container for Blog Layout -->
            <div class="blog-container">
                <!-- Featured Post (Right Column) -->
                @php
                    $featured = $blogPosts[0]; // أول بوست
                    $others = array_slice($blogPosts, 1); // الثلاثة الباقيين
                @endphp

                <div class="blog-featured post-card">
                    <img src="{{ $featured['image'] }}" alt="{{ $featured['title'] }}">
                    <div class="content">
                        <h2>{{ $featured['title'] }}</h2>
                        <p>
                            {!! \Illuminate\Support\Str::limit(strip_tags($featured['description']), 200) !!}
                        </p>
                        <a href="{{ $featured['link'] }}" target="_blank" class="read-more hover:underline">Read More
                            →</a>
                    </div>
                </div>
                <!-- Posts List (Left Column) -->
                <div class="blog-list">
                    @foreach ($others as $post)
                        <div class="post-card">
                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}">
                            <div class="content">
                                <h3>{{ $post['title'] }}</h3>
                                <p>
                                    {!! \Illuminate\Support\Str::limit(strip_tags($post['description']), 100) !!}
                                </p>
                                <a href="{{ $post['link'] }}" target="_blank" class="read-more hover:underline">Read
                                    More...</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- See All Button -->
            <div class="see-all-container">
                <a href="https://blog.ghayatech.com" target="_blank" class="see-all-btn">See All <i
                        class="fas fa-arrow-right"></i></a>
            </div>
        </section>
    @endif

    <section class="services-page" id="services">
        <h1 id="title-section">{{ __('messages.title-services-page') }}</h1>
        <div class="services-wrapper">
            @foreach ($services as $service)
                @php
                    $translation = $service->translations->firstWhere('locale', app()->getLocale());
                @endphp
                <div class="service-box">
                    <i class="fas fa-{{ $service->icon }}"></i>
                    <h3>{{ $translation->title ?? '' }}</h3>
                    <p>{{ $translation->description ?? '' }}</p>
                    <img src="{{ asset($service->image) }}" alt="{{ $translation->title }}" class="service-img">
                </div>
            @endforeach
        </div>
    </section>

    <section class="about-us" id="about">
        <div class="about-container">
            <!-- الصورة المتحركة -->
            <div class="about-image">
                <img src="{{ asset($about->image) }}" alt="GhayaTech Team" class="about-image-img">
            </div>

            <!-- محتوى حولنا -->
            <div class="about-content">
                <h2 id="about-title">{{ $aboutTranslation->title }}</h2>
                <p>{{ $aboutTranslation->paragraph1 }}</p>
                <p>{{ $aboutTranslation->paragraph2 }}</p>
            </div>
        </div>
    </section>



    <!-- Team Carousel Section -->
    <section class="team-carousel-section" id="team">
        <h2 class="team-title">{{ $teamSection->translations->first()?->title }}</h2>
        <p id="paragraph-team">{{ $teamSection->translations->first()?->description }}</p>
        <div class="carousel-container">
            @foreach ($teamMembers as $member)
                <div class="team-card" id="card-0">
                    <img src="{{ asset($member->image) }}" alt="{{ $member->translations->first()?->name }}" />
                    <h3>{{ $member->translations->first()?->name }}</h3>
                    <p class="role">{{ $member->translations->first()?->position }}</p>
                    <p class="description">{{ $member->translations->first()?->task_description }}</p>
                    <p class="experience">{{ $member->translations->first()?->experience }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="contact-section" id="contact-section">
        <h2 class="section-title contact-title" id="title-section">{{ __('messages.section-title.contact-section') }}
        </h2>
        <div class="contact-flexbox">
            <div class="contact-left">
                <div class="contact-logo">
                    <img src="{{ asset('assets/images/ghayatech-logo.svg') }}" alt="GhayaTech Logo" />
                </div>
                <h3 id="title-section">{{ __('messages.content.title-section') }}</h3>
                <p><i class="fas fa-phone"></i> +970 599 621 187</p>
                <p><i class="fas fa-map-marker-alt"></i> {{ __('messages.content.title-city') }}</p>
                <h3 id="title-section">{{ __('messages.content.title-follow') }}</h3>
                <div class="social-icons">
                    <a href="https://www.facebook.com/ghayatech" target="_blank" rel="noopener noreferrer"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/ghayatech/" target="_blank" rel="noopener noreferrer"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://wa.me/970599621187" target="_blank" rel="noopener noreferrer"><i
                            class="fab fa-whatsapp"></i></a>
                    <a href="https://www.snapchat.com/add/ghayatech?share_id=m6NWL7RD1l0&locale=en-US" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-snapchat-ghost"></i></a>
                    <a href="https://x.com/GhayaTech" target="_blank" rel="noopener noreferrer"><i
                            class="fab fa-x-twitter"></i></a>
                    <a href="https://www.tiktok.com/@ghayatech?is_from_webapp=1&sender_device=pc" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            <div class="contact-right">
                <h3 id="send-msg-title">{{ __('messages.send-message.title') }}</h3>
                <form action="{{ route('contact.send') }}" method="POST" class="contact-form" id="contactForm">
                    @csrf
                    <input type="text" name="name" placeholder="{{ __('messages.send-message.fname') }}"
                        required />
                    <input type="email" name="email" placeholder="{{ __('messages.send-message.email') }}"
                        required />
                    <textarea rows="5" name="message" placeholder="{{ __('messages.send-message.message') }}" required></textarea>

                    {{-- reCAPTCHA --}}
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    <button type="submit">{{ __('messages.send-message.button') }}</button>
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
    <div id="successMessage"
        style="display:none; position:fixed; bottom:30px; right:30px; background:#4caf50; color:white; padding:15px 25px; border-radius:10px; font-size:16px; z-index:9999; box-shadow:0 2px 5px rgba(0,0,0,0.3);">
        ✅ تم إرسال الرسالة بنجاح!
    </div>





    <footer>
        <p>&copy; {{ __('messages.footer') }}</p>
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('ghaya-menu-toggle');
            const nav = document.getElementById('ghaya-nav');

            toggle.addEventListener('click', function() {
                nav.classList.toggle('active');
                toggle.textContent = nav.classList.contains('active') ? '✕' : '☰';
            });

            // إغلاق القائمة عند النقر على أي رابط
            document.querySelectorAll('.ghaya-nav-link, .ghaya-lang').forEach(link => {
                link.addEventListener('click', () => {
                    nav.classList.remove('active');
                    toggle.textContent = '☰';
                });
            });

        });

        function setActiveLink() {
            const currentHash = window.location.hash || '#home';
            const navItems = document.querySelectorAll('.nav-item');

            navItems.forEach(item => {

                if (item.getAttribute('data-url') === currentHash) {
                    item.classList.add('active-link');
                } else {
                    item.classList.remove('active-link');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', setActiveLink);
        window.addEventListener('hashchange', setActiveLink);
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("contactForm");
            const popup = document.getElementById("sendingPopup");
            const successMsg = document.getElementById("successMessage");

            form.addEventListener("submit", function(e) {
                e.preventDefault();

                // تحقق من وجود التوكن الخاص بـ reCAPTCHA
                const token = document.querySelector('textarea[name="g-recaptcha-response"]');
                if (!token || !token.value) {
                    alert("يرجى التحقق من reCAPTCHA");
                    return;
                }

                popup.style.display = "flex";
                document.body.classList.add("no-scroll");

                const formData = new FormData(form);

                fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        },
                        body: formData,
                    })
                    .then(res => res.text())
                    .then(response => {
                        popup.style.display = "none";
                        document.body.classList.remove("no-scroll");

                        if (response.includes("تم إرسال الرسالة")) {
                            successMsg.style.display = "block";
                            form.reset();
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


    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/translations.js') }}"></script>

</body>

</html>
