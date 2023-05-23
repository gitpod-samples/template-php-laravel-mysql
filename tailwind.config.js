const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
const plugin = require("tailwindcss/plugin");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                lio: {
                    100: "#e6f6f3",
                    200: "#a3ecde",
                    300: "#6ee2cc",
                    400: "#43d4b8",
                    500: "#18bc9c",
                    600: "#14a88b",
                    700: "#0e8b73",
                    800: "#0a6553",
                    900: "#053c31",
                },
                primary: {
                    DEFAULT: "#00040f",
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                },
                secondary: "#00f6ff",
                danger: colors.red,
                success: colors.green,
                warning: colors.amber,
                laracasts: {
                    DEFAULT: "rgb(22 68 173)",
                    light: "rgb(50 139 242)",
                },
                frameworks: {
                    DEFAULT: "rgb(236 69 79)",
                    light: "rgb(110 220 196)",
                },

                testing: {
                    DEFAULT: "rgb(26 171 139)",
                    light: "rgb(110 220 196)",
                },
                techniques: {
                    DEFAULT: "rgb(99 123 255)",
                    light: "rgb(33 200 246)",
                },
                tooling: {
                    DEFAULT: "rgb(139 96 237)",
                    light: "rgb(179 114 189)",
                },
                languages: {
                    DEFAULT: "rgb(241 154 26)",
                    light: "rgb(255 199 60)",
                },
                blue: {
                    DEFAULT: "rgb(50 138 241)",
                    light: "rgb(33 200 246)",
                    dark: "rgb(39 121 189)",
                    darker: "rgb(57 81 119)",
                    darkest: "rgb(24 35 52)",
                    900: "rgb(13 19 29)",
                    1000: "rgb(18 35 58)",
                },
                orange: {
                    dark: "rgb(222 117 31)",
                },
                yellow: {
                    dark: "rgb(245 166 35)",
                    darker: "rgb(104 79 29)",
                },
                grey: {
                    DEFAULT: "rgb(204 204 204)",
                    600: "rgb(186 217 252)",
                    800: "rgb(120 144 156)",
                    900: "rgb(34 34 34)",
                },
                red: {
                    DEFAULT: "rgb(227 52 47)",
                    dark: "rgb(204 31 26)",
                    light: "rgb(240 149 161)",
                },
                deep: { black: "rgb(0 0 0)" },
                teal: { light: "rgb(100 213 202)" },
                indigo: { light: "rgb(120 134 215)" },
                purple: { light: "rgb(167 121 233)" },
                green: {
                    DEFAULT: "rgb(146 208 72)",
                },
                dimWhite: "rgba(255, 255, 255, 0.7)",
                dimBlue: "rgba(9, 151, 124, 0.1)",
                panel: {
                    500: "rgb(37 65 106)",
                    600: "rgb(32 55 89)",
                    700: "rgb(24 45 75)",
                    800: "rgb(22 39 63)",
                },
            },
            fontFamily: {
                sans: ["DM Sans", ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                "3xs": ".6rem",
                "2xs": ".6666rem",
                xs: ".8rem",
                sm: ".867rem",
                md: ".934rem",
                base: "1rem",
                lg: "1.0666rem",
                "2lg": "1.134rem",
                "3lg": "1.2rem",
                xl: "1.33333rem",
                "2xl": "1.7rem",
                "3xl": "2.2rem",
                "4xl": "2.4rem",
                "5xl": "2.6666rem",
                "6xl": "3.333rem",
            },
            fontWeight: {
                black: "900",
            },
            lineHeight: {
                tighter: "1.15",
                max: "2",
                off: "0",
            },
            opacity: {
                1: "0.01",
                3: "0.03",
                4: "0.04",
                7: "0.07",
                13: "0.13",
                85: "0.85",
            },
            screens: {
                mobile: {
                    max: "768px",
                },
                phone: {
                    max: "736px",
                },
                lg: {
                    min: "992px",
                },
                xl: {
                    min: "1200px",
                },
                "2xl": {
                    min: "1350px",
                },
                widescreen: {
                    min: "1500px",
                },
                hxs: "480px",
                hss: "620px",
                hsm: "768px",
                hmd: "1060px",
                hlg: "1200px",
                hxl: "1700px",
            },

            boxShadow: {
                DEFAULT: "0 5px 11px rgba(36, 37, 38, .08)",
                md: "4px 4px 15px 0 rgba(36, 37, 38, .08)",
                lg: "0 15px 30px 0 rgba(0, 0, 0, .11), 0 5px 15px 0 rgba(0, 0, 0, .08)",
                inner: "inset 0 2px 4px 0 rgba(0, 0, 0, .06)",
            },
            zIndex: {
                100: "100",
                5:"5",
                4:"4",
                3: "3",
                2:"2",
                1:"1",
                "-1": "-1",
            },
            flexGrow: {
                5: "5",
            },
            maxHeight: {
                "screen-menu": "calc(100vh - 3.5rem)",
                modal: "calc(100vh - 160px)",
            },
            transitionProperty: {
                position: "right, left, top, bottom, margin, padding",
                textColor: "color",
            },
            keyframes: {
                "fade-out": {
                    from: {
                        opacity: 1,
                    },
                    to: {
                        opacity: 0,
                    },
                },
                "fade-in": {
                    from: {
                        opacity: 0,
                    },
                    to: {
                        opacity: 1,
                    },
                },
            },
            animation: {
                "fade-out": "fade-out 250ms ease-in-out",
                "fade-in": "fade-in 250ms ease-in-out",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        plugin(function ({ matchUtilities, theme }) {
            matchUtilities(
                {
                    "aside-scrollbars": (value) => {
                        const track = value === "light" ? "100" : "900";
                        const thumb = value === "light" ? "300" : "600";
                        const color = value === "light" ? "gray" : value;

                        return {
                            scrollbarWidth: "thin",
                            scrollbarColor: `${theme(
                                `colors.${color}.${thumb}`
                            )} ${theme(`colors.${color}.${track}`)}`,
                            "&::-webkit-scrollbar": {
                                width: "8px",
                                height: "8px",
                            },
                            "&::-webkit-scrollbar-track": {
                                backgroundColor: theme(
                                    `colors.${color}.${track}`
                                ),
                            },
                            "&::-webkit-scrollbar-thumb": {
                                borderRadius: "0.25rem",
                                backgroundColor: theme(
                                    `colors.${color}.${thumb}`
                                ),
                            },
                        };
                    },
                },
                {
                    values: theme("asideScrollbars"),
                }
            );
        }),
        // require("@tailwindcss/typography"),
        require("@tailwindcss/line-clamp"),
    ],
};
