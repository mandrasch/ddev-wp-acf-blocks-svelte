<script>
  let name = "World";
</script>

<p>
  <strong>Svelte Demo Block 🎉</strong>
</p>

<label>
  Your Name:
  <input bind:value={name} />
</label>

<p>Hello {name}!</p>
