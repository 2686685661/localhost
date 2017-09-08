<template>
    <div class="container">
        <topComponent title="疑问解答"></topComponent>
        <div class="concepts">
            <dl>
                <dt>{{ data.title }}</dt>
                <dd v-html="data.detail"></dd>
            </dl>
        </div>
    </div>
</template>

<script>
    import helpData from '../../data/helpDatas.json'
    export default {
        data:function () {
            return {
                data: {}
            }
        },
        mounted:function () {
            var index = this.$route.params.index;
            this.data = helpData[index];
        }
    }
</script>
<style>

</style>
