# Dunckelfeld Base Wordpress Template

Intended to be installed through YeoPress.

## Setup

Make sure yo and generator-wordpress are installed.

$ npm install -g yo generator-wordpress

This theme also needs sass.

Setup your database and virtual hosts prior to starting the YeoPress installer.

$ yo wordpress

"Custom Theme"
> Yes

"Tarball / Git"
> Git

"Taskrunner"
> Grunt

"GitHub user"
> djfarly

"repo"
> base-wp-template

"branch"
> master

Finish the wordpress installation inside your browser.

Start the watch task:

$ cd theme-folder
$ grunt

Uninstall the 102 other themes and choose this theme.