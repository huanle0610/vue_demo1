<template>
    <div class="article-detail">
        <router-link to="/articles">返回列表</router-link>
        <h1>{{ article.title }}</h1>
       <div>
           {{ article.content }}
       </div>
    </div>
</template>

<script>
    export default {
        name: 'ArticleDetail',
        data () {
            return {
                article: {}
            }
        },
        created: function () {
            var apiUrl = 'welcome/getArticle/' + this.$route.params.id
            this.$http.get(apiUrl,
                    {
                        params: {
                            productType: '1',
                            pageNum: 1,
                            pageLimit: 6
                        }
                    }
            ).then((response) => {
                this.article = response.data
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
