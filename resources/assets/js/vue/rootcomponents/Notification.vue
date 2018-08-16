<template>

    <div class="content">

        <div id="notify">

            <div v-if="status === 'success'" class="notify successbox">
                <span class="alerticon">
                    <h1>
                        <font-awesome-icon icon="thumbs-up" />
                        Success!
                    </h1>
                    <hr />
                </span>
                <p>
                    <span v-html="message"></span>
                </p>
            </div>
            
            <div v-if="status !== 'success'" class="notify errorbox">
                <span class="alerticon">
                    <h1>
                        <font-awesome-icon icon="exclamation-triangle" />
                        Warning!
                    </h1>
                </span>
                <p>
                    <span v-html="message"></span>
                </p>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        data: function() {
            return {
                message: this.$store.state.message,
                status: this.$store.state.status.toLowerCase()
            }
        },
    }
</script>

<style scoped>

    #notify {
        display: block;
        text-align: left;
        margin: 0 auto;
        padding-top: 30px;
    }

    /** notifications **/
    .notify {
        display: block;
        background: #fff;
        padding: 12px 18px;
        margin: 0 auto;
        cursor: pointer;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        margin-bottom: 20px;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 2px 0px;
    }

    .notify h1 { margin-bottom: 6px; }

    .successbox h1 { color: #678361; }
    .errorbox h1 { color: #6f423b; }

    .successbox h1:before, .successbox h1:after { background: #cad8a9; }
    .errorbox h1:before, .errorbox h1:after { background: #d6b8b7; }

    .notify .alerticon { 
        display: block;
        text-align: center;
        margin-bottom: 10px;
    }

</style>