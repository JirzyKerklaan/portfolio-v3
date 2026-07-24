const achievements = {
    navigator: {
        title: "Navigator",
        description: "Explored the complete homepage",
        icon: "navigator",

        progress: (state) => ({
            current: state.sectionsVisited.length,
            required: 5
        }),

        completed: (state) =>
            state.sectionsVisited.length >= 5
    },

    builder: {
        title: "Builder",
        description: "Viewed 3 projects",
        icon: "builder",

        progress: (state) => ({
            current: state.projectsViewed.length,
            required: 3
        }),

        completed: (state) =>
            state.projectsViewed.length >= 3
    },

    deepDive: {
        title: "Deep Dive",
        description: "Opened all project case studies",
        icon: "deep-dive",

        progress: (state) => ({
            current: state.projectsViewed.length,
            required: 4
        }),

        completed: (state) =>
            state.projectsViewed.length >= 4
    },

    fullExplorer: {
        title: "100% Explorer",
        description: "Explored the full website",
        icon: "full-explorer",

        progress: (state) => ({
            current: state.unlocked.length,
            required: Object.keys(achievements).length - 1
        }),

        completed: (state) =>
            Object.keys(achievements)
                .filter(id => id !== "fullExplorer")
                .every(id => state.unlocked.includes(id))
    }
};

export default achievements;
