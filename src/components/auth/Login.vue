<template>
    <form class="login-form" novalidate @submit.stop.prevent="login">
        <!-- text -->
        <p>
            <input type="text" v-model="user">
            {{user}}
        </p>
        <p>
            <input type="text" v-model="password">
            {{password}}
        </p>
        <input type="submit" value="Login" />
        <p><pre>data: {{$data}}</pre></p>
    </form>
</template>

<script>
    import * as types from '../../types'
    export default {
        name: 'login',
        data () {
            return {
                title: 'Login',
                user: 'hi!',
                password: 'one'
            }
        },
        mounted () {
            this.$store.commit(types.TITLE, 'Login')
        },
        methods: {
            login () {
                if (this.token) {
                    this.$store.commit(types.LOGIN, this.token)
                    let redirect = decodeURIComponent(this.$route.query.redirect || '/')
                    this.$router.push({
                        path: redirect
                    })
                }
            }
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang='scss' rel="stylesheet/scss" type="text/css">
    .login-form {
        text-align: left;
        width: 400px;
        margin: 50px auto;
    }
</style>
