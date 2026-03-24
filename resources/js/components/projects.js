import { gsap } from "gsap";

function initCustomCursor() {
    const cursor = document.querySelector("#custom-cursor");
    if (!cursor) return;
    const cursorImg = cursor.querySelector("img");

    const cursorHalfWidth = cursor.offsetWidth / 2;
    const cursorHalfHeight = cursor.offsetHeight / 2;

    const mouse = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
    const pos = { x: mouse.x, y: mouse.y };

    document.querySelectorAll(".project").forEach(p => {
        const img = new Image();
        img.src = p.dataset.image;
    });

    const setX = gsap.quickSetter(cursor, "x", "px");
    const setY = gsap.quickSetter(cursor, "y", "px");

    window.addEventListener("mousemove", e => {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
    });

    function update() {
        pos.x += (mouse.x - pos.x) * 0.2;
        pos.y += (mouse.y - pos.y) * 0.2;

        setX(pos.x - cursorHalfWidth);
        setY(pos.y - cursorHalfHeight);

        requestAnimationFrame(update);
    }
    update();

    const projects = document.querySelectorAll(".project");
    projects.forEach(project => {
        project.addEventListener("mouseenter", () => {
            const imgURL = project.dataset.image;
            if (cursorImg && imgURL) {
                cursorImg.src = imgURL;
            }
            gsap.to(cursor, { opacity: 1, duration: 0.001, ease: "power2.out" });
            gsap.to(cursorImg, { scale: 1, duration: 0.3, ease: "power3.out" });
        });

        project.addEventListener("mouseleave", () => {
            gsap.to(cursor, { opacity: 0, duration: 0.001, ease: "power2.out" });
            gsap.to(cursorImg, { scale: 1, duration: 0.3, ease: "power3.out" });
        });


        project.addEventListener("click", () => {
           project.classList.add('active');
        });
    });
}

document.addEventListener("DOMContentLoaded", initCustomCursor);
