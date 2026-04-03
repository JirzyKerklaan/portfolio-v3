const gallery = document.querySelector('.project-view-gallery');

if(gallery) {
    gallery.addEventListener('mousemove', e => {
        const rect = gallery.getBoundingClientRect();
        const xPercent = (e.clientX - rect.left) / rect.width;
        const yPercent = (e.clientY - rect.top) / rect.height;
        const offsetX = (xPercent - 0.5) * 20;
        const offsetY = (yPercent - 0.5) * 35;
        gallery.style.backgroundPosition =
            `calc(50% + ${offsetX}px) calc(50% + ${offsetY}px)`;
    });
}
