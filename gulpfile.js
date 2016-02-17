var elixir = require('laravel-elixir');

var bowerDirJquery = "vendor/bower_components/jquery/dist/";
var bowerDirBootstrap = "vendor/bower_components/bootstrap-sass/assets/";
var bowerDirFontAwesome = "vendor/bower_components/font-awesome/";

var bowerDirDatatables = "vendor/bower_components/datatables/";
var bowerDirDatatablesPlugins = "vendor/bower_components/datatables-plugins/integration/";

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

        .copy(bowerDirDatatables + 'media/js/jquery.dataTables.js', 'resources/assets/js/jquery.dataTables.js')
        .copy(bowerDirDatatablesPlugins + 'bootstrap/3/dataTables.bootstrap.css', 'resources/assets/sass/datatablesPlugins/dataTables.bootstrap.scss')
        .copy(bowerDirDatatablesPlugins + 'bootstrap/3/dataTables.bootstrap.js', 'resources/assets/js/dataTables.bootstrap.js')
    mix.scripts([
            'js/jquery.js',
            'js/bootstrap.js',
            'js/jquery.dataTables.js',
            'js/dataTables.bootstrap.js'
        ],
        'public/js/admin_musicshop.js',
        'resources/assets'
    );
});
