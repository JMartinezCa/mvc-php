const { task, parallel } = require( 'gulp' );

const css = require('./gulp/tasks/css');
const js = require('./gulp/tasks/javascript');
const img = require('./gulp/tasks/image');
const watcher = require('./gulp/tasks/watcher');


task('watcher', parallel(
    img.imgTasks,
    css.scssToCss, 
    js.minifyJS,
    watcher.watchCompile
));