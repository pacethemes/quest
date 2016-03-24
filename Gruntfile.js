'use strict';
module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
    grunt.util.linefeed = '\n';
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        // watch for changes and trigger compass, jshint, uglify and livereload
        watch: {
            options: {
                livereload: true,
            },
            sass: {
                files: ['**/*.scss'],
                tasks: ['sass', 'postcss']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint', 'uglify', 'concat:js' ]
            },
            livereload: {
                files: ['*.html', '*.php', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }
        },

        // sass
        sass: {
            dist: {
                options: { // Target options
                    style: 'expanded',
                    sourcemap: 'none'
                },
                files: {
                    'style.css': 'style.scss',
                    'assets/css/admin.css': 'assets/sass/admin.scss',
                    'inc/pacebuilder/assets/css/style.css': 'inc/pacebuilder/assets/sass/style.scss'
                }
            }
        },

        postcss: {
            options: {
                map: false, // inline sourcemaps

                // or
                // map: {
                //     inline: false, // save all sourcemaps as separate files...
                //     // annotation: 'dist/css/maps/' // ...to the specified directory
                // },

                processors: [
                    require('autoprefixer')({ browsers: 'last 10 versions' }), // add vendor prefixes
                    // require('cssnano')() // minify the result
                ]
            },
            dist: {
                src: '*.css'
            }
        },

        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'assets/js/admin.js',
                'assets/js/quest.js',
                'inc/pacebuilder/assets/js/util.js',
                'inc/pacebuilder/assets/js/models.js',
                'inc/pacebuilder/assets/js/collections.js',
                'inc/pacebuilder/assets/js/views.js',
                'inc/pacebuilder/assets/js/app.js',
                'assets/plugins/smartmenus/jquery.smartmenus.js',
                'assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.js'
            ]
        },

        phplint: {
            options: {
                phpArgs: {
                    // '-lf': null
                }
            },
            all: {
                src: [
                    '*.php',
                    '**/*.php',
                    '!node_modules/**'
                ]
            }
        },

        'phpmd-runner': {
            options: {
                phpmd: '/usr/local/bin/phpmd',
                reportFormat: 'html',
                reportFile: 'md.html',
                rulesets: [
                    'cleancode',
                    'codesize',
                    // 'controversial',
                    'design',
                    'naming',
                    'unusedcode'
                ],
                strict: true
            },
            files: ['**/*.php', '!node_modules/**', '!inc/CMB2/**', '!**/class-tgm-plugin-activation.php']
        },

        concat: {
            js: {
                options: {
                    banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>\n' +
                        ' * Licensed GPLv2+ \n' +
                        ' */\n',
                    process: function(src, filepath) {
                        return '\n// Source: ' + filepath + '\n' + src;
                    },
                },
                src: [
                    'assets/plugins/modernizr/modernizr.custom.js',
                    'assets/plugins/bootstrap/js/bootstrap.min.js',
                    'assets/plugins/smoothscroll/SmoothScroll-min.js',
                    'assets/plugins/wow/wow.min.js',
                    'assets/plugins/FullscreenSlitSlider/js/jquery.ba-cond.min.js',
                    'assets/plugins/FullscreenSlitSlider/js/jquery.slitslider-min.js',
                    'assets/plugins/colorbox/jquery.colorbox-min.js',
                    'assets/plugins/imagesloaded/imagesloaded.pkgd-min.js',
                    'assets/plugins/smartmenus/jquery.smartmenus.min.js',
                    'assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.min.js',
                    'assets/plugins/smartmenus/addons/keyboard/jquery.smartmenus.keyboard.min.js',
                    'assets/js/quest.min.js'
                ],
                dest: 'assets/js/quest-and-plugins.js'
            },
            css: {
                options: {
                    banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>\n' +
                        ' * Licensed GPLv2+ \n' +
                        ' */\n',
                    process: function(src, filepath) {
                        return '\n/* Source: ' + filepath + '*/\n' + src.replace(/\.\.\/fonts\//g, '../plugins/font-awesome/fonts/');
                    },
                },
                src: [
                    'assets/plugins/bootstrap/css/bootstrap.min.css',
                    'assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.css',
                    'assets/plugins/font-awesome/css/font-awesome.min.css',
                    'assets/plugins/animate/animate.css',
                    'assets/plugins/FullscreenSlitSlider/css/style.css',
                    'assets/plugins/colorbox/colorbox.css'
                ],
                dest: 'assets/css/plugins-all.css'
            }
        },

        // uglify to concat, minify, and make source maps
        uglify: {
            dist: {
                options: {
                    // sourceMap: 'assets/js/map/quest-all.js',
                    banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * <%= pkg.homepage %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                        ' * Licensed GPLv2+' +
                        ' */\n',
                },
                files: {
                    'assets/js/quest.min.js': ['assets/js/quest.js'],
                    'assets/plugins/smartmenus/jquery.smartmenus.min.js': ['assets/plugins/smartmenus/jquery.smartmenus.js'],
                    'assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.min.js': ['assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.js'],
                    'assets/plugins/smartmenus/addons/keyboard/jquery.smartmenus.keyboard.min.js': ['assets/plugins/smartmenus/addons/keyboard/jquery.smartmenus.keyboard.js']
                    // 'assets/plugins/smartmenus/jquery.smartmenus.all.min.js': ['assets/plugins/smartmenus/jquery.smartmenus.min.js',
                    //                                                             'assets/plugins/smartmenus/bootstrap/jquery.smartmenus.bootstrap.min.js',
                    //                                                             'assets/plugins/smartmenus/keyboard/jquery.smartmenus.keyboard.js'],
                }
            }
        },

        cssmin: {
            dist: {
                options: {
                    banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * <%= pkg.homepage %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                        ' * Licensed GPLv2+' +
                        ' */\n',
                },
                files: {
                    'assets/css/plugins-all.min.css': ['assets/css/plugins-all.css']
                }
            }
        },

        addtextdomain: {
            options: {
                textdomain: 'quest', // Project text domain.
                updateDomains: ['quest-plus', 'cmb2', 'tgmpa'] // List of text domains to replace.
            },
            target: {
                files: {
                    src: [
                        '*.php',
                        '**/*.php',
                        '!node_modules/**',
                        '!tests/**'
                    ]
                }
            }
        },

        makepot: {
            target: {
                options: {
                    domainPath: 'languages',
                    mainFile: 'style.css',
                    include: [
                        '[^*?"<>]*.php'
                    ],
                    type: 'wp-theme',
                    processPot: function(pot) {
                        var translation,
                            excluded_meta = [
                                'Theme URI of the plugin/theme',
                                'Theme Name of the plugin/theme',
                                'Author of the plugin/theme',
                                'Author URI of the plugin/theme'
                            ];

                        for (translation in pot.translations['']) {
                            if ('undefined' !== typeof pot.translations[''][translation].comments.extracted) {
                                if (excluded_meta.indexOf(pot.translations[''][translation].comments.extracted) >= 0) {
                                    console.log('Excluded meta: ' + pot.translations[''][translation].comments.extracted);
                                    delete pot.translations[''][translation];
                                }
                            }
                        }

                        return pot;
                    },
                }
            }
        },

        compress: {
            dist: {
                options: {
                    archive: '../dist/quest.<%= pkg.version %>.zip',
                    mode: 'zip'
                },
                files: [{
                    dest: 'quest',
                    src: ['**/*', '!**node_modules/**', '!**tests/**', '!**/sass/**', '!*.{scss,sass}', '!.DS_Store', '!.sass-cache', '!karma.conf.js', '!Gruntfile.js', '!package.json', '!*config.codekit']
                }]
            }
        }

    });

    grunt.registerTask('updateVersion', 'Update Theme version to the latest version from package.json file', function() {
        var styleFile = grunt.file.read('style.scss'),
            regex = /\* Version\:     (\d*\.?\d*\.?\d*)/,
            pkg = grunt.file.readJSON('package.json'),
            versionStr = styleFile.match(regex);
        if (versionStr.length && versionStr.length > 1 && parseFloat(versionStr[1]) !== pkg.version) {
            styleFile = styleFile.replace(regex, '* Version:     ' + pkg.version);
            grunt.log.writeln('Theme version is ' + versionStr[1] + ' in the style.scss file and ' + pkg.version + ' in the package.json file');
            grunt.log.writeln('Updating the Theme version in the style.scss file');
            grunt.file.write('style.scss', styleFile);
        }
    });

    // register task
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('zip', ['compress']);
    grunt.registerTask('assets', ['uglify', 'concat', 'cssmin']);

};
