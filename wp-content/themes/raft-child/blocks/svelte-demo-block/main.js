import Test from './Test.svelte';

let blockEls = document.querySelectorAll('.svelte-demo-block');

blockEls.forEach(function(blockEl){
    const test = new Test({
        target: blockEl
    });
});