import { gsap } from "gsap";

let cursor, cursorImg, cursorHalfWidth, cursorHalfHeight;
let mouse = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
let pos = { x: mouse.x, y: mouse.y };
let setX, setY;

export function initCustomCursor() {
    cursor = document.querySelector("#custom-cursor");
    if (!cursor) return;

    cursorImg = cursor.querySelector("img");
    cursorHalfWidth = cursor.offsetWidth / 2;
    cursorHalfHeight = cursor.offsetHeight / 2;

    // Preload project images
    document.querySelectorAll(".project").forEach(p => {
        const img = new Image();
        img.src = p.dataset.image + '.webp';
    });

    setX = gsap.quickSetter(cursor, "x", "px");
    setY = gsap.quickSetter(cursor, "y", "px");

    // Cursor follows mouse
    window.addEventListener("mousemove", e => {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
    });

    requestAnimationFrame(updateCursor);
    bindProjectEvents();
}

function updateCursor() {
    pos.x += (mouse.x - pos.x) * 0.2;
    pos.y += (mouse.y - pos.y) * 0.2;

    setX(pos.x - cursorHalfWidth);
    setY(pos.y - cursorHalfHeight);

    requestAnimationFrame(updateCursor);
}

export function bindProjectEvents() {
    const projects = document.querySelectorAll(".project");
    projects.forEach(project => {
        // Remove existing listeners to prevent duplicates
        project.replaceWith(project.cloneNode(true));
    });

    const updatedProjects = document.querySelectorAll(".project");
    updatedProjects.forEach(project => {
        project.addEventListener("mouseenter", () => {
            const imgURL = project.dataset.image;
            if (cursorImg && imgURL) cursorImg.src = imgURL + '.webp';
            gsap.to(cursor, { opacity: 1, duration: 0.001 });
            gsap.to(cursorImg, { scale: 1, duration: 0.3, ease: "power3.out" });
        });

        project.addEventListener("mouseleave", () => {
            gsap.to(cursor, { opacity: 0, duration: 0.001 });
            gsap.to(cursorImg, { scale: 1, duration: 0.3, ease: "power3.out" });
        });

        project.addEventListener("click", () => {
            project.classList.add("active");
        });
    });
}

document.addEventListener("DOMContentLoaded", initCustomCursor);
