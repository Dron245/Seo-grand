import gulp from 'gulp';
import plumber from 'gulp-plumber';
import sass from 'gulp-dart-sass';
import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import csso from 'postcss-csso';
import rename from 'gulp-rename';
import htmlmin from 'gulp-htmlmin';
import terser from 'gulp-terser';
// import squoosh from 'gulp-libsquoosh';
import svgo from 'gulp-svgmin';
import svgstore from 'gulp-svgstore';
import del from 'del';
import browser from 'browser-sync';
import concat from 'gulp-concat';
import imagemin from 'gulp-imagemin';
import webp from 'gulp-webp';
import ttf2woff from 'gulp-ttf2woff';
import ttf2woff2 from 'gulp-ttf2woff2';

export const fonts = () => {
	return gulp
		.src('source/fonts/*.ttf')
		.pipe(ttf2woff())
		.pipe(gulp.dest('build/fonts'))
		.pipe(gulp.src('source/fonts/*.ttf'))
		.pipe(ttf2woff2())
		.pipe(gulp.dest('build/fonts'));
};

// Styles

export const styles = () => {
	return gulp
		.src('source/sass/style.scss', { sourcemaps: true })
		.pipe(plumber())
		.pipe(
			sass({
				quietDeps: true,
				logger: {
					warn: () => {}, // отключаем все warnings
				},
			}).on('error', sass.logError)
		)
		.pipe(postcss([autoprefixer(), csso()]))
		.pipe(postcss([autoprefixer(), csso()]))
		.pipe(rename('style.min.css'))
		.pipe(gulp.dest('build/css', { sourcemaps: '.' }))
		.pipe(browser.stream());
};

export const cssStyles = () => {
	return gulp
		.src('source/css/*.css')
		.pipe(postcss([csso()]))
		.pipe(gulp.dest('build/css'));
};

// HTML

const html = () => {
	return (
		gulp
			.src('source/*.html')
			//.pipe(htmlmin({ collapseWhitespace: true }))
			.pipe(gulp.dest('build'))
	);
};

// Scripts

const scripts = () => {
	return (
		gulp
			.src([
				'source/js/vendor/jquery-3.7.1.min.js',
				'source/js/vendor/swiper.js',
				'source/js/vendor/jquery.fancybox.min.js',
				'source/js/*.js',
			])
			.pipe(concat('main.min.js'))
			//.pipe(terser())
			.pipe(gulp.dest('build/js'))
	);
	//   .pipe(browser.stream());
};

const optimizeImages = () => {
	return gulp
		.src('source/img/**/*.{png,jpg}')
		.pipe(imagemin())
		.pipe(gulp.dest('build/img'));
};

const copyImages = () => {
	return gulp.src('source/img/**/*.{png,jpg}').pipe(gulp.dest('build/img'));
};

const createWebp = () => {
	return gulp
		.src(['source/img/**/*.{png,jpg}', '!source/img/favicons/*.png'])
		.pipe(webp())
		.pipe(gulp.dest('build/img'));
};

// SVG

const svg = () =>
	gulp
		.src(['source/img/**/*.svg', '!source/img/icons/*.svg'])
		.pipe(svgo())
		.pipe(gulp.dest('build/img'));

const sprite = () => {
	return (
		gulp
			.src('source/img/icons/*.svg')
			//.pipe(svgo())
			.pipe(
				svgstore({
					inlineSvg: true,
				})
			)
			.pipe(rename('sprite.svg'))
			.pipe(gulp.dest('build/img'))
	);
};

// Copy

const copy = (done) => {
	gulp
		.src(
			[
				'source/fonts/**/*.{woff,woff2}',
				'source/*.ico',
				'source/img/favicons/*.png',
			],
			{
				base: 'source',
			}
		)
		.pipe(gulp.dest('build'));
	done();
};

// Clean

export const clean = () => {
	return del('build');
};

// Server

const server = (done) => {
	browser.init({
		server: {
			baseDir: 'build',
			index: 'reviews.html',
		},
		// host: '192.168.0.59',
		// host: '10.52.47.10',
		port: 3000,
		cors: true,
		notify: false,
		ui: false,
	});
	done();
};

// Reload

const reload = (done) => {
	browser.reload();
	done();
};

// Watcher

const watcher = () => {
	gulp.watch('source/sass/**/*.scss', gulp.series(styles, reload));
	gulp.watch('source/js/script.js', gulp.series(scripts, reload));
	gulp.watch('source/*.html', gulp.series(html, reload));
};

// Build

export const build = gulp.series(
	clean,
	copy,
	optimizeImages,
	gulp.parallel(styles, cssStyles, html, scripts, svg, sprite, createWebp)
);

// Default

export default gulp.series(
	clean,
	copy,
	copyImages,
	gulp.parallel(
		fonts,
		styles,
		cssStyles,
		html,
		scripts,
		svg,
		sprite,
		createWebp
	),
	gulp.series(server, watcher)
);
