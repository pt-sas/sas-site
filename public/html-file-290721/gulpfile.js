var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var concat = require('gulp-concat');

var config = {
    fontawesomeDir: './bower_components/font-awesome',
    publicDir: './assets',
};

// Task for compile css
gulp.task('css', function() {
    return gulp.src('sass/app.scss')
    .pipe(sass({
        includePaths: [config.fontawesomeDir + '/scss'],
        includePaths: [config.datepickerDir + '/src/sass'],
        includePaths: [config.hoverDir + '/scss'],
        outputStyle: 'compressed'
    }))
    .pipe(gulp.dest(config.publicDir + '/css'));
});

// Task for compile js
gulp.task('scripts', async function(){
  	gulp.src([
            './bower_components/jquery/dist/jquery.min.js',
            './assets/js/popper.min.js',
            './assets/js/bootstrap.min.js',
            './bower_components/slick-carousel/slick/slick.min.js',
  		])
	    .pipe(concat('main.min.js'))
	    .pipe(uglify())
	    .pipe(gulp.dest('./assets/js'))
});

// Task for including boostrap fonts
gulp.task('fontsBootstrap', function() {
    return gulp.src(config.bootstrapDir + '/assets/fonts/**/*')
    .pipe(gulp.dest(config.publicDir + '/fonts'));
});

// Task for including fontawesome
gulp.task('fontsAwesome', function() {
    return gulp.src(config.fontawesomeDir + '/fonts/*')
    .pipe(gulp.dest(config.publicDir + '/fonts'));
});

gulp.task('default', gulp.series('css', 'scripts', 'fontsBootstrap', 'fontsAwesome'));