{"filter":false,"title":"getters.js","tooltip":"/resources/assets/js/store/getters.js","ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":0,"column":3},"end":{"row":9,"column":4},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"hash":"84f0bcfb6e0562174f21d3c81153cf5706f9af9f","undoManager":{"mark":1,"position":1,"stack":[[{"start":{"row":0,"column":0},"end":{"row":9,"column":1},"action":"insert","lines":["export const cartProducts = state => {","  return state.cart.added.map(({ id, quantity }) => {","    const product = state.products.all.find(p => p.id === id)","    return {","      title: product.title,","      price: product.price,","      quantity","    }","  })","}"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":3},"action":"insert","lines":["// "],"id":2},{"start":{"row":1,"column":0},"end":{"row":1,"column":3},"action":"insert","lines":["// "]},{"start":{"row":2,"column":0},"end":{"row":2,"column":3},"action":"insert","lines":["// "]},{"start":{"row":3,"column":0},"end":{"row":3,"column":3},"action":"insert","lines":["// "]},{"start":{"row":4,"column":0},"end":{"row":4,"column":3},"action":"insert","lines":["// "]},{"start":{"row":5,"column":0},"end":{"row":5,"column":3},"action":"insert","lines":["// "]},{"start":{"row":6,"column":0},"end":{"row":6,"column":3},"action":"insert","lines":["// "]},{"start":{"row":7,"column":0},"end":{"row":7,"column":3},"action":"insert","lines":["// "]},{"start":{"row":8,"column":0},"end":{"row":8,"column":3},"action":"insert","lines":["// "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":3},"action":"insert","lines":["// "]}]]},"timestamp":1501307971509}