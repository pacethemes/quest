module.exports = function (config) {
    'use strict';
    config.set({

	client: {
      mocha: {
        reporter: 'html', // change Karma's debug.html to the mocha web reporter
        ui: 'bdd'
      }
    },

        basePath: '',

        frameworks: ['mocha', 'chai', 'sinon'],

        files: [
//            '*.js'
            'test/**/*.js'
        ],

        reporters: ['progress'],

        port: 9876,
        colors: true,
        autoWatch: false,
        singleRun: false,

        // level of logging
        // possible values: config.LOG_DISABLE || config.LOG_ERROR || config.LOG_WARN || config.LOG_INFO || config.LOG_DEBUG
        logLevel: config.LOG_INFO,

//        browsers: ['PhantomJS']
	 browsers: process.env.TRAVIS ? ['Firefox'] : ['Chrome']

    });
};
