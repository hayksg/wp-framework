<template>
    <div class="title-color">
        <h5>{{ title }}</h5>
    </div>
</template>

<script>
export default {
    data () {
        return {
            title: 'Hello from vue component'
        }
    }
}
</script>

<style scoped>
    .title-color {
        color: #41B883;
    }
</style>
