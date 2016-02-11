var elixir = require('laravel-elixir');

var bowerDirJquery = "vendor/bower_components/jquery/dist/";
var bowerDirBootstrap = "vendor/bower_components/bootstrap-sass/assets/";
var bowerDirFontAwesome = "vendor/bower_components/font-awesome/";

elixir(function(mix) {
    mix.sass('musicshop.scss')
        .copy(bowerDirBootstrap, 'resources/assets/sass/bootstrap')
        .copy(bowerDirBootstrap + 'javascripts/bootstrap.js', 'resources/assets/js/bootstrap.js')
        .copy(bowerDirBootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')
        .copy(bowerDirJquery + 'jquery.js', 'resources/assets/js/jquery.js')
        .copy(bowerDirFontAwesome + 'scss/**', 'resources/assets/sass/fontawesome')
        .copy(bowerDirFontAwesome + 'fonts/**', 'public/fonts/')
    mix.scripts([
        'js/jquery.js',
        'js/bootstrap.js'
    ],
        'public/js/musicshop.js',
        'resources/assets'
    );

    mix.sass('admin_musicshop.scss')
        .copy(bowerDirBootstrap, 'resources/assets/sass/bootstrap')
        .copy(bowerDirBootstrap + 'javascripts/bootstrap.js', 'resources/assets/js/bootstrap.js')
        .copy(bowerDirBootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')
        .copy(bowerDirJquery + 'jquery.js', 'resources/assets/js/jquery.js')
        .copy(bowerDirFontAwesome + 'scss/**', 'resources/assets/sass/fontawesome')
        .copy(bowerDirFontAwesome + 'fonts/**', 'public/fonts/')
    mix.scripts([
            'js/jquery.js',
            'js/bootstrap.js'
        ],
        'public/js/admin_musicshop.js',
        'resources/assets'
    );
});
