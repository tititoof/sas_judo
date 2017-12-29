{"filter":false,"title":"app.js","tooltip":"/resources/assets/js/app.js","undoManager":{"mark":31,"position":31,"stack":[[{"start":{"row":28,"column":40},"end":{"row":29,"column":0},"action":"insert","lines":["",""],"id":2}],[{"start":{"row":29,"column":0},"end":{"row":29,"column":69},"action":"insert","lines":["import vueResponsive from 'vue-responsive/dist/Vue_Responsive.common'"],"id":3}],[{"start":{"row":29,"column":21},"end":{"row":29,"column":24},"action":"insert","lines":["   "],"id":4}],[{"start":{"row":29,"column":24},"end":{"row":29,"column":28},"action":"insert","lines":["    "],"id":5}],[{"start":{"row":70,"column":0},"end":{"row":71,"column":0},"action":"insert","lines":["",""],"id":6}],[{"start":{"row":70,"column":0},"end":{"row":70,"column":48},"action":"insert","lines":["Vue.directive('responsiveness', Vue_Responsive);"],"id":7}],[{"start":{"row":70,"column":32},"end":{"row":70,"column":46},"action":"remove","lines":["Vue_Responsive"],"id":8},{"start":{"row":70,"column":32},"end":{"row":70,"column":33},"action":"insert","lines":["v"]}],[{"start":{"row":70,"column":32},"end":{"row":70,"column":33},"action":"remove","lines":["v"],"id":9}],[{"start":{"row":70,"column":32},"end":{"row":70,"column":45},"action":"insert","lines":["vueResponsive"],"id":10}],[{"start":{"row":29,"column":0},"end":{"row":29,"column":76},"action":"remove","lines":["import vueResponsive        from 'vue-responsive/dist/Vue_Responsive.common'"],"id":11},{"start":{"row":29,"column":0},"end":{"row":29,"column":26},"action":"insert","lines":["import VueMq from 'vue-mq'"]}],[{"start":{"row":29,"column":13},"end":{"row":29,"column":16},"action":"insert","lines":["   "],"id":12}],[{"start":{"row":29,"column":16},"end":{"row":29,"column":20},"action":"insert","lines":["    "],"id":13}],[{"start":{"row":29,"column":20},"end":{"row":29,"column":24},"action":"insert","lines":["    "],"id":14}],[{"start":{"row":29,"column":24},"end":{"row":29,"column":28},"action":"insert","lines":["    "],"id":15}],[{"start":{"row":70,"column":0},"end":{"row":70,"column":47},"action":"remove","lines":["Vue.directive('responsiveness', vueResponsive);"],"id":16},{"start":{"row":70,"column":0},"end":{"row":76,"column":2},"action":"insert","lines":["Vue.use(VueMq, {","  breakpoints: { // default breakpoints - customize this","    sm: 450,","    md: 1250,","    lg: Infinity,","  }","})"]}],[{"start":{"row":70,"column":0},"end":{"row":71,"column":0},"action":"insert","lines":["",""],"id":17}],[{"start":{"row":71,"column":0},"end":{"row":72,"column":0},"action":"insert","lines":["",""],"id":18}],[{"start":{"row":94,"column":0},"end":{"row":95,"column":0},"action":"insert","lines":["",""],"id":19}],[{"start":{"row":95,"column":0},"end":{"row":96,"column":0},"action":"insert","lines":["",""],"id":20}],[{"start":{"row":94,"column":0},"end":{"row":95,"column":0},"action":"insert","lines":["",""],"id":21}],[{"start":{"row":95,"column":0},"end":{"row":99,"column":2},"action":"insert","lines":["Vue.filter('capitalize', function (value) {","  if (!value) return ''","  value = value.toString()","  return value.charAt(0).toUpperCase() + value.slice(1)","})"],"id":22}],[{"start":{"row":95,"column":12},"end":{"row":95,"column":22},"action":"remove","lines":["capitalize"],"id":23},{"start":{"row":95,"column":12},"end":{"row":95,"column":20},"action":"insert","lines":["truncate"]}],[{"start":{"row":95,"column":23},"end":{"row":99,"column":1},"action":"remove","lines":["function (value) {","  if (!value) return ''","  value = value.toString()","  return value.charAt(0).toUpperCase() + value.slice(1)","}"],"id":24},{"start":{"row":95,"column":23},"end":{"row":97,"column":13},"action":"insert","lines":["function(string, value) {","    \t        return string.substring(0, value);","            }"]}],[{"start":{"row":96,"column":0},"end":{"row":96,"column":4},"action":"remove","lines":["    "],"id":25}],[{"start":{"row":96,"column":0},"end":{"row":96,"column":1},"action":"remove","lines":["\t"],"id":26}],[{"start":{"row":96,"column":0},"end":{"row":96,"column":4},"action":"remove","lines":["    "],"id":27}],[{"start":{"row":97,"column":0},"end":{"row":97,"column":4},"action":"remove","lines":["    "],"id":28}],[{"start":{"row":97,"column":0},"end":{"row":97,"column":4},"action":"remove","lines":["    "],"id":29}],[{"start":{"row":97,"column":0},"end":{"row":97,"column":4},"action":"remove","lines":["    "],"id":30}],[{"start":{"row":74,"column":8},"end":{"row":74,"column":11},"action":"remove","lines":["450"],"id":31},{"start":{"row":74,"column":8},"end":{"row":74,"column":9},"action":"insert","lines":["8"]}],[{"start":{"row":74,"column":9},"end":{"row":74,"column":10},"action":"insert","lines":["0"],"id":32}],[{"start":{"row":74,"column":10},"end":{"row":74,"column":11},"action":"insert","lines":["0"],"id":33}]]},"ace":{"folds":[],"scrolltop":420,"scrollleft":0,"selection":{"start":{"row":74,"column":11},"end":{"row":74,"column":11},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1514535521580,"hash":"5c37b1f337211a2b6af31fb38b7111beb092136d"}