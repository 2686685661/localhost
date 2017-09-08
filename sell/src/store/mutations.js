export const mutations = {
  changeLoanIconStatu(state, param){
      state.loanIcons[param.name] = param.val;
  },
   uploadCreditStatu(state, param){
      console.log('this is mutations');
       state.creditStatus[param.name] = param.val;
   },
   uploadCreditData(state, param){
       console.log('this is mutations');
      state.creditDatas[param.name] = param.val;
   },
    uploadApplys(state, param){
       state[param.name] = param.val;
    },
    uploadBankLogin(state,param){
        state.bankLoginData[param.name] = param.val;
    },
    uploadOhterPicData(state,param){
        state.ohterPicDatas[param.name] = param.val;
    },
    changeOhterPicStatu(state,param){
        state.ohterPicStatus[param.name] = param.val;
    },
    addBorrow(state,param) {
        var num = 5;
        if(state.borrowArry.length > num) {
            delete state.borrowDetail[state.borrowArry[num]];
            state.borrowArry.pop();
        }
        state.borrowDetail[param.id] = param.val;
        state.borrowArry.unshift(param.id);
    }
}
