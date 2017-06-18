import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
import ArticleList from '@/components/article/ArticleList'
import ArticleDetail from '@/components/article/ArticleDetail'
import Login from '@/components/auth/Login'
import store from '../store.js'

Vue.use(Router)

var router = new Router({
    routes: [
        {
            path: '/',
            name: 'Hello',
            component: Hello
        },
        {
            path: '/articles',
            name: 'articles',
            component: ArticleList
        },
        {
            path: '/article/:id',
            name: 'articleDetail',
            component: ArticleDetail
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        }
    ]
})

router.beforeEach((to, from, next) => {
    // to 和 from 都是 路由信息对象
    // var auth = to.matched[0].default.auth;
    // console.log(to);

    if (to.path === '/login' || to.path === '/logout') {
        next()
    } else {
        console.log(store)
        const user = store.state.system.user
        if (user) {
            const time = new Date().getTime()
            if (time - user.lastCheckTime > 60 * 1000) { // 如果上次检查时间大于1分钟，则调用服务端接口判断session 是否依然有效
                store.dispatch('checkLogin', (error, isLogined) => { // 异步检查是否状态有效
                    if (error || !isLogined) {
                        console.warn('登录超时')
                        next({'path': '/login', query: {backUrl: to.fullPath}})
                    } else {
                        next()
                    }
                })
            } else {
                next()
            }
        } else {
            console.warn('需要登录')
            next({'path': '/login', query: {backUrl: to.fullPath}})
        }
    }
})

export default router
