# Dunckelfeld Base Wordpress Template

Intended to be installed through YeoPress.

## Setup

Make sure yo and generator-wordpress are installed.

```bash
npm install -g yo generator-wordpress
```

This theme also needs sass.

Setup your database and virtual hosts prior to starting the YeoPress installer.

```bash
yo wordpress
```

"Custom Theme"
> Yes

"Tarball / Git"
> Git

"Taskrunner"
> Grunt

"GitHub user"
> djfarly

"repo"
> wp-theme

"branch"
> master

Finish the wordpress installation inside your browser.

Start the watch task (the theme-folder symlink is created automatically):

```bash
cd theme-folder
grunt
```

Uninstall the 102 other themes and choose this theme.
