{"filter":false,"title":"index.js","tooltip":"/resources/assets/js/store/index.js","ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":15,"column":15},"end":{"row":15,"column":15},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":67,"mode":"ace/mode/javascript"}},"hash":"34b012f15a7bd407dd63ee4d2c484e83210f93e8","undoManager":{"mark":18,"position":18,"stack":[[{"start":{"row":0,"column":0},"end":{"row":21,"column":2},"action":"insert","lines":["import Vue from 'vue'","import Vuex from 'vuex'","import * as actions from './actions'","import * as getters from './getters'","import cart from './modules/cart'","import products from './modules/products'","import createLogger from '../../../src/plugins/logger'","","Vue.use(Vuex)","","const debug = process.env.NODE_ENV !== 'production'","","export default new Vuex.Store({","  actions,","  getters,","  modules: {","    cart,","    products","  },","  strict: debug,","  plugins: debug ? [createLogger()] : []","})"],"id":1}],[{"start":{"row":6,"column":0},"end":{"row":7,"column":0},"action":"remove","lines":["import createLogger from '../../../src/plugins/logger'",""],"id":2}],[{"start":{"row":19,"column":0},"end":{"row":20,"column":0},"action":"remove","lines":["  plugins: debug ? [createLogger()] : []",""],"id":3}],[{"start":{"row":4,"column":0},"end":{"row":5,"column":0},"action":"remove","lines":["import cart from './modules/cart'",""],"id":4}],[{"start":{"row":4,"column":0},"end":{"row":5,"column":0},"action":"remove","lines":["import products from './modules/products'",""],"id":5}],[{"start":{"row":13,"column":0},"end":{"row":14,"column":0},"action":"remove","lines":["    cart,",""],"id":6}],[{"start":{"row":13,"column":0},"end":{"row":14,"column":0},"action":"remove","lines":["    products",""],"id":7}],[{"start":{"row":12,"column":12},"end":{"row":13,"column":0},"action":"insert","lines":["",""],"id":8},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":4,"column":0},"end":{"row":4,"column":33},"action":"insert","lines":["import cart from './modules/cart'"],"id":10}],[{"start":{"row":4,"column":28},"end":{"row":4,"column":32},"action":"remove","lines":["cart"],"id":11},{"start":{"row":4,"column":28},"end":{"row":4,"column":29},"action":"insert","lines":["a"]}],[{"start":{"row":4,"column":29},"end":{"row":4,"column":30},"action":"insert","lines":["l"],"id":12}],[{"start":{"row":4,"column":30},"end":{"row":4,"column":31},"action":"insert","lines":["m"],"id":13}],[{"start":{"row":4,"column":30},"end":{"row":4,"column":31},"action":"remove","lines":["m"],"id":14}],[{"start":{"row":4,"column":30},"end":{"row":4,"column":31},"action":"insert","lines":["b"],"id":15}],[{"start":{"row":4,"column":31},"end":{"row":4,"column":32},"action":"insert","lines":["u"],"id":16}],[{"start":{"row":4,"column":32},"end":{"row":4,"column":33},"action":"insert","lines":["m"],"id":17}],[{"start":{"row":4,"column":7},"end":{"row":4,"column":11},"action":"remove","lines":["cart"],"id":18},{"start":{"row":4,"column":7},"end":{"row":4,"column":12},"action":"insert","lines":["album"]}],[{"start":{"row":13,"column":4},"end":{"row":13,"column":9},"action":"insert","lines":["album"],"id":19}],[{"start":{"row":15,"column":15},"end":{"row":15,"column":16},"action":"remove","lines":[","],"id":20}]]},"timestamp":1501307937735}