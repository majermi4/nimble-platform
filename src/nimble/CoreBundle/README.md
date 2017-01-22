# AdminLTEBundle

This bundle integrates the core functions of the AdminLTE theme with the Symfony framework.

Basically, this bundle provides the very minimum necessary integration (mostly the views) to start building your app on top of. For more complex features, please see the other associated bundles.

* ....
* ....
* ....

## Installation

For the CSS/JS files and images to be loaded, the files from ... XXXX ... have to be copied into the **web** directory. (or just **bin/console assets:install** >> LOL)

Create **menu.yml** in **app/config** folder.

include **FOSUserBundle** and **KNPMenuBundle** in AppKernel class.

Setup the FOSUserBundle config. 

To help you start quickly, there is a **skeleton** project with a **Gulp** file prefigured to take care of this migration and other common asset management tasks. --LINK NEEDED --

## Configuration

* theme_skin
* app_name 
* logo_lg, logo-mini


### Dependencies:

* knplabs/knp-menu-bundle: ^2.0