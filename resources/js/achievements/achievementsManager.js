import achievements from "./achievements.js";

class AchievementsManager {
    constructor() {
        this.storageKey = 'achievements';

        this.state = this.loadState();
        this.achievements = achievements;

        this.renderAchievements();
    }

    loadState() {
        return JSON.parse(
            localStorage.getItem(this.storageKey)
        ) || {
            sectionsVisited: [],
            projectsViewed: [],
            unlocked: [],
        };
    }

    saveState() {
        localStorage.setItem(
            this.storageKey,
            JSON.stringify(this.state)
        );

        this.checkAchievements();
        this.renderAchievements();
    }

    trackSection(section) {
        if (!this.state.sectionsVisited.includes(section)) {
            this.state.sectionsVisited.push(section);
        }

        this.saveState();
    }

    trackProject(project) {
        if (!this.state.projectsViewed.includes(project)) {
            this.state.projectsViewed.push(project);
        }

        this.saveState();
    }

    checkAchievements() {
        Object.entries(this.achievements).forEach(([id, achievement]) => {
            if (
                achievement.completed(this.state) &&
                !this.state.unlocked.includes(id)
            ) {
                this.unlock(id);
            }
        });
    }

    unlock(id) {
        this.state.unlocked.push(id);
        this.saveState();

        this.showAchievementToast(
            this.achievements[id]
        );
    }

    renderAchievements() {
        const container = document.querySelector('#achievements-progress');
        if (!container) return;

        container.innerHTML = Object.entries(this.achievements)
            .map(([id, achievement]) => {
                let current = achievement.progress(this.state).current;
                const required = achievement.progress(this.state).required;

                if (current > required) { current = required }

                return `
                <div class="achievement">
                    <div class="achievement-inner">
                        <div class="achievement-info">
                            <img src="/achievments/icons/${achievement.icon}.svg" alt="${achievement.title}">
                            <span>
                                <h3>${achievement.title}</h3>
                                <p>${achievement.description}</p>
                            </span>
                        </div>

                        <div class="progress-numbers">
                            <span>${current}</span>
                            /
                            <span>${required}</span>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-bar__inner" style="transform: scaleX(${current / required});"></div>
                    </div>
                </div>
            `;
            })
            .join('');
    }
}

export default new AchievementsManager();
