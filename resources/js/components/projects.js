import { gsap } from "gsap";

function initCustomCursor() {
    const cursor = document.querySelector("#custom-cursor");
    if (!cursor) return;
    const cursorImg = cursor.querySelector("img");

    // Fixed cursor size (CSS sets width/height)
    const cursorHalfWidth = cursor.offsetWidth / 2;
    const cursorHalfHeight = cursor.offsetHeight / 2;

    // Track mouse position
    const mouse = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
    const pos = { x: mouse.x, y: mouse.y };

    // Preload hover images
    document.querySelectorAll(".project").forEach(p => {
        const img = new Image();
        img.src = p.dataset.image;
    });

    // Hide cursor initially
    cursor.style.opacity = 0;

    // QuickSetter for GPU-accelerated transform
    const setX = gsap.quickSetter(cursor, "x", "px");
    const setY = gsap.quickSetter(cursor, "y", "px");

    // Mousemove updates target coordinates
    window.addEventListener("mousemove", e => {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
    });

    // Animation loop
    function update() {
        // Smooth interpolation
        pos.x += (mouse.x - pos.x) * 0.2;
        pos.y += (mouse.y - pos.y) * 0.2;

        setX(pos.x - cursorHalfWidth);
        setY(pos.y - cursorHalfHeight);

        requestAnimationFrame(update);
    }
    update();

    // Hover effects
    const projects = document.querySelectorAll(".project");
    projects.forEach(project => {
        project.addEventListener("mouseenter", () => {
            const imgURL = project.dataset.image;
            if (cursorImg && imgURL) {
                cursorImg.src = imgURL;
                // No layout recalculation needed
            }
            gsap.to(cursor, { opacity: 1, duration: 0.2, ease: "power2.out" });
            gsap.to(cursorImg, { scale: 1, duration: 0.3, ease: "power3.out" });
        });

        project.addEventListener("mouseleave", () => {
            gsap.to(cursor, { opacity: 0, duration: 0.2, ease: "power2.out" });
            gsap.to(cursorImg, { scale: 1, duration: 0.3, ease: "power3.out" });
        });
    });
}

document.addEventListener("DOMContentLoaded", initCustomCursor);
