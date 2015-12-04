// FinalProject/Gruntfile.js

module.exports = function(grunt){

  grunt.loadNpmTasks("grunt-postcss");
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask("default", ["postcss","sass"]);

  grunt.initConfig({
    postcss: {
    options: {
      processors: [
       require('pixrem')(), // add fallbacks for rem units
       require('autoprefixer-core')({browsers: 'last 2 versions'}), // add vendor prefixes
     ]
    },
      dist: {
        src: '*.css'
      }
    },
    sass: {
      dist: {
        files: {
          'style.css' : 'style.scss'
        }
      }
    }
  });
};
