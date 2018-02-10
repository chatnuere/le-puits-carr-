// Requis
var gulp = require('gulp');
// Include plugins
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var plugins = require('gulp-load-plugins')(
); // tous les plugins de package.json

// Variables de chemins
var source = './'; // dossier de travail
var destination = source; // dossier à livrer


gulp.task('css', function() {
  gulp.src(source + 'scss/main.scss')
    .pipe(plugins.sass().on('error', plugins.sass.logError))
    .pipe(plugins.csscomb())
    .pipe(plugins.cssbeautify({indent: '  '}))
    .pipe(plugins.autoprefixer())
    .pipe(plugins.csso())
    .pipe(plugins.rename({
      basename: 'style'
    }))
    .pipe(gulp.dest('../'));
});


// Tâche "scripts" = concaténation de tous les scripts en un fichier dans un ordre précis
gulp.task('scripts', function() {
  return gulp.src([
    destination + '/scripts/lib/TweenMax-1.20.2.min.js',
    destination + '/scripts/lib/ScrollMagic.min.js',
    destination + '/scripts/lib/jquery.ScrollMagic.min.js',
    destination + '/scripts/lib/jquery.gsap.min.js',
    destination + '/scripts/lib/ScrollMagic.gsap.js',
    destination + '/scripts/lib/jquery.film_roll.min.js',
    destination + '/scripts/lib/jquery.magnific-popup.min.js',
    destination + '/scripts/services/**/*.js',
    destination + '/scripts/main.js'
  ])
    .pipe(concat('all.js'))
    .pipe(uglify())
    .pipe(plugins.rename({
      suffix: '.min',
      basename: 'theme'
    }))
    .pipe(gulp.dest('../js'));
});

gulp.task('serve', function() {
  gulp.watch(source + 'scss/**/*.scss', ['css']);

  gulp.watch(source + 'scripts/**/*.js', ['scripts']);
});

// Tâche par défaut qui s'éxécute avec un simple 'gulp' dans la console
gulp.task('default', ['serve']);
