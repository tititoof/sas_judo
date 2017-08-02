{"filter":false,"title":"common.js","tooltip":"/resources/assets/js/components/admin/seasons/common.js","undoManager":{"mark":23,"position":23,"stack":[[{"start":{"row":0,"column":0},"end":{"row":43,"column":1},"action":"insert","lines":["import {router} from './../../../app.js';","export default {","    data() {","        return {","            types:          [{","                'label': 'compétition',","                'value': 'tournament'","            }, {","                'label': \"évènement\",","                'value': 'event'","            }, {","                'label': 'stage',","                'value': 'stage'","            }],","            typeSelected:   {},","            name:           '',","            description:    '',","            startAt:        null,","            startTimeAt:    {","                    HH: \"08\",","                    mm: \"30\"","            },","            endAt:          null,","            endTimeAt:      {","                    HH: \"12\",","                    mm: \"00\"","            },","            formErrors: [","                { 'name': 'name', 'human': 'Nom de l\\'évènement'}, ","                { 'name': 'description', 'human': \"Description\" },","                { 'name': 'start_at', 'human': \"Date de début\" },","                { 'name': 'end_at', 'human': \"Date de fin\" },","                { 'name': 'end_time_at', 'human': \"Heure de fin\" },","                { 'name': 'start_time_at', 'human': \"Heure de début\" },","                { 'name': 'type', 'human': \"Type d'évènement\" },","            ]","        }","    },","    methods: {","        back() {","            router.go(-1)","        }","    }","}"],"id":1}],[{"start":{"row":4,"column":12},"end":{"row":26,"column":14},"action":"remove","lines":["types:          [{","                'label': 'compétition',","                'value': 'tournament'","            }, {","                'label': \"évènement\",","                'value': 'event'","            }, {","                'label': 'stage',","                'value': 'stage'","            }],","            typeSelected:   {},","            name:           '',","            description:    '',","            startAt:        null,","            startTimeAt:    {","                    HH: \"08\",","                    mm: \"30\"","            },","            endAt:          null,","            endTimeAt:      {","                    HH: \"12\",","                    mm: \"00\"","            },"],"id":2},{"start":{"row":4,"column":12},"end":{"row":7,"column":38},"action":"insert","lines":["name:       '',","                startAt:    null,","                endAt:      null,","                pickerLang: languageFr"]}],[{"start":{"row":7,"column":38},"end":{"row":7,"column":39},"action":"insert","lines":[","],"id":3}],[{"start":{"row":5,"column":0},"end":{"row":5,"column":4},"action":"remove","lines":["    "],"id":4},{"start":{"row":6,"column":0},"end":{"row":6,"column":4},"action":"remove","lines":["    "]},{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":0,"column":41},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":5}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":59},"action":"insert","lines":["import languageFr from '../../data/date-picker-lang.fr.js';"],"id":6}],[{"start":{"row":10,"column":54},"end":{"row":10,"column":63},"action":"remove","lines":["évènement"],"id":7}],[{"start":{"row":10,"column":53},"end":{"row":10,"column":55},"action":"remove","lines":["''"],"id":8}],[{"start":{"row":10,"column":52},"end":{"row":10,"column":53},"action":"remove","lines":["\\"],"id":9}],[{"start":{"row":10,"column":52},"end":{"row":10,"column":53},"action":"insert","lines":["a"],"id":10}],[{"start":{"row":10,"column":53},"end":{"row":10,"column":54},"action":"insert","lines":[" "],"id":11}],[{"start":{"row":10,"column":54},"end":{"row":10,"column":55},"action":"insert","lines":["s"],"id":12}],[{"start":{"row":10,"column":55},"end":{"row":10,"column":56},"action":"insert","lines":["a"],"id":13}],[{"start":{"row":10,"column":56},"end":{"row":10,"column":57},"action":"insert","lines":["i"],"id":14}],[{"start":{"row":10,"column":57},"end":{"row":10,"column":58},"action":"insert","lines":["s"],"id":15}],[{"start":{"row":10,"column":58},"end":{"row":10,"column":59},"action":"insert","lines":["o"],"id":16}],[{"start":{"row":10,"column":59},"end":{"row":10,"column":60},"action":"insert","lines":["n"],"id":17}],[{"start":{"row":10,"column":60},"end":{"row":10,"column":61},"action":"insert","lines":["\""],"id":18}],[{"start":{"row":10,"column":60},"end":{"row":10,"column":61},"action":"remove","lines":["\""],"id":19}],[{"start":{"row":10,"column":60},"end":{"row":10,"column":61},"action":"insert","lines":["'"],"id":20}],[{"start":{"row":11,"column":0},"end":{"row":12,"column":0},"action":"remove","lines":["                { 'name': 'description', 'human': \"Description\" },",""],"id":21}],[{"start":{"row":13,"column":0},"end":{"row":14,"column":0},"action":"remove","lines":["                { 'name': 'end_time_at', 'human': \"Heure de fin\" },",""],"id":22}],[{"start":{"row":13,"column":0},"end":{"row":14,"column":0},"action":"remove","lines":["                { 'name': 'start_time_at', 'human': \"Heure de début\" },",""],"id":23}],[{"start":{"row":13,"column":0},"end":{"row":14,"column":0},"action":"remove","lines":["                { 'name': 'type', 'human': \"Type d'évènement\" },",""],"id":24}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":13,"column":0},"end":{"row":13,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":200,"mode":"ace/mode/javascript"}},"timestamp":1501655702776,"hash":"75aee927eb405c24c6c54e29b89e8f350cc54b81"}