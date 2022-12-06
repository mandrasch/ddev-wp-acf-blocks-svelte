<script>
  // props
  export let title = "";

  let name = "World";
</script>

<div class="svelte-demo-block">
  <h3>Title (set as prop): {title}</h3>
  <p>
    <strong>Svelte Demo Block 🎉</strong>
  </p>

  <label>
    Your Name:
    <input bind:value={name} />
  </label>

  <p>Hello {name}!</p>
</div>

<style>
  .svelte-demo-block {
    min-height: 200px;
    border: 4px dotted black;
    padding: 10px;
  }
</style>
