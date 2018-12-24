<template>
    <div v-if="output" class="app-message">{{ output }}</div>
</template>

<script>
export default {
    props: ['message'],
    data() {
        return {
            appMessage: this.message,
            messageLength: this.message.length,
            i: 0,
            speed: 100,
            output: ''
        }
    },
    created() {
        this.typeWriter();
    },
    methods: {
        typeWriter() {
            if (this.i < this.messageLength) {
                this.output += this.appMessage.charAt(this.i);
                this.i++;
                setTimeout(this.typeWriter, this.speed);
            }
        }
    }
}
</script>

<style scoped>
    .app-message {
        color: #41B883;
    }
</style>
