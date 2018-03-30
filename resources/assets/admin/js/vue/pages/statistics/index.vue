<template>
    <div>
        <h1>Statistics</h1>
            <test></test>
    </div>
</template>
<script type="text/babel">
    import test from './components/test'

    export default({
        components: {
            test
        },
        created() {
            console.log('ssa');
        }
    })
</script>