# RBG Theme
We're using foundationpress and a child theme to act as the base theme for all client installs.

## Installation

Git clone foundationpress and this repository to your theme folder

    git clone https://github.com/dwenaus/rbgtheme.git rbg-child
    git clone git@github.com:olefredrik/FoundationPress.git foundationpress

Initialize npm within foundationpress

    cd foundationpress
    npm install

Replace the gruntfile in foundationpress with the one in rbg-child/lib

    mv Gruntfile.js _bk_Gruntfile.js
    cp ../rbg-child/lib/Gruntfile.js Gruntfile.js
   
Start watching for changes

    npm run watch
    
Start coding!
    
* Make all changes within rbg-child
* Modify base.scss in rbg-child/scss
* Add to rbg-child/functions.php
   