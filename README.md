# wordpress-gulp-revolt-starter

A WordPress starter theme that also includes full setup for Revolt, Gulp, SASS, AutoPrefixer, BrowserSync, and more.

## System Preparation

To use this project, you'll need the following things installed on your machine.

1. [NodeJS](http://nodejs.org) - use the installer.
2. [Bower](http://bower.io) - `$ npm install -g bower` (mac users may need sudo).
3. [GulpJS](https://github.com/gulpjs/gulp) - `$ npm install -g gulp` (mac users may need sudo).

## Local Installation

1. Clone this repo, or download it into a directory of your choice.
2. Inside the directory, run `$ npm install` to install the node modules (e.g. Gulp).
3. Then run `$ bower install` to install the bower components (e.g. Revolt).

## Local Development using dedicated WP installation

If you want to have a dedicated WordPress installation just for this project, you can just download and unzip a fresh copy of WordPress, put it into the root folder, and rename it to `wp`.
If you want to install it under a different path, make sure to edit the build and browsersnyc proxy paths in the `gulpconfig.js`.

## Local Development using a Symlink

You can use symlink this theme to a WordPress installation if you wish. Here are the steps:

1. Symlink `build` to your `wp-content/themes` directory for local development and testing (e.g. if your theme is in `~/dev/themes/my-theme` and your local copy of WordPress is installed in `~/dev/localhost/wp` you'll want to run `ln -s ~/dev/themes/my-theme/build ~/dev/localhost/wp/wp-content/themes/my-theme`).
2. Open `src/functions.php` and remove the comment characters `//` in front of the line `require_once( 'functions/admin/metaboxes/symlink-filter.php' );`. Then open `src/functions/admin/metaboxes/symlink-filter.php` and change the paths on lines 29 and 30 to your own. This will fix a common issue with CMB2 where it tries to load assets from a wrong path.

You can also symlink the `dist` directory for a final round of testing; just keep in mind that your theme will now be in `dist/[project]`, where `[project]` is the setting at the top of the Gulp configuration. This project folder is what you will want to deploy to production. (No more weird junk in your themes. Hooray!)

## Configuration

You have to edit `gulpconfig.js` to get the project running.

1. Change the project directory name.
2. To get browsersync to work, change the browsersync proxy address to your own.

## Usage

**development mode**

This will give you file watching, browser synchronisation, auto-rebuild, CSS injecting etc etc.

    $ gulp

## Organization

This project uses `src`, `build`, and `dist` folders to organize theme development:

* `src`: this directory contains the raw material for your theme: templates (`src/`), PHP includes (`src/inc`), language files (`src/languages`), styles (`src/scss`), scripts (`src/js`), and images (anywhere under `src/`). **Only edit files in this directory!**
* `build`: generated by Gulp, this is a *working copy* of your theme for use in development and testing.
* `dist`: short for distribution, this will be the final, polished copy of your theme for production. You will need to manually run `gulp dist` to create a new distribution.

Note: both the `build` and `dist` directories are disposable and can be regenerated from the contents of `src`. You aren't likely to want to edit files in this folders but you may want to open them up to diagnose issues with the build process itself.

## Working with Sass

* This package now supports either [gulp-ruby-sass](https://github.com/sindresorhus/gulp-ruby-sass/) (which requires [the original Ruby implementation of Sass](https://github.com/sass/sass)) or [gulp-sass](https://www.npmjs.org/package/gulp-sass) (based on the newer, experimental, and faster [libsass](https://github.com/sass/libsass), now active by default). Switch `styles.compiler` in the configuration file as needed! For reference: [Sass compatibility table](https://sass-compatibility.github.io/).
* [Sass](http://sass-lang.com/) files can be found in `/src/scss`. Gulp will not process Sass partials beginning with `_`; these need to be explicitly imported (see `style.scss` for an example). On the other hand, if you want to output any other CSS files just drop the underscore *e.g.* `editor-style.scss`.
* Packages installed with Bower or npm are in the path by default so you can `@import` Sass files directly, as seen in `style.scss`.
* The `build` folder is provisioned with regular versions of all stylesheets but `dist` only contains minified versions for production.
* [Sourcemaps](http://www.html5rocks.com/en/tutorials/developertools/sourcemaps/?redirect_from_locale=tw) are generated by [gulp-sourcemaps](https://github.com/floridoo/gulp-sourcemaps) to make debugging stylesheets a snap.

## Deployment

After editing the `gulpconfig.js`, and adding you FTP/SFTP credentials and defining the `protocol`, you can use the following command to deploy:

    $ gulp deploy