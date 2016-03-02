var gulp = require('gulp'),
    cripweb = require('cripweb');

cripweb.sass(
    'resources/assets/sass/app.scss',
    'resources/assets/sass/**/*.sass',
    'sass',
    false,
    'public/assets/css');

cripweb.scripts([
        '/jquery/dist/jquery.js',
        '/bootstrap-sass/assets/javascripts/bootstrap.js'
    ],
    'core',
    'scripts-core',
    'bower_components',
    'public/assets/js');

cripweb.scripts([
        '/app.js'
    ],
    'app',
    'scripts-app',
    'resources/assets/js',
    'public/assets/js');

cripweb.copy('bower_components/tinymce/**/*', 'public/tinymce', 'copy-tinymce');
cripweb.copy('public/vendor/crip/filemanager/js/tinymce/**/*', 'public/tinymce', 'copy-vendor-tinymce');
cripweb.copy('resources/lang/vendor/tinymce/**/*', 'public/tinymce/langs', 'copy-langs-tinymce');

gulp.task('default', function(){
    cripweb.gulp.start('crip-default');
    cripweb.watch();
});