module.exports = function(grunt) {

	var pkg = grunt.file.readJSON('package.json');

	grunt.log.writeln('');
	grunt.log.writeln('> '+pkg.name);
	grunt.log.writeln('');

	grunt.initConfig({
		pkg: pkg,

		sass: {
			expanded: {
				options: {
					style: 'expanded',
					sourcemap: 'inline'
				},
				files: [{
					expand: true,
					cwd:  '<%= pkg.srcPath %>/scss',
					src:  ['*.scss'],
					dest: '<%= pkg.destPath %>/css',
					ext:  '.css'
				}]
			},
			compressed: {
				options: {
					style: 'compressed',
					sourcemap: 'none'
				},
				files: [{
					expand: true,
					cwd:  '<%= pkg.srcPath %>/scss',
					src:  ['*.scss'],
					dest: '<%= pkg.destPath %>/css',
					ext:  '.min.css'
				}]
			}
		},

		autoprefixer: {
			options: {
				browsers: [
					'last 2 versions',
					'ie >= 9'
				]
			},
			css: {
				expand: true,
				flatten: true,
				src:  '<%= pkg.destPath %>/css/*.css',
				dest: '<%= pkg.destPath %>/css/'
			}
		},

		// jshint javascript
		jshint : {
			all : ['<%= pkg.srcPath %>/js/**/*.js', '!<%= pkg.srcPath %>/js/modernizr/*.js', '!<%= pkg.srcPath %>/js/plugins/**/*.js'],
			options : {
				browser: true,
				curly: false,
				eqeqeq: false,
				eqnull: true,
				expr: true,
				immed: true,
				newcap: true,
				noarg: true,
				smarttabs: true,
				sub: true,
				undef: false
			}
		},

		// Uglify takes care of the require js source
		uglify: {
			require: {
				src:  '<%= pkg.srcPath %>/js/plugins/requirejs/require.js',
				dest: '<%= pkg.destPath %>/js/require.min.js'
			},
			modernizr: {
				src:  '<%= pkg.srcPath %>/js/modernizr/modernizr.js',
				dest: '<%= pkg.destPath %>/js/modernizr.min.js'
			},
		},

		// Require config
		requirejs: {
			production: {
				options: {
					name: 'main',
					baseUrl: '<%= pkg.srcPath %>/js',
					mainConfigFile: '<%= pkg.srcPath %>/js/main.js',
					out: '<%= pkg.destPath %>/js/main.js'
				}
			}
		},

		// Bower task sets up require config
		bowerRequirejs: {
			all: {
				rjsConfig: '<%= pkg.srcPath %>/js/main.js'
			}
		},

		watch: {
			scripts: {
				files: ['<%= pkg.srcPath %>/js/**/*.js'],
				tasks: ['jshint', 'requirejs'],
				options: {
					spawn: false,
					livereload: true
				},
			},
			css: {
				files: ['<%= pkg.srcPath %>/sass/**/*.scss'],
				tasks: ['sass', 'autoprefixer'],
				options: {
					spawn: false,
					livereload: true
				},
			},
			markup: {
				files: ['**/*.php', '**/*.html', '**/*.htm'],
				options: {
					livereload: true
				},
			},
		},

		// create a symlink for the theme folder for easy access
		symlink: {
		  options: {
		    overwrite: false
		  },
		  explicit: {
		    src: './',
		    dest: '../../../theme-folder'
		  }
		}
	});

	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-bower-requirejs');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-requirejs');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-symlink');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');


	grunt.registerTask('default', ['jshint', 'requirejs', 'uglify', 'sass', 'autoprefixer', 'watch']);

	grunt.registerTask('setup', ['run-bower-install', 'symlink', 'requirejs', 'uglify', 'sass', 'autoprefixer']);

	// this task is run by bower automatically on postinstall...
	grunt.registerTask('bowerrjs', ['bowerRequirejs']); 


	// Run bower install
	grunt.registerTask('run-bower-install', function() {
		var done = this.async();
		var bower = require('bower').commands;
		bower.install().on('end', function(data) {
			done();
		}).on('data', function(data) {
			console.log(data);
		}).on('error', function(err) {
			console.error(err);
			done();
		});
	});
};