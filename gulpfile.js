const {gulp, src, dest, watch} = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const browserSync = require('browser-sync')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const cleanCSS = require('gulp-clean-css')
const rename = require("gulp-rename")
const plumber = require('gulp-plumber');
const gulpIf = require('gulp-if');
const webpack = require('webpack-stream');
const TerserPlugin = require('terser-webpack-plugin');

require('dotenv').config()

// setting NODE_ENV: development or production
const isDev = (process.env.NODE_ENV === 'development');

// Biến đại diện cho tên plugin và theme
const pluginNameEFA = 'essential-features-addon';
const themeName = 'everygolf';

// Đường dẫn file
const paths = {
    node_modules: 'node_modules/',
    theme: {
        scss: 'src/theme/scss/',
        js: 'src/theme/js/',
        libs: 'src/theme/libs/',
    },
    plugins: {
        root: 'src/plugins/',
        efa: {
            scss: `src/plugins/${pluginNameEFA}/scss/`,
            js: `src/plugins/${pluginNameEFA}/js/`
        }
    },
    shared: {
        scss: 'src/shared/scss/',
        vendors: 'src/shared/scss/vendors/',
    },
    output: {
        theme: {
            root: `themes/${themeName}/assets/`,
            css: `themes/${themeName}/assets/css/`,
            js: `themes/${themeName}/assets/js/`,
            libs: `themes/${themeName}/assets/libs/`,
        },
    }
};

// server
// tạo file .env với biến PROXY="localhost/blank-wp". Có thể thay đổi giá trị này.
const proxy = process.env.PROXY || "localhost/everygolf";

function server() {
    browserSync.init({
        proxy: proxy,
        open: false,
        cors: true,
        ghostMode: false
    })
}

// Task build theme
// css
function buildStyleTheme() {
    return src([
        `${paths.theme.libs}fancyBox/fancybox.css`,
        `${paths.theme.libs}swiper/swiper.min.css`,
        `${paths.theme.scss}main.scss`
    ])
        .pipe(plumber({
            errorHandler: function (err) {
                console.error('SCSS Style Theme Error:', err.message);
                this.emit('end');
            }
        }))
        .pipe(gulpIf(isDev, sourcemaps.init()))
        .pipe(sass({
            outputStyle: 'expanded',
            includePaths: ['node_modules']
        }, '').on('error', sass.logError))
        .pipe(concat('bundle.css'))

        // --- Xuất file chưa min ---
        .pipe(dest(`${paths.output.theme.css}`))

        // --- Tạo bản minified ---
        .pipe(cleanCSS({level: 2}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulpIf(isDev, sourcemaps.write()))
        .pipe(dest(`${paths.output.theme.css}`))
        .pipe(browserSync.stream())
}
exports.buildStyleTheme = buildStyleTheme

// style page templates
function buildStylePageTemplate() {
    return src(`${paths.theme.scss}page-templates/*.scss`)
        .pipe(plumber({
            errorHandler: function (err) {
                console.error(err.message);
                this.emit('end');
            }
        }))
        .pipe(gulpIf(isDev, sourcemaps.init()))
        .pipe(sass({
            outputStyle: 'expanded'
        }, '').on('error', sass.logError))
        .pipe(cleanCSS({
            level: 2
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulpIf(isDev, sourcemaps.write()))
        .pipe(dest(`${paths.output.theme.css}page-templates/`))
        .pipe(browserSync.stream())
}

// build scripts
function buildScripts() {
    return src([
        `${paths.theme.libs}fancyBox/fancybox.umd.js`,
        `${paths.theme.libs}greensock/GSAP.min.js`,
        `${paths.theme.libs}greensock/ScrollTrigger.min.js`,
        `${paths.theme.libs}greensock/SplitText.min.js`,
        `${paths.theme.libs}greensock/TextPlugin.min.js`,
        `${paths.theme.libs}headroom/headroom.js`,
        `${paths.theme.libs}lenis/lenis.min.js`,
        `${paths.theme.libs}mouse-follower/mouse-follower.min.js`,
        `${paths.theme.libs}swiper/swiper.min.js`,
        `${paths.theme.libs}wow/wow.min.js`,
        `${paths.theme.js}functions.js`
    ])
        .pipe(concat('bundle.min.js')) // Nối tất cả lại thành một file tên là bundle.min.js
        .pipe(uglify()) // Nén file (nếu dùng terser thì là .pipe(terser()))
        .pipe(dest(`${paths.output.theme.js}`)); // Lưu file đã nối và nén vào thư mục dist/js
}
exports.buildScripts = buildScripts

// Task build all
async function buildAll() {
    // theme
    await buildStyleTheme()
    await buildStylePageTemplate()

    await buildScripts()
}
exports.buildAll = buildAll

// Task watch
function watchTask() {
    server()

    // theme watch
    watch([
        `!${paths.theme.scss}page-templates/*.scss`,
        `!${paths.theme.scss}elementor-addons/*.scss`,
        `${paths.theme.scss}**/*.scss`,
        `${paths.theme.scss}main.scss`
    ], buildStyleTheme)

    watch([
        `${paths.theme.scss}page-templates/*.scss`
    ], buildStylePageTemplate)

    watch([
        `${paths.theme.js}*.js`,
        `${paths.theme.libs}**/*.js`
    ], buildScripts)
}
exports.watchTask = watchTask