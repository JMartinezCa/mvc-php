const { watch } = require("gulp");

const css = require('./css');
const js = require('./javascript');

const config = require('../config');


/**
 * Vigila cambios en archivos scss y js de la carpeta resouces
 * 
 * @param {*} done
 * 
 */
function watchCompile(done){
    watch(config.scss.src, css.scssToCss);
    watch(config.js.src, js.minifyJS);

    done();
}

exports.watchCompile = watchCompile;