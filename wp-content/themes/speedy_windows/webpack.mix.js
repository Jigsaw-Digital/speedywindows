const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.postCss(
  "./css/theme-style.css",
  "./style.css",
  tailwindcss("./tailwind.config.js")
);
