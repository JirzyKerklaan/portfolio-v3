import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const lines = document.querySelectorAll(".manifesto-content h2 span");

lines.forEach(line => {
    const words = line.textContent.split(" ");
    line.innerHTML = words
        .map(word => `<span class="word">${word}</span>`)
        .join(" ");
});

const words = document.querySelectorAll(".manifesto-content h2 .word");

words.forEach(word => (word.style.visibility = "hidden"));

const scrollDistance = words.length * 300;

gsap.timeline({
    scrollTrigger: {
        trigger: ".manifesto",
        start: "top top",
        end: `+=${scrollDistance}`,
        scrub: true,
        pin: true,
    },
})
    .to(words, {
        visibility: "visible",
        stagger: 5 / words.length,
        duration: 1,
    });
