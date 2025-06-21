var gulp = require('gulp'),
	imagemin = require('gulp-imagemin'),
	pngquant = require('imagemin-pngquant'),
    optipng = require('imagemin-optipng'),
	jpegtran = require('imagemin-jpegtran'),
	jpegoptim = require('imagemin-jpegoptim'),
	gifsicle = require('imagemin-gifsicle'),
    concatCSS = require('gulp-concat-css'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    gulpif = require('gulp-if'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    minifyCss = require('gulp-minify-css'),
    less = require('gulp-less'),
    path = require('path');
;

//Сжатие картинок 
gulp.task('optimize-images', function () {
    return gulp.src(['assets/app/images/**/*.jpg', 'assets/app/images/**/*.jpeg', 'assets/app/images/**/*.gif', 'assets/app/images/**/*.png'])
        .pipe(imagemin({
            progressive: true,
            use: [
                    optipng({
                        optimizationLevel: 4
                    }), 
                    jpegoptim({
                        progressive: true,
                        max: 80
                    }), 
                    gifsicle()
                ]
        }))
        .pipe(gulp.dest('assets/app/images/optimized'));
});

//Сжатие css
gulp.task('css', function() {
    return gulp.src(['assets/templates/res/dup/css/*.css', 'assets/templates/res/all/css/*.css'])
        .pipe(concatCSS('bundle.css'))
        .pipe(minifyCss())
        .pipe(autoprefixer())
        .pipe(rename ('bundle.min.css'))
        .pipe(gulp.dest('assets/templates/dist'));
});

//Сжатие js
gulp.task('js', function() {
    return gulp.src(['assets/templates/res/all/js/*.js', 'assets/templates/res/dup/js/*.js'])
        .pipe(uglify())
        .pipe(concat('bundle.all.js'))
        .pipe(gulp.dest('assets/templates/dist'));
});


//less
gulp.task('less', function () {
  return gulp.src('assets/app/less/bootstrap/less/**/*.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('assets/app/'));
});

gulp.task('build', ['clean', 'css', 'js']);