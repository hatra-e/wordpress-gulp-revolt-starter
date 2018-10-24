# wordpress-gulp-revolt-starter

This theme includes full setup for Revolt, Gulp, SASS, AutoPrefixer, BrowserSync, and more.

## System Preparation

To use this project, you'll need the following things installed on your machine.

1. [NodeJS](http://nodejs.org) - use the installer.
2. [Bower](http://bower.io) - `$ npm install -g bower` (mac users may need `sudo`).
3. [GulpJS](https://github.com/gulpjs/gulp) - `$ npm install -g gulp` (mac users may need `sudo`).

## Local Installation

1. Clone this repo, or download it into a directory of your choice.
2. Inside the directory, run `$ npm install` to install the node modules (e.g. Gulp).
3. Then run `$ bower install` to install the bower components (e.g. Revolt).

## Local Development using dedicated WP installation

Download and unzip a fresh copy of WordPress, put it into the root folder, and rename it to `wp`.
If you want to install it under a different path, make sure to edit the build path in the `gulpconfig.js` and the proxy path in the `gulpenv.js`.

## Configuration

Edit `gulpconfig.js`:

1. Change the project directory name.

Create `gulpenv.js`:

1. Copy `gulpenv.example.js` and name it `gulpenv.js` (don't delete `gulpenv.example.js`).
1. To get BrowserSync to work, change the proxy address to your own in `gulpenv.js`.

`gulpenv.js` will be ignored by Git, so other people working on the project can create their own set their own `gulpenv.js` file and set their proxy address.

## Usage

**Development Mode**

This will give you file watching, browser synchronisation, auto-rebuild, CSS injecting etc etc.

    $ gulp

**Production Mode**
    
This will minify your CSS and not add sourcemaps to the `build` folder.

    $ gulp --env production

## Organization

This project uses `src` and `build` folders to organize theme development:

* `src`: this directory contains the raw material for your theme: templates (`src/`), PHP functions (`src/functions`), language files (`src/languages`), styles (`src/scss`), scripts (`src/js`), and images (anywhere under `src/`). **Only edit files in this directory!**
* `build`: generated by Gulp, this is the *working copy* of your theme. You `build` folder will be named after your project directory (what you defined it to be in `gulpconfig.js`) and can be found in `wp/wp-content/themes`.

Note: the `build` directory is disposable and can be regenerated from the contents of `src`. You aren't likely to want to edit files in this folders but you may want to open them up to diagnose issues with the build process itself.

## Working with Sass

* This project uses [node-sass](https://github.com/sass/node-sass/), which provides binding for Node.js to [LibSass](https://github.com/sass/libsass/), the C version of the popular stylesheet preprocessor, Sass. For reference: [Sass compatibility table](https://sass-compatibility.github.io/).
* [Sass](http://sass-lang.com/) files can be found in `/src/scss`. Gulp will not process Sass partials beginning with `_`; these need to be explicitly imported (see `style.scss` for an example). On the other hand, if you want to output any other CSS files just drop the underscore *e.g.* `editor-style.scss`.
* Packages installed with Bower or npm are in the path by default so you can `@import` Sass files directly, as seen in `style.scss`.
* [Sourcemaps](http://www.html5rocks.com/en/tutorials/developertools/sourcemaps/?redirect_from_locale=tw) are generated by [gulp-sourcemaps](https://github.com/floridoo/gulp-sourcemaps) to make debugging stylesheets a snap.
