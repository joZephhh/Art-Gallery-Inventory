    // dependecies
var       gulp = require("gulp"),

            // utility dependecies
            gulp_sourcemaps = require("gulp-sourcemaps"),
            gulp_notify = require("gulp-notify"),
            gulp_rename = require("gulp-rename"),
            gulp_plumber = require("gulp-plumber"),
            gulp_clean = require('gulp-clean'),

            // CSS
            gulp_sass  = require('gulp-sass'),
            gulp_autoprefixer  = require('gulp-autoprefixer'),
            gulp_cssnano  = require('gulp-cssnano'),

            // JS
            gulp_concat = require("gulp-concat"),
            gulp_uglify = require('gulp-uglify'),

            //Images
            gulp_imagemin = require('gulp-imagemin');


// paths
var config = {
    src : "../src/",
    dist_assets:"../assets/"
}

// running comand line : gulp
gulp.task('default', ['watch']);


// scss -> css -> minifies and rename it
gulp.task("css", function() {
    return gulp.src(config.src+"scss/main.scss")
        .pipe(gulp_plumber({
            errorHandler: gulp_notify.onError('SASS Error: <%= error.message %>')
        }))
        .pipe(gulp_sourcemaps.init())
        .pipe(gulp_sass().on('error', gulp_sass.logError))
        .pipe(gulp_autoprefixer({
                 browsers:['last 2 versions']
        }))
        .pipe(gulp_cssnano())
        .pipe(gulp_sourcemaps.write())
        .pipe(gulp_rename('main.min.css'))
        .pipe(gulp.dest(config.dist_assets+"css"))
        .pipe(gulp_notify('SASS compiled: <%= file.relative %>'))
});

// concat files and uglifies them
gulp.task("js", function() {
    return gulp.src([config.src+"js/momentjs.js",config.src+"js/main.js"])
        .pipe(gulp_sourcemaps.init())
        .pipe(gulp_plumber({
            errorHandler: gulp_notify.onError('JS Error: <%= error.message %>')
        }))
        .pipe(gulp_uglify())
        .pipe(gulp_concat("main.min.js"))
        .pipe(gulp_sourcemaps.write())
        .pipe(gulp.dest(config.dist_assets+"js"))

})

// clean img folder each gulp boot to avoid to save depreciates images
gulp.task("clean_img_folder", function() {
    return gulp.src(config.dist_assets+'img/', {read: false})
        .pipe(gulp_clean({force:true}))
})

// minifies images
gulp.task("img", ["clean_img_folder"], function() {
    gulp.src(config.src+'img/**')
         .pipe(gulp_imagemin())
         .pipe(gulp.dest(config.dist_assets+'img'));
})


// watch files changes and launch relatives tasks
gulp.task("watch", ["css", "js", "img"], function() {
    gulp.watch(config.src+"scss/**/**/*.scss", ["css"]);
    gulp.watch(config.src+"js/main.js", ["js"]);
})
