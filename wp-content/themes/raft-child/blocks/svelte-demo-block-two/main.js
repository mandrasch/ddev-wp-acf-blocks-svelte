import TestTwo from './TestTwo.svelte';

let blockEls = document.querySelectorAll('.svelte-demo-block-two');

blockEls.forEach(function(blockEl){
    const test = new Test({
        target: blockEl
    });
});