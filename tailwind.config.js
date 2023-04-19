/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                // primary: {
                //     light: "#E8EFF4",
                //     "light-surface": "#C5E0F3",
                // },
                // on: {
                //     primary: {
                //         light: "#164565",
                //     },
                // },

                dark: "#121212",
                "on-dark": "#e2e2e5",
                "off-dark": "#2a2a2a",

                light: "#fcfcff",
                "on-light": "#1a1c1e",
                "off-light": "#bebebe",

                primary: { dark: "#94ccff", light: "#006399" },
                "on-primary": { dark: "#003352", light: "#ffffff" },
                "primary-container": { dark: "#004b74", light: "#cde5ff" },
                "on-primary-container": { dark: "#cde5ff", light: "#001d32" },

                "deep-sky": "#041621",
                "deep-sky-light": "#cde5ff",

                secondary: { dark: "#6adbae", light: "#006c4e" },
                "on-secondary": "#003827",
                "secondary-container": "#00513a",
                "on-secondary-container": "#87f8c9",

                surface: { dark: "#1a1c1e", light: "#f0f0f4" },
                "on-surface": { dark: "#e2e2e5", light: "#1a1c1e" },

                outline: { dark: "#8c9198", light: "#72787e" },
            },
            gridTemplateColumns: {
                auto: "repeat(auto-fit, minmax(200px, 1fr));",
            },
        },
    },
    plugins: [],
};
