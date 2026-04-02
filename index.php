<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>John Deardorff | Portfolio</title>
    <style>
        /* --- General Reset & Smooth Scrolling --- */
        :root {
            --primary: #121212;
            --accent: #ff4757;
            --light: #f1f2f6;
            --text: #2f3542;
            --header-height: 80px; /* Reference for spacing */
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text);
            background-color: #fff;
            overflow-x: hidden;
        }

        /* --- Navigation --- */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 0 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 90%;
            height: var(--header-height);
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .nav-links a {
            margin-left: 25px;
            text-decoration: none;
            color: var(--primary);
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        /* --- Home / Achievement Hero --- */
        /* Changed from class to ID so the Home button finds it */
        #home {
            height: 70vh;
            background: var(--primary);
            margin-top: 0; /* Let it sit behind the header at top */
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        #home h1 {
            z-index: 5;
            font-size: clamp(2rem, 5vw, 3.5rem);
            letter-spacing: -1px;
            padding: 0 20px;
        }

        .floating-icon {
            position: absolute;
            bottom: -100px;
            font-size: 2.5rem;
            opacity: 0.2;
            animation: floatUp linear infinite;
        }

        @keyframes floatUp {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            20% { opacity: 0.3; }
            80% { opacity: 0.3; }
            100% { transform: translateY(-110vh) rotate(360deg); opacity: 0; }
        }

        /* Horizontal Staggering */
        .icon-1 { left: 15%; animation-duration: 8s; animation-delay: 0s; }
        .icon-2 { left: 35%; animation-duration: 12s; animation-delay: 2s; }
        .icon-3 { left: 55%; animation-duration: 10s; animation-delay: 5s; }
        .icon-4 { left: 75%; animation-duration: 14s; animation-delay: 1s; }
        .icon-5 { left: 90%; animation-duration: 9s; animation-delay: 3s; }

        /* --- Global Section Spacing --- */
        .section { 
            padding: 100px 10%; 
            scroll-margin-top: var(--header-height); /* Prevents header from covering titles */
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 50px;
            align-items: center;
        }

        .profile-img {
            width: 100%;
            border-radius: 20px;
            filter: grayscale(100%);
            transition: filter 0.5s;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .profile-img:hover { filter: grayscale(0%); }

        /* --- Portfolio --- */
        .portfolio-container {
            position: relative;
            padding: 20px 0;
        }

        .portfolio-container::before, .portfolio-container::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 100px;
            z-index: 2;
            pointer-events: none;
        }
        .portfolio-container::before { left: 0; background: linear-gradient(to right, white, transparent); }
        .portfolio-container::after { right: 0; background: linear-gradient(to left, white, transparent); }

        .portfolio-wrapper {
            display: flex;
            gap: 30px;
            overflow-x: auto;
            padding: 20px 0;
            scrollbar-width: none;
        }

        .portfolio-wrapper::-webkit-scrollbar { display: none; }

        .portfolio-card {
            min-width: 320px;
            background: var(--light);
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s;
            text-align: center;
            padding-bottom: 20px;
        }

        .portfolio-card:hover { transform: translateY(-10px); }

        .portfolio-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .project-link {
            display: inline-block;
            margin-top: 15px;
            color: var(--accent);
            text-decoration: none;
            font-weight: bold;
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .nav-btn:hover { opacity: 1; }
        .prev-btn { left: 0; }
        .next-btn { right: 0; }

        /* --- Contact --- */
        .contact-box {
            background: var(--light);
            padding: 60px 20px;
            text-align: center;
            border-radius: 30px;
        }

        .contact-btn {
            background: var(--accent);
            color: white;
            padding: 15px 35px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 50px;
            display: inline-block;
            margin-top: 20px;
            transition: transform 0.2s;
        }

        .contact-btn:hover { transform: scale(1.05); }

        footer {
            padding: 40px;
            text-align: center;
            font-size: 0.8rem;
            color: #aaa;
            border-top: 1px solid #eee;
        }

        @media (max-width: 768px) {
            .about-grid { grid-template-columns: 1fr; }
            header { width: 90%; }
            .nav-links a { margin-left: 10px; font-size: 0.8rem; }
            .nav-btn { display: none; } /* Hide buttons on mobile for swiping */
        }
    </style>
</head>
<body>

    <header>
        <div class="logo"><strong>JOHN</strong>DEARDORFF</div>
        <nav class="nav-links">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#portfolio">Work</a>
            <a href="#contact">Contact</a>
            <a href="https://www.linkedin.com/in/john-deardorff-developer/" target="_blank">LinkedIn</a>
        </nav>
    </header>

    <section id="home">
        <div class="floating-icon icon-1">🏆</div>
        <div class="floating-icon icon-2">🎓</div>
        <div class="floating-icon icon-3">🏅</div>
        <div class="floating-icon icon-4">⭐</div>
        <div class="floating-icon icon-5">🚀</div>
        <h1>My Achievements & Expertise</h1>
    </section>

    <section id="about" class="section">
        <div class="about-grid">
            <img src="https://media.licdn.com/dms/image/v2/D4E03AQHCbSI2XbgkSw/profile-displayphoto-shrink_400_400/B4EZWa_YRzGgAg-/0/1742062061685?e=1776902400&v=beta&t=sEKDSCHD4dPzIVX6SY09FAxsHJD85D-Qk1KLNmdeVGQ" alt="Profile" class="profile-img">
            <div class="about-content">
                <h2>John Deardorff</h2>
                <p>Hello! I'm a developer and designer with a focus on high-performance web experiences. This area functions as my bio and a space for my latest thoughts.</p>
                <p>By using smooth transitions, I ensure that navigating through my career history is as seamless as the code I write.</p>
            </div>
        </div>
    </section>

    <section id="portfolio" class="section">
        <h2 style="text-align:center; margin-bottom: 50px;">Selected Works</h2>
        <div class="portfolio-container">
            <button class="nav-btn prev-btn" onclick="slideManual(-1)">&#10094;</button>
            <button class="nav-btn next-btn" onclick="slideManual(1)">&#10095;</button>
            
            <div class="portfolio-wrapper" id="portfolioSlider">
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x250/121212/ffffff?text=Project+Alpha" alt="Project 1">
                    <h3>Project Alpha</h3>
                    <a href="#" class="project-link">Launch Case Study →</a>
                </div>
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x250/ff4757/ffffff?text=Project+Beta" alt="Project 2">
                    <h3>Project Beta</h3>
                    <a href="#" class="project-link">Launch Case Study →</a>
                </div>
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x250/2f3542/ffffff?text=Project+Gamma" alt="Project 3">
                    <h3>Project Gamma</h3>
                    <a href="#" class="project-link">Launch Case Study →</a>
                </div>
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x250/747d8c/ffffff?text=Project+Delta" alt="Project 4">
                    <h3>Project Delta</h3>
                    <a href="#" class="project-link">Launch Case Study →</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section">
        <div class="contact-box">
            <h2>Ready to start a project?</h2>
            <p>I'm currently accepting new freelance opportunities and collaborations.</p>
            <a href="mailto:yourname@example.com?subject=New Project Inquiry" class="contact-btn">
                CONTACT ME
            </a>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Personal Portfolio. All Rights Reserved.</p>
    </footer>

    <script>
        const slider = document.getElementById('portfolioSlider');
        let isPaused = false;

        function autoScroll() {
            if (!isPaused) {
                if (slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth) {
                    slider.scrollLeft = 0;
                } else {
                    slider.scrollBy({ left: 1, behavior: 'auto' });
                }
            }
        }

        let scrollInterval = setInterval(autoScroll, 30);

        slider.addEventListener('mouseenter', () => isPaused = true);
        slider.addEventListener('mouseleave', () => isPaused = false);
        slider.addEventListener('touchstart', () => isPaused = true);

        function slideManual(direction) {
            const amount = 350; 
            slider.scrollBy({
                left: direction * amount,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>
