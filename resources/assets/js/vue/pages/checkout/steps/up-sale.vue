<template>
    <div>
        <h1>test</h1>
        <button @click="pay">Click</button>
    </div>
</template>
<script type="text/babel">
    export default ({
        data: () => ({}),
        props: {
            payload: String,
            orderId: Number
        },
        methods: {
            pay() {
                let method = "post";
                let path = `/api/pay/braintree/${this.orderId}`;
                var form = document.createElement("form");
                form.setAttribute("method", method);
                form.setAttribute("action", path);

                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", 'nonce');
                hiddenField.setAttribute("value", this.payload);

                form.appendChild(hiddenField);

                document.body.appendChild(form);
                form.submit();
            }
        }
    })
</script>