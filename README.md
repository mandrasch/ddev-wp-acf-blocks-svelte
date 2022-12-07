# ddev-wp-acf-blocks-svelte


[ACF Blocks](https://www.advancedcustomfields.com/resources/blocks/) meets Svelte + Vite 🧡

![Screenshot block with svelte input binding](.screenshot.png?raw=true)

Status: Work in progress 🧑‍🔧

Made with

- https://github.com/drud/ddev ([Discord](https://discord.gg/hCZFfAMc5k))
- https://github.com/torenware/ddev-viteserve
- (https://themeisle.com/themes/raft/)

Inspired by [fgeierst/typo3-vite-demo](https://github.com/fgeierst/typo3-vite-demo). See more experiments: https://my-ddev-lab.mandrasch.eu/

**Local first time setup:**

1. `ddev start && ddev wp core download && ddev launch`
1. `ddev npm install`
1. Finish installation of WordPress in browser
1. `ddev wp theme install raft && ddev wp theme activate raft-child`
1. Use `ddev launch wp-admin/` to open `https://ddev-wp-acf-blocks-svelte.ddev.site/wp-admin/`
1. Important: Install and activate ACF Pro https://www.advancedcustomfields.com/pro/
1. Add Svelte Block One to a page or post of your choice
1. Run either `ddev npm run dev` or `ddev vite-serve start` for local dev


**Local development**

- Run either `ddev npm run dev` or `ddev vite-serve start`

Use `define('WP_ENV','production');` or `define('WP_ENV','development');` in `wp-config.php` to simulate the environment. The default is `development`. 

## TODOs

- [ ] Render svelte blocks also in Gutenberg editor mode?
- [ ] Watch [Jesse Skinner - Adding Svelte to your legacy projects
](https://www.youtube.com/watch?v=uWxkaDdqfpI)

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

## Thanks to

- https://jimmyutterstrom.com/blog/2019/06/21/svelte-3-components-in-legacy-apps/