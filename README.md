# ddev-wp-acf-blocks-svelte


[ACF Blocks](https://www.advancedcustomfields.com/resources/blocks/) meets Svelte + Vite 🧡

![Screenshot block with svelte input binding](.screenshot.png?raw=true)

Status: Work in progress 🧑‍🔧

Made with

- https://github.com/drud/ddev ([Discord](https://discord.gg/hCZFfAMc5k)
- https://github.com/torenware/ddev-viteserve

Inspired by [fgeierst/typo3-vite-demo](https://github.com/fgeierst/typo3-vite-demo). 

See more experiments: https://my-ddev-lab.mandrasch.eu/

**Local first time setup:**

1. `ddev start && ddev wp core download && ddev launch`
1. Finish installation of WordPress in browser
1. `ddev wp theme install raft && ddev wp theme activate raft-child`
1. `ddev npm install`
1. Use `ddev launch` to open `https://ddev-wp-acf-blocks-svelte.ddev.site/`

**Local development**

- Run either `ddev vite-serve start` or `ddev npm run dev`

## TODOs

- [ ] Implement production mode (detect url, `.ddev.site === development`)
- [ ] Render svelte blocks also in Gutenberg editor mode?

## Notes

- `templates/` folder was copied over to child theme because of current bug https://github.com/WordPress/gutenberg/issues/44243
- If you run composer with WordPress, that might be of interest: https://github.com/idleberg/php-wordpress-vite-assets

## How was this created?

```bash
# WP Quickstart for DDEV
# https://ddev.readthedocs.io/en/latest/users/quickstart/#wordpress
ddev config --project-type=wordpress && ddev start && ddev wp core download && ddev launch

# Finish installation in browser

# Install ACF Pro for ACF Blocks feature
# https://www.advancedcustomfields.com/pro/

# We use the Raft theme by themeisle, with child theme:
ddev wp theme install raft && ddev wp theme activate raft-child

# Vite support (https://github.com/torenware/ddev-viteserve)
ddev get torenware/ddev-viteserve
# Modified /.ddev/.env for configuration

ddev npm init -y
ddev npm install --save-dev vite @sveltejs/vite-plugin-svelte

# Added scripts-section to package.json & create vite.config.js
```

