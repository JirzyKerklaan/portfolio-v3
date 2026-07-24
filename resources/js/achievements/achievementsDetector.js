import barba from '@barba/core';
import achievementsManager from "./AchievementsManager.js";

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            achievementsManager.trackSection(
                entry.target.dataset.section
            );
        }
    });
});

document
    .querySelectorAll("[data-section]")
    .forEach(section => observer.observe(section));

barba.hooks.afterEnter((data) => {
    const project = data.next.container.querySelector("[data-project]");

    if (project) {
        achievementsManager.trackProject(
            project.dataset.project
        );
    }
});
