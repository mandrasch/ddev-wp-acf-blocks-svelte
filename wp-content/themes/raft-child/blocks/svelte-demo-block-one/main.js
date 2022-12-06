import Test from './Test.svelte';

let blockEls = document.querySelectorAll('.svelte-demo-block-container');

blockEls.forEach(function(blockEl){

    const blockId = blockEl.getAttribute('data-block-id');

    // Inject svelte component with props
    // thx to https://jimmyutterstrom.com/blog/2019/06/21/svelte-3-components-in-legacy-apps/
    const test = new Test({
        target: blockEl,
        props: svelteDemoBlockData[blockId]
    });
});