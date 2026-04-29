import barba from '@barba/core';
import { gsap } from 'gsap';
import {bindProjectEvents} from "./projects.js";
import {initProgressBar} from "./progressbar.js";

barba.init({
    transitions: [
        {
            name: 'projects-transition',

            from: { namespace: 'home' },
            to: { namespace: 'projects-show' },

            async leave({ current, trigger }) {
                const projectRow = trigger.closest('.project');
                const rect = projectRow.getBoundingClientRect();
                const overlay = document.createElement('div');
                overlay.className = "fixed bg-secondary-500 z-110 w-full";
                overlay.style.height = `${rect.height}px`;
                overlay.style.top = `${rect.top}px`;
                overlay.style.left = `${rect.left}px`;
                overlay.id = 'page-overlay';
                document.body.appendChild(overlay);


                const tl = gsap.timeline();
                tl.to(overlay, {
                    top: 0,
                    left: 0,
                    width: window.innerWidth,
                    height: window.innerHeight,
                    duration: 0.6,
                    ease: 'power1.inOut',
                });

                tl.to({}, { duration: 0.2 });

                tl.to(projectRow.querySelectorAll('td'), {
                    opacity: 0,
                    duration: 0.5,
                    ease: 'power1.inOut',
                });

                await tl;

                current.container.style.display = 'none';
                projectRow.classList.remove('active');
            },

            async enter({ next }) {
                window.scrollTo(0, 0);
                const overlay = document.getElementById('page-overlay');
                if (!overlay) return;

                await gsap.to(overlay, {
                    top: '-100%',
                    duration: 0.6,
                    ease: 'power1.inOut',
                    onComplete: () => overlay.remove()
                });

                initProgressBar();
                bindProjectEvents();
            }
        },
        {
            name: 'back-to-home',

            from: { namespace: 'projects-show' },
            to: { namespace: 'home' },

            async leave({ current }) {
                const overlay = document.createElement('div');

                overlay.className = 'w-screen h-screen fixed z-[110] left-0 bg-secondary-500';
                overlay.style.top = '100%';
                overlay.id = 'page-overlay';

                document.body.appendChild(overlay);

                await gsap.to(overlay, {
                    top: '0%',
                    duration: 0.6,
                    ease: 'power1.inOut',
                });

                current.container.style.display = 'none';
            },

            async enter() {
                window.scrollTo({
                    top: document.getElementById('projects').offsetTop,
                    behavior: 'instant'
                });
                initProgressBar();
                const overlay = document.getElementById('page-overlay');
                if (!overlay) return;

                await gsap.to(overlay, {
                    top: '-100%',
                    duration: 0.6,
                    ease: 'power1.inOut',
                    onComplete: () => overlay.remove()
                });

                bindProjectEvents();
            }
        },
        {
            name: 'project-to-project',
            from: { namespace: 'projects-show' },
            to: { namespace: 'projects-show' },

            async leave({current}) {
                const overlay = document.createElement('div');

                overlay.className = 'w-screen h-screen fixed z-[110] left-0 bg-secondary-500';
                overlay.style.top = '100%';
                overlay.id = 'page-overlay';

                document.body.appendChild(overlay);

                await gsap.to(overlay, {
                    top: '0%',
                    duration: 0.6,
                    ease: 'power1.inOut',
                });

                current.container.style.display = 'none';
            },

            async enter() {
                initProgressBar();
                const overlay = document.getElementById('page-overlay');
                if (!overlay) return;

                await gsap.to(overlay, {
                    top: '-100%',
                    duration: 0.6,
                    ease: 'power1.inOut',
                    onComplete: () => overlay.remove()
                });

                bindProjectEvents();
            }
        }
    ]
});
