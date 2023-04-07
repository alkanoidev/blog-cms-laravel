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
                light: "#fff",
                dark: "#121212",
                primary: {
                    light: "#E8EFF4",
                    "light-surface": "#C5E0F3",
                },
                on: {
                    primary: {
                        light: "#164565",
                    },
                },
            },
            gridTemplateColumns: {
                auto: "repeat(auto-fit, minmax(200px, 1fr));",
            },
        },
    },
    plugins: [],
};
