import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const spans = document.querySelectorAll(".hero-content h1 span");
const firstname = spans[0];
const lastname = spans[1];

gsap.to(firstname, {
    yPercent: -150,
    xPercent: -10,
    scrollTrigger: {
        trigger: ".hero",
        start: "top top",
        end: "bottom top",
        scrub: true,
        ease: "power1.out",
    }
});

gsap.to(lastname, {
    xPercent: 25,
    scrollTrigger: {
        trigger: ".hero",
        start: "top top",
        end: "bottom top-400",
        scrub: true,
        ease: "power1.out",
    }
});

gsap.to(".hero-bottom-border", {
    scaleX: .5,
    opacity: 0,
    scrollTrigger: {
        trigger: ".hero",
        start: "top top",
        end: "bottom 50%",
        scrub: true,
    }
});
