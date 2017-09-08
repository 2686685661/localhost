import Vue from 'vue'
import Router from 'vue-router'
import home from '@/zjapp.vue'
// import loan from '@/views/loan/loan.vue'
// import credit from '@/views/credit/credit.vue'
// import mecenter from '@/views/mecenter/mecenter.vue'
// import loanMicro from '@/views/loan/loanMicro.vue'

Vue.use(Router)
export default new Router({
  routes: [
    {
      path: '/',
      component: home,
      children: [
        {path:'sign',component: resolve => require(['@/views/other/sign.vue'],resolve)},
        {path:'register',component: resolve => require(['@/views/other/register.vue'],resolve)},
        {path:'forget',component: resolve => require(['@/views/other/forget.vue'],resolve)},
        {
          path: 'loan',
          component: home,
          children: [
            { path: '/', component: resolve => require(['@/views/loan/loan.vue'], resolve) },
            {path: 'loanmicro', component: resolve => require(['@/views/loan/loanMicro'], resolve)},
            {path: 'loanlarge', component: resolve => require(['@/views/loan/loanLarge'], resolve)},
            {path: 'loanloser', component: resolve => require(['@/views/loan/loanLoser'], resolve)},
            {path: 'datamust', component: resolve => require(['@/views/loan/dataMust'], resolve)},
            {path: 'submitapply', component: resolve => require(['@/views/loan/submitApply'], resolve)},
            {path: 'loanrecom', component: resolve => require(['@/views/loan/loanRecom'], resolve)},
            {path: 'loandes', component: resolve => require(['@/views/loan/loanDes'], resolve)},
            {path: 'loanmsg', component: resolve => require(['@/views/loan/loanMsg'], resolve)},
            {path: 'suremore', component: resolve => require(['@/views/loan/loanSureMore'], resolve)},
            {path: 'cancelsup', component: resolve => require(['@/views/loan/cancelSup'], resolve)}
          ]
        },
        {
          path: 'credit',
          component: home,
          children: [
            { path: '/', component: resolve => require(['@/views/credit/credit.vue'], resolve) },
            { path: 'userinfor', component: resolve => require(['@/views/credit/userInfor.vue'], resolve) },
            { path: 'userface', component: resolve => require(['@/views/credit/userFace.vue'], resolve) },
            { path: 'usercontact', component: resolve => require(['@/views/credit/userContact.vue'], resolve) },
            { path: 'userphoto', component: resolve => require(['@/views/credit/userPhoto.vue'], resolve) },
            { path: 'userwork', component: resolve => require(['@/views/credit/userWork.vue'], resolve) },
            { path: 'usercard', component: resolve => require(['@/views/credit/userCard.vue'], resolve) },
            { path: 'useraccum', component: resolve => require(['@/views/credit/userAccum.vue'], resolve) },
            { path: 'usersocial', component: resolve => require(['@/views/credit/userSocial.vue'], resolve) },
            { path: 'bankcard', component: resolve => require(['@/views/credit/bankCard.vue'], resolve) },
            { path: 'banklogin/:index', component: resolve => require(['@/views/credit/bankLogin.vue'], resolve) },
            { path: 'sesamecre', component: resolve => require(['@/views/credit/sesameCre.vue'], resolve) },
            { path: 'bankinfo', component: resolve => require(['@/views/credit/bankInfo.vue'], resolve) },
            { path: 'banksms', component: resolve => require(['@/views/credit/bankSMS.vue'], resolve) },
            { path: 'bankdetail', component: resolve => require(['@/views/credit/bankDetail.vue'], resolve) },
            { path: 'support', component: resolve => require(['@/views/credit/bankSupport.vue'], resolve) },
            { path: 'bankhelp', component: resolve => require(['@/views/credit/bankHelp.vue'], resolve) },
            { path: 'alipayauth', component: resolve => require(['@/views/credit/alipayAuth.vue'], resolve) },
            { path: 'otherdata', component: resolve => require(['@/views/credit/otherData.vue'], resolve) },
            { path: 'dataupload/:param', component: resolve => require(['@/views/credit/dataUpload.vue'], resolve) },

          ]
        },
        {
          path: 'mecenter',
          component: home,
          children: [
            { path: '/', component: resolve => require(['@/views/mecenter/mecenter.vue'], resolve) },
            { path: 'merecord', component: resolve => require(['@/views/mecenter/meRecord.vue'], resolve) },
            { path: 'repaylist', component: resolve => require(['@/views/mecenter/repayList.vue'], resolve) },
            { path: 'repaytips', component: resolve => require(['@/views/mecenter/repayTips.vue'], resolve) },
            { path: 'repaygo/:id/:total', component: resolve => require(['@/views/mecenter/repayGo.vue'], resolve) },
            { path: 'borrowlist', component: resolve => require(['@/views/mecenter/borrowList.vue'], resolve),children:[
              { path: '/', component: resolve => require(['@/views/mecenter/borrowListAll.vue'], resolve) },
              { path: 'apply', component: resolve => require(['@/views/mecenter/borrowListApply.vue'], resolve) },
              { path: 'repay', component: resolve => require(['@/views/mecenter/borrowListRepay.vue'], resolve) },
              { path: 'over', component: resolve => require(['@/views/mecenter/borrowListOver.vue'], resolve) },
            ] },
            { path: 'borrowdetail/:id', component:resolve => require(['@/views/mecenter/borrowDetail.vue'], resolve) },
            { path: 'borrowdetail/:id/more', component:resolve => require(['@/views/mecenter/borrowDmore.vue'], resolve) },
            { path: 'rewardlist', component: resolve => require(['@/views/mecenter/rewardList.vue'], resolve),children:[
              { path:'/' , component: resolve => require(['@/views/mecenter/rewardUnused'], resolve) },
              { path:'used' , component: resolve => require(['@/views/mecenter/rewardUsed'], resolve) },
              { path:'expired' , component: resolve => require(['@/views/mecenter/rewardExpired'], resolve) }
            ] },
            { path: 'helplist', component: resolve => require(['@/views/mecenter/helpList.vue'], resolve) },
            { path: 'helpdetail/:index', component: resolve => require(['@/views/mecenter/helpDetail.vue'], resolve) },
            { path: 'feedback', component: resolve => require(['@/views/mecenter/feedback.vue'], resolve) },
            { path: 'aboutme', component: resolve => require(['@/views/mecenter/aboutMe.vue'], resolve) },
          ]
        },
        {
          path:'userreport',
          component: home,
          children: [
            { path: '/', component: resolve => require(['@/views/credit/report/userReport.vue'], resolve) },
            { path: 'login', component: resolve => require(['@/views/credit/report/login.vue'], resolve) },
            { path: 'cover', component: resolve => require(['@/views/credit/report/cover.vue'], resolve) },
            { path: 'detail', component: resolve => require(['@/views/credit/report/detail.vue'], resolve) },
            { path: 'list', component: resolve => require(['@/views/credit/report/list.vue'], resolve) },
            { path: 'register1', component: resolve => require(['@/views/credit/report/register1.vue'], resolve) },
            { path: 'register2', component: resolve => require(['@/views/credit/report/register2.vue'], resolve) },
          ]
        }
      ]
    }
  ]
})

// export default new Router({
//   // mode: 'history',
//   routes: [
//     {
//       path: '/',
//       name: 'loan',
//       component: home,
//       children: [
//         {path: 'loanmicro', component: resolve => require(['@/views/loan/loanMicro'], resolve)}
//       ]
//     },
//
//     {
//       path: '/credit',
//       name: 'credit',
//       component: credit
//     },
//     {
//       path: '/mecenter',
//       name: 'mecenter',
//       component: mecenter
//     }
//   ]
// })
