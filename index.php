<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salssy</title>
    <?php include 'inc/styles.php'; ?>
</head>

<body>


    <?php include 'inc/header.php'; ?>

    <section class="hero">
        <spline-viewer url="https://prod.spline.design/d8TKAqnwKS35I2Er/scene.splinecode"></spline-viewer>
        <div class="hero-inner">
            <div class="logo">
                <img src="assets/icons/logo.png" alt="Logo">
            </div>
            <h1>The Sales Engagement</h1>
            <h1> platform from the future</h1>
            <a class="btn"><span>Discover Now</span></a>
        </div>
    </section>

    <section class="companies">
        <div class="companies-inner">
            <h4>Sales from these companies will join the beta</h4>
            <div class="marquee">
                <ul class="marquee-content">
                    <li><i class="fab fa-github"></i></li>
                    <li><i class="fab fa-codepen"></i></li>
                    <li><i class="fab fa-free-code-camp"></i></li>
                    <li><i class="fab fa-dev"></i></li>
                    <li><i class="fab fa-react"></i></li>
                    <li><i class="fab fa-vuejs"></i></li>
                    <li><i class="fab fa-angular"></i></li>
                    <li><i class="fab fa-node"></i></li>
                    <li><i class="fab fa-wordpress"></i></li>
                    <li><i class="fab fa-aws"></i></li>
                    <li><i class="fab fa-docker"></i></li>
                    <li><i class="fab fa-android"></i></li>
                </ul>
            </div>
        </div>
    </section>



    <div class="dashboard-steps">
        <div class="dashboard-steps-inner">
            <ul class="icon-lists">
                <li class="icon-list">
                    <span class="icon">
                        <img src="assets/icons/1.svg" />
                    </span>
                    <span class="icon-text">Setup your account</span>
                </li>
                <li class="icon-list">
                    <span class="icon">
                        <img src="assets/icons/2.svg" />
                    </span>
                    <span class="icon-text">Setup your account</span>
                </li>
                <li class="icon-list">
                    <span class="icon">
                        <img src="assets/icons/3.svg" />
                    </span>
                    <span class="icon-text">Setup your account</span>
                </li>

            </ul>
            <div class="dashboard-step" data-steps="1">
                <img src="assets/images/dashboard-1.avif" />
            </div>
            <div class="dashboard-step" data-steps="2">
                <img src="assets/images/dashboard-2.png" />
            </div>
            <div class="dashboard-step" data-steps="3">
                <img src="assets/images/dashboard-3.png" />
            </div>
        </div>
    </div>

    <!-- <section class="spacing"></section> -->

    <!-- 3d object -->
    <section id="obj3d">
        <div class="obj3d-container">

            <!-- one -->
            <div class="discobal">
                <div class="disco-wrap">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <!-- two -->
                <h1>asas</h1>        
        </div>
    </section>
    


    <?php include 'inc/scripts.php'; ?>
    <script>
    const spline = document.getElementById("mySpline");

    window.addEventListener("mousemove", (event) => {
        const x = (event.clientX / window.innerWidth) * 2 - 1;
        const y = (event.clientY / window.innerHeight) * 2 - 1;

        spline.setAttribute("rotation", `${y * 10}, ${x * 10}, 0`);
    });

    const root = document.documentElement;

    const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
    const marqueeContent = document.querySelector("ul.marquee-content");

    root.style.setProperty("--marquee-elements", marqueeContent.children.length);

    for (let i = 0; i < marqueeElementsDisplayed; i++) {
        marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
    }

    // Gsap

    gsap.registerPlugin(ScrollTrigger);

    // Timeline for dashboard steps
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: ".dashboard-steps",
            pin: true,
            pinSpacing: true,
            scrub: 0.7,
            start: "top top",
            end: "+=300%",
            markers: true
        }
    });

    const boxes = gsap.utils.toArray(".dashboard-step");

    boxes.forEach((box, i) => {
        tl.from(
            box, {
                opacity: 0,
                xPercent: -50, // Cards will slide more visibly
                ease: "power3.out", // Smoother easing
                duration: 1
            },
            i * 0.5 // Staggering effect for slide-in
        );
    });

    // Animation for icons appearing at the top
    gsap.to(".icon-list", {
        yPercent: -100, // Move icons fully upwards
        opacity: 1,
        stagger: 0.5, // Icons will animate one by one
        ease: "power2.out",
        scrollTrigger: {
            trigger: ".dashboard-steps",
            start: "top 10%",
            end: "bottom top",
            scrub: 1,
            markers: true
        }
    });








    // const cards = document.querySelectorAll(".dashboard-step");

    // gsap.to(".dashboard-step:not(:last-child)", {
    //     x: "-150%",
    //     stagger: 1,
    //     ease: "none",
    //     scrollTrigger: {
    //         trigger: ".dashboard-steps",
    //         pin: true,
    //         scrub: 0.35,
    //         start: "top top",
    //         end: "+=" + (cards.length - 1) * 50 + "%",
    //         markers: true
    //     }
    // });

    


    </script>

</body>

</html>