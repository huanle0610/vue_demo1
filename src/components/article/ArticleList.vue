<template>
    <div class="article-list">
        <h1>{{ title }}</h1>
        <ul>
            <li v-for="(item, index) in articles">
                <router-link :to="{ path: '/article/' + index, query: { from: 'abc' }}">
                    {{ item }}
                </router-link>
            </li>



        </ul>
    </div>
</template>

<script>
    export default {
        name: 'ArticleList',
        data () {
            return {
                articles: [],
                title: 'Welcome to Your Vue.js App'
            }
        },
        created: function () {
            this.$http.get('welcome/getArticleList',
                    {
                        params: {
                            productType: '1',
                            pageNum: 1,
                            pageLimit: 6
                        }
                    }
            ).then((response) => {
                this.articles = response.data.items
            }).catch(function (response) {
                console.log(response)
            })
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    h1, h2 {
        font-weight: normal;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    a {
        color: #42b983;
    }
</style>
