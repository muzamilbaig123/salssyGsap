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