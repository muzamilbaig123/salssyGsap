// Create the animation
gsap.to(".columns-wrapper", {
    x: "-75%", // Move to show the last column (move left by 3/4 of the total width)
    ease: "none",
    scrollTrigger: {
        trigger: ".sticky-section",
        start: "top top",
        end: "bottom bottom",
        scrub: 1, // Smooth scrubbing effect
        pin: false, // The container is already sticky with CSS
    }
});

// secoundlastloader


document.addEventListener('DOMContentLoaded', () => {
    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);
    
    // Setup for the steps in the first column
    setupScrollTrigger();
    
    // Setup for the loader in the second column - now independent of scroll
    startLoader();
});

function setupScrollTrigger() {
    // Get all steps
    const steps = document.querySelectorAll('.step');
    
    // Remove any active classes initially
    steps.forEach(step => {
        step.classList.remove('active');
    });
    
    // Create a scroll trigger for each step
    steps.forEach((step) => {
        // Create a scroll trigger that only activates the current step
        ScrollTrigger.create({
            trigger: step,
            start: 'top center', // Trigger when the top of the step hits the center of the viewport
            end: 'bottom center', // End when the bottom of the step leaves the center
            onEnter: () => {
                // Remove active class from all steps
                steps.forEach(s => s.classList.remove('active'));
                // Add active class to current step
                step.classList.add('active');
            },
            onLeave: () => {
                // Remove active class when leaving
                step.classList.remove('active');
            },
            onEnterBack: () => {
                // Remove active class from all steps
                steps.forEach(s => s.classList.remove('active'));
                // Add active class to current step when scrolling back up
                step.classList.add('active');
            },
            onLeaveBack: () => {
                // Remove active class when scrolling back up and leaving
                step.classList.remove('active');
            },
            markers: false // Set to true for debugging
        });
    });
}

function startLoader() {
    // Start the loader animation from 0 to 100%
    const duration = 10; // 10 seconds to complete
    
    // Animate the loader progress
    gsap.to('.loader-progress', {
        width: '100%',
        duration: duration,
        ease: 'linear'
    });
    
    // Animate the percentage text
    const loaderValue = document.querySelector('.loader-value');
    let progress = 0;
    
    // Update the percentage text every 100ms
    const interval = setInterval(() => {
        progress += 1;
        loaderValue.textContent = `${progress}%`;
        
        if (progress >= 100) {
            clearInterval(interval);
        }
    }, duration * 10); // Update 100 times over the duration
}




// image hhorizantal slider 
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('slider');
    const slides = document.querySelectorAll('.slide');
    const slideWidth = slides[0].offsetWidth + parseInt(getComputedStyle(slides[0]).marginLeft) + 
                       parseInt(getComputedStyle(slides[0]).marginRight);
    
    // Clone slides for infinite effect
    const slidesToClone = Math.ceil(window.innerWidth / slideWidth);
    
    // Clone beginning slides and add to end
    for (let i = 0; i < slidesToClone; i++) {
        const clone = slides[i].cloneNode(true);
        clone.classList.add('clone');
        slider.appendChild(clone);
    }
    
    // Clone end slides and add to beginning
    for (let i = slides.length - slidesToClone; i < slides.length; i++) {
        const clone = slides[i].cloneNode(true);
        clone.classList.add('clone');
        slider.insertBefore(clone, slider.firstChild);
    }
    
    // Set initial position to show original slides
    slider.style.transform = `translateX(-${slidesToClone * slideWidth}px)`;
    
    let position = -slidesToClone * slideWidth;
    const speed = 1; // pixels per frame
    
    function animate() {
        position -= speed;
        
        // Reset position when we've scrolled through all original slides
        if (position <= -(slides.length + slidesToClone) * slideWidth) {
            position = -slidesToClone * slideWidth;
        }
        
        slider.style.transform = `translateX(${position}px)`;
        requestAnimationFrame(animate);
    }
    
    // Start animation after a short delay
    setTimeout(() => {
        requestAnimationFrame(animate);
    }, 1000);
});

//  faqs section

document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            // Check if current item is already active
            const isActive = item.classList.contains('active');
            
            // Close all items first
            faqItems.forEach(faqItem => {
                faqItem.classList.remove('active');
            });
            
            // If clicked item wasn't active, open it
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
});