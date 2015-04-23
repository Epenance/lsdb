/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    //Setting up slim
    slim: {
      dist: {
        options: {                       // Target options
        pretty: true
      },
        files: [{
          expand: true,
          cwd: 'slim',
          src: ['{,*/}*.slim'],
          dest: 'www',
          ext: '.php'
        }]
      }
    },
    compass: {
      dist: {
        options: {
          config: 'config.rb'
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['last 1 version'] // more codenames at https://github.com/ai/autoprefixer#browsers
      },
      dist: {
        files: [{
          expand: true,
          flatten: true,
          src: 'css/*.css', // -> src/css/file1.css, src/css/file2.css
          dest: 'www/css/' // -> dest/css/file1.css, dest/css/file2.css
        }]
      }
    },

    watch: {
      //Watching all the .slim files in the project
      slimfiles: {
      files: '{,*/}*.slim',
      tasks:['slim']
      },
      scssfiles: {
        files: '{,*/}*.scss',
        tasks:['compass', 'autoprefixer']
      },
      livereload: {
      // Here we watch the files the sass task will compile to
      // These files are sent to the live reload server after sass compiles to them
      options: { livereload: 1337 },
      files: ['www/**/*'],
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-slim');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-autoprefixer');

  // Default task.
  grunt.registerTask('default', ['watch']);



};
