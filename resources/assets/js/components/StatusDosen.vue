<template>
  <span class="badge bg-green" v-if="statusdosen[iddosen]">Aktif</span>
  <span class="badge bg-red" v-else>Non-Aktif</span>
</template>

<script>
    export default {
        props: ['iddosen', 'statusdosen']
    }
</script>
