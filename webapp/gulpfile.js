var gulp = require("gulp");
var browserify = require("browserify");
var reactify = require("reactify");
var source = require("vinyl-source-stream");

const config = {
  styles_src: "app/style.css",
  html_src: "app/index.html",
  destination_folder: "build",
  jsx_src: ["*.js", "app/**/*.js", "app/**/*.jsx"]
}
gulp.task("bundle", function () {
    return browserify({
        entries: "./app/main.jsx",
        debug: true
    }).transform(reactify)
        .bundle()
        .pipe(source("main.js"))
        .pipe(gulp.dest("build"))
});

gulp.task("copy", ["bundle"], function () {
    return gulp.src([config.html_src, config.styles_src])
        .pipe(gulp.dest(config.destination_folder));
});

gulp.task("watch", function() {
  gulp.watch(config.styles_src, ["copy"]);
  gulp.watch(config.jsx_src, ["bundle"]);
});

gulp.task("default",["copy"],function(){
   console.log("Gulp completed...");
});

gulp.task("development", ["copy", "watch"])
