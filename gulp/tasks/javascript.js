const { src, dest } = require('gulp');

//tools
const { sourcemaps, plumber, rename, browserify, source, buffer, terser, babelify, concat } = require('../tools');

//config
const config = require('../config');
const jsFiles = [config.js.rootFiles.main, config.js.rootFiles.lib];

/**
 * unifica los archivos de javascript en uno solo y minifica el codigo
 * 
 * @param {*} done
 * 
 */
function minifyJS(done){
    browserify(jsFiles, {debug: true}).transform(babelify, {
        presets: ["@babel/preset-env"],
        sourceMaps: true
    })
    .transform(babelify)
    .bundle()
    .pipe( source('app.js') )
    .pipe( rename({suffix: '.min'}) )
    .pipe( buffer() )
    .pipe( sourcemaps.init({ loadMaps: true }) )
    .pipe( terser() )
    .pipe( sourcemaps.write('.'))
    .pipe( dest(config.js.dest) );

    done();
}

exports.minifyJS = minifyJS;