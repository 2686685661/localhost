export const state = {
    creditDatas:{}, //保存信用中心数据
    bankLoginData:{}, //保存waterLogin信息
    ohterPicDatas:{},  //保存其他资料
    borrowDetail:{},   //记录borrow数据
    borrowArry:[],    //模拟borrow指针(真实为被加载进来的数据)
    creditStatus: {
        userInfo:false,
        userFace:false,
        userContact:false,
        userPhoto:false,
        userWork:false,
        userCard:false,
        userAccum:false,
        bankLogin:false,
        userBank:false,
        alipayAuth:false
    },
    loanIcons: {
        small:false,
        large:false,
        loser:false
    },
    tempDesCont:'',   //借款描述暂存
    tempApplyOpt:'',   //借款申请选择暂存
    ohterPicStatus: {
        otherFile:false,
        salaryFile:false,
        personCreditFile:false,
        socialSecurityFile:false,
        creditCardFile:false,
        workFile:false,
        marriageFile:false,
        businessLicenseFile:false,
        loanAgreementFile:false
    }

}
