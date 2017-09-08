import Vue from 'vue'
import VueRouter from 'vue-router'
import Vote from './components/Home/Index.vue'
import Login from './components/Admin/Login.vue'
import NotFound from './components/404.vue'
import Home from './components/Admin/Home.vue'
import Main from './components/Admin/Main.vue'
import Table from './components/Admin/Index.vue'
import Form from './components/Admin/Form.vue'
import Page4 from './components/Admin/Page4.vue'
import Page5 from './components/Admin/Page5.vue'
import Page6 from './components/Admin/Page6.vue'
import addPlayer from './components/Admin/addPlayer.vue'

Vue.use(VueRouter)

export default new VueRouter({
    // saveScrollPosition: true,
    routes: [
        {
            path: '/',
            component: Vote,
            name: '',
            hidden: true
        },
        {
            path: '/login',
            component: Login,
            name: '',
            hidden: true
        },
		{
            path: '/404',
            component: NotFound,
            name: '',
            hidden: true
        },
        {
            path: '/',
            component: Home,
            name: '视频管理',
            iconCls: 'el-icon-message',//图标样式class
            children: [
                { path: '/main', component: Main, name: '主页', hidden: true },
                { path: '/table', component: Table, name: '视频列表' },
                { path: '/form', component: Form, name: 'Form' },
                // { path: '/user', component: user, name: '列表' },
            ]
        },
        {
            path: '/',
            component: Home,
            name: '导航二',
            iconCls: 'el-icon-menu',
            children: [
                { path: '/page4', component: Page4, name: '页面4' },
                { path: '/page5', component: Page5, name: '页面5' }
            ]
        },
        {
            path: '/',
            component: Home,
            iconCls: 'el-icon-setting',
            leaf: true,//只有一个节点
            children: [
                { path: '/page6', component: Page6, name: '导航三' },
            ]
        },
        {
            path: '*',
            hidden: true,
            redirect: { path: '/404' }
        }
    ]
})