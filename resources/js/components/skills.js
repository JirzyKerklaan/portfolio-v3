import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const mm = window.matchMedia("(min-width: 1024px)");

function initSkillsAnimation() {
    const line = document.querySelector(".skills-content-line");
    const columns = document.querySelectorAll(".skills-content-column");

    if (!line || columns.length === 0) return;

    const scrollDistance = window.innerHeight * 2;

    let items = [];
    let i = 0;

    columns.forEach((column) => {
        i++;
        items[i] = column.querySelectorAll("li");
    });

    gsap.set(line, {
        scaleY: 0,
        transformOrigin: "top center",
    });

    gsap.set(items[1], {
        opacity: 0,
        y: -10,
    });

    gsap.set(items[2], {
        opacity: 0,
        y: 10,
    });

    gsap.timeline({
        scrollTrigger: {
            trigger: ".skills",
            start: "top top",
            end: `+=${scrollDistance}`,
            scrub: true,
            pin: true,
        },
    })
        .to(items[1], {
            opacity: 1,
            y: 0,
            stagger: 0.1,
            duration: 1,
        })
        .to(items[2], {
            opacity: 1,
            y: 0,
            stagger: {
                each: 0.1,
                from: "end",
            },
            duration: 1,
        }, "<")
        .to(line, {
            scaleY: 1,
            duration: 2,
        }, "<");
}

if (mm.matches) {
    initSkillsAnimation();
}
