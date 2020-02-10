<template>
    <div>
        <h1>Count: {{ counter }}</h1>

        <button @click="counter++" jest="increment-button">+1</button>
        <div>
            <button @click="helloWord"></button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            counter: 0,
        }
    },
    methods: {
        helloWord() {
            this.couter = 4
        }
    }
}
</script>