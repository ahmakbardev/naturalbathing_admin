//webpack.mix.js
const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .sourceMaps()
    .postCss("resources/css/app.css", "public/assets/styles/css", [require("tailwindcss")]);

mix.css("resources/css/components/nav.css", "public/assets/styles/css/app.css").options({
    autoprefixer: { remove: false },
});
mix.css("resources/css/components/collapse.css", "public/assets/styles/css/app.css").options({
    autoprefixer: { remove: false },
});
mix.css("resources/css/components/dropdown.css", "public/assets/styles/css/app.css").options({
    autoprefixer: { remove: false },
});
mix.css("resources/css/components/navbar.css", "public/assets/styles/css/app.css").options({
    autoprefixer: { remove: false },
});
mix.css("resources/css/components/prism.css", "public/assets/styles/css/app.css").options({
    autoprefixer: { remove: false },
});
mix.css("resources/css/components/offcanvas.css", "public/assets/styles/css/app.css").options({
    autoprefixer: { remove: false },
});
mix.css("resources/css/components/toast.css", "public/assets/styles/css/app.css").options({
    autoprefixer: { remove: false },
});
mix.css("resources/css/components/tooltips.css", "public/assets/styles/css/app.css").options({
    autoprefixer: { remove: false },
});
