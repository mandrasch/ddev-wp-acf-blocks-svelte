// https://stackblitz.com/edit/vitejs-vite-vtb3nk?file=vite.config.js&terminal=dev

// inspired by 
// https://github.com/fgeierst/typo3-vite-demo/blob/master/packages/typo3_vite_demo/Resources/Private/JavaScript/vite.config.js

import { defineConfig } from 'vite'
import { svelte } from '@sveltejs/vite-plugin-svelte'

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [svelte()],
    // root: path.resolve(__dirname, 'src/js'),
    server: {
        host: "0.0.0.0", // leave this unchanged for DDEV!
        port: 5173,
        origin: 'https://ddev-wp-acf-blocks-svelte.ddev.site'
    },
    publicDir: false, // disable copy `public/` to outDir
    build: {
        // generate manifest.json in outDir
        manifest: true,
        rollupOptions: {

            input: 'wp-content/themes/raft-child/main.js'


            /* Single files approach
            input: {
                'svelte-demo-block': 'wp-content/themes/raft-child/blocks/svelte-demo-block/main.js',
                'svelte-demo-block': 'wp-content/themes/raft-child/blocks/svelte-demo-block/main.js',
            },*/
            // It is also possible to split it into multiple js files, see: https://rollupjs.org/guide/en/#input
            // But then we need to be careful with dev includes path (<script type="module" src="<?php echo get_site_url(); ?>:5173/wp-content/themes/raft-child/blocks/svelte-demo-block/main.js"></script>) and path for production builds: src="<?php echo get_site_url(); ?>/wp-content/themes/raft-child/dist/entry-svelte-demo-block.js"
            /* output: {
               entryFileNames: 'entry-[name].js'
             }*/
        },
        outDir: 'wp-content/themes/raft-child/dist',
    }

})
