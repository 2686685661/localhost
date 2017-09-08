<template>
    <div class="pageErrors">
        {{ msg }}
        <slot name="cont"></slot>
    </div>
</template>

<script>

    export default {
        props:['msg']
    }
</script>
<style>

</style>
