/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/**/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                black: "#1e293b",
                primary: "#3b82f6",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
