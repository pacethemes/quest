'use strict';
module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        // watch for changes and trigger compass, jshint, uglify and livereload
        watch: {
            options: {
                livereload: true,
            },
            compass: {
                files: ['assets/scss/**/*.{scss,sass}'],
                tasks: ['compass']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify']
            },
            livereload: {
                files: ['*.html', '*.php', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }
        },

        // compass and scss
        compass: {
            dist: {
                options: {
                    config: 'config.rb',
                    force: true
                }
            }
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'assets/js/source/**/*.js'
            ]
        },

        concat: {
            dist: {
                src: [
                    'assets/plugins/modernizr/modernizr.custom.js',
                    'assets/plugins/bootstrap/js/bootstrap.js',
                    'assets/plugins/smoothscroll/SmoothScroll.js',
                    'assets/plugins/wow/wow.js',
                    'assets/plugins/FullscreenSlitSlider/js/jquery.ba-cond.js',
                    'assets/plugins/FullscreenSlitSlider/js/jquery.slitslider.js',
                    'assets/plugins/colorbox/jquery.colorbox.js',
                    'assets/plugins/imagesloaded/imagesloaded.pkgd.js',
                    'assets/plugins/smartmenus/jquery.smartmenus.js',
                    'assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.js',
                    'assets/plugins/smartmenus/addons/keyboard/jquery.smartmenus.keyboard.js',
                    'assets/js/quest.js'
                ],
                dest: 'assets/js/quest-all.js'
            }
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            dist: {
                options: {
                    sourceMap: 'assets/js/map/quest-all.js',
                    preserveComments: 'some'
                },
                files: {
                    'assets/js/quest-all.min.js': ['assets/js/quest-all.js']
                }
            }
        },

        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true
                },
                files: [{
                    expand: true,
                    cwd: 'assets/images/',
                    src: '**/*',
                    dest: 'assets/images/'
                }]
            }
        },

        // deploy via rsync
        deploy: {
            staging: {
                src: "./",
                dest: "~/path/to/theme",
                host: "user@host.com",
                recursive: true,
                syncDest: true,
                exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'config.rb', '.jshintrc']
            },
            production: {
                src: "./",
                dest: "~/path/to/theme",
                host: "user@host.com",
                recursive: true,
                syncDest: true,
                exclude: '<%= rsync.staging.exclude %>'
            }
        }

    });

    // rename tasks
    // grunt.renameTask('rsync', 'deploy');

    // register task
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('default', ['concat']);
    grunt.registerTask('assets', ['concat', 'uglify']);

};
