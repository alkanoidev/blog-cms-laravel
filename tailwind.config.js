/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "media",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                dark: "#121212",
                "on-dark": "#e2e2e5",
                "off-dark": "#2a2a2a",

                light: "#fcfcff",
                "on-light": "#1a1c1e",
                "off-light": "#bebebe",

                primary: { dark: "#94ccff", light: "#006399" },
                "on-primary": { dark: "#003352", light: "#ffffff" },
                "primary-container": {
                    dark: "#004b74",
                    light: "#cde5ff",
                    "hover-light": "#b0cee0",
                    "hover-dark": "#b0cee0",
                },
                "on-primary-container": { dark: "#cde5ff", light: "#001d32" },

                "deep-sky": "#041621",
                "deep-sky-light": "#cde5ff",

                secondary: { dark: "#6adbae", light: "#006c4e" },
                "on-secondary": "#003827",
                "secondary-container": {
                    dark: "#00513a",
                    light: "#87f8c9",
                },
                "on-secondary-container": {
                    dark: "#87f8c9",
                    light: "#002115",
                },

                surface: { dark: "#1a1c1e", light: "#E8EFF4" },
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
