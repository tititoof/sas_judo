{"filter":false,"title":"common.js","tooltip":"/resources/assets/js/components/admin/courses/common.js","undoManager":{"mark":68,"position":68,"stack":[[{"start":{"row":0,"column":0},"end":{"row":13,"column":1},"action":"insert","lines":["export default {","    data() {","        return {","            categories:     [],","            types:          [],","            typeSelected:   '',","            name:           '',","            formErrors: [","                { 'name': 'name', 'human': 'Nom du menu'}, ","                { 'name': 'categories', 'human': \"Menu(s)\"}","            ]","        }","    }","}"],"id":1}],[{"start":{"row":3,"column":12},"end":{"row":6,"column":31},"action":"remove","lines":["categories:     [],","            types:          [],","            typeSelected:   '',","            name:           '',"],"id":2},{"start":{"row":3,"column":12},"end":{"row":17,"column":36},"action":"insert","lines":["days: [],","                daySelected:      '',","                startTimeAt: {","                    HH: \"08\",","                    mm: \"30\"","                },","                endTimeAt: {","                    HH: \"12\",","                    mm: \"00\"","                },","                teachers:         [],","                teacherSelected:  '',","                name:             '',","                seasons:          [],","                seasonSelected:   ''"]}],[{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"remove","lines":["    "],"id":3},{"start":{"row":5,"column":0},"end":{"row":5,"column":4},"action":"remove","lines":["    "]},{"start":{"row":6,"column":0},"end":{"row":6,"column":4},"action":"remove","lines":["    "]},{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"remove","lines":["    "]},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"remove","lines":["    "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"remove","lines":["    "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"remove","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"remove","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"remove","lines":["    "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"remove","lines":["    "]},{"start":{"row":14,"column":0},"end":{"row":14,"column":4},"action":"remove","lines":["    "]},{"start":{"row":15,"column":0},"end":{"row":15,"column":4},"action":"remove","lines":["    "]},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"remove","lines":["    "]},{"start":{"row":17,"column":0},"end":{"row":17,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":17,"column":32},"end":{"row":17,"column":33},"action":"insert","lines":[","],"id":4}],[{"start":{"row":19,"column":51},"end":{"row":19,"column":55},"action":"remove","lines":["menu"],"id":5},{"start":{"row":19,"column":51},"end":{"row":19,"column":52},"action":"insert","lines":["c"]}],[{"start":{"row":19,"column":52},"end":{"row":19,"column":53},"action":"insert","lines":["o"],"id":6}],[{"start":{"row":19,"column":53},"end":{"row":19,"column":54},"action":"insert","lines":["u"],"id":7}],[{"start":{"row":19,"column":54},"end":{"row":19,"column":55},"action":"insert","lines":["r"],"id":8}],[{"start":{"row":19,"column":55},"end":{"row":19,"column":56},"action":"insert","lines":["s"],"id":9}],[{"start":{"row":20,"column":27},"end":{"row":20,"column":37},"action":"remove","lines":["categories"],"id":10},{"start":{"row":20,"column":27},"end":{"row":20,"column":36},"action":"insert","lines":["season_id"]}],[{"start":{"row":20,"column":49},"end":{"row":20,"column":56},"action":"remove","lines":["Menu(s)"],"id":11},{"start":{"row":20,"column":49},"end":{"row":20,"column":50},"action":"insert","lines":["S"]}],[{"start":{"row":20,"column":50},"end":{"row":20,"column":51},"action":"insert","lines":["a"],"id":12}],[{"start":{"row":20,"column":51},"end":{"row":20,"column":52},"action":"insert","lines":["i"],"id":13}],[{"start":{"row":20,"column":52},"end":{"row":20,"column":53},"action":"insert","lines":["s"],"id":14}],[{"start":{"row":20,"column":53},"end":{"row":20,"column":54},"action":"insert","lines":["o"],"id":15}],[{"start":{"row":20,"column":54},"end":{"row":20,"column":55},"action":"insert","lines":["n"],"id":16}],[{"start":{"row":20,"column":56},"end":{"row":20,"column":57},"action":"insert","lines":[" "],"id":17}],[{"start":{"row":20,"column":58},"end":{"row":20,"column":59},"action":"insert","lines":[","],"id":18}],[{"start":{"row":21,"column":0},"end":{"row":22,"column":0},"action":"insert","lines":["                { 'name': 'season_id', 'human': \"Saison\" },",""],"id":19}],[{"start":{"row":21,"column":27},"end":{"row":21,"column":36},"action":"remove","lines":["season_id"],"id":20},{"start":{"row":21,"column":27},"end":{"row":21,"column":30},"action":"insert","lines":["day"]}],[{"start":{"row":22,"column":0},"end":{"row":23,"column":0},"action":"insert","lines":["                { 'name': 'day', 'human': \"Saison\" },",""],"id":21}],[{"start":{"row":22,"column":27},"end":{"row":22,"column":30},"action":"remove","lines":["day"],"id":22},{"start":{"row":22,"column":27},"end":{"row":22,"column":35},"action":"insert","lines":["start_at"]}],[{"start":{"row":23,"column":0},"end":{"row":24,"column":0},"action":"insert","lines":["                { 'name': 'start_at', 'human': \"Saison\" },",""],"id":23}],[{"start":{"row":23,"column":27},"end":{"row":23,"column":35},"action":"remove","lines":["start_at"],"id":24},{"start":{"row":23,"column":27},"end":{"row":23,"column":33},"action":"insert","lines":["end_at"]}],[{"start":{"row":24,"column":0},"end":{"row":25,"column":0},"action":"insert","lines":["                { 'name': 'end_at', 'human': \"Saison\" },",""],"id":25}],[{"start":{"row":24,"column":27},"end":{"row":24,"column":33},"action":"remove","lines":["end_at"],"id":26},{"start":{"row":24,"column":27},"end":{"row":24,"column":37},"action":"insert","lines":["teacher_id"]}],[{"start":{"row":21,"column":43},"end":{"row":21,"column":49},"action":"remove","lines":["Saison"],"id":27},{"start":{"row":21,"column":43},"end":{"row":21,"column":44},"action":"insert","lines":["J"]}],[{"start":{"row":21,"column":44},"end":{"row":21,"column":45},"action":"insert","lines":["o"],"id":28}],[{"start":{"row":21,"column":45},"end":{"row":21,"column":46},"action":"insert","lines":["u"],"id":29}],[{"start":{"row":21,"column":46},"end":{"row":21,"column":47},"action":"insert","lines":["r"],"id":30}],[{"start":{"row":21,"column":47},"end":{"row":21,"column":48},"action":"insert","lines":["s"],"id":31}],[{"start":{"row":22,"column":48},"end":{"row":22,"column":54},"action":"remove","lines":["Saison"],"id":32},{"start":{"row":22,"column":48},"end":{"row":22,"column":49},"action":"insert","lines":["D"]}],[{"start":{"row":22,"column":49},"end":{"row":22,"column":50},"action":"insert","lines":["é"],"id":33}],[{"start":{"row":22,"column":50},"end":{"row":22,"column":51},"action":"insert","lines":["b"],"id":34}],[{"start":{"row":22,"column":51},"end":{"row":22,"column":52},"action":"insert","lines":["u"],"id":35}],[{"start":{"row":22,"column":52},"end":{"row":22,"column":53},"action":"insert","lines":["t"],"id":36}],[{"start":{"row":22,"column":48},"end":{"row":22,"column":49},"action":"remove","lines":["D"],"id":37}],[{"start":{"row":22,"column":48},"end":{"row":22,"column":49},"action":"insert","lines":["d"],"id":38}],[{"start":{"row":22,"column":48},"end":{"row":22,"column":49},"action":"insert","lines":["H"],"id":39}],[{"start":{"row":22,"column":49},"end":{"row":22,"column":50},"action":"insert","lines":["e"],"id":40}],[{"start":{"row":22,"column":50},"end":{"row":22,"column":51},"action":"insert","lines":["u"],"id":41}],[{"start":{"row":22,"column":51},"end":{"row":22,"column":52},"action":"insert","lines":["r"],"id":42}],[{"start":{"row":22,"column":52},"end":{"row":22,"column":53},"action":"insert","lines":["e"],"id":43}],[{"start":{"row":22,"column":53},"end":{"row":22,"column":54},"action":"insert","lines":[" "],"id":44}],[{"start":{"row":22,"column":54},"end":{"row":22,"column":55},"action":"insert","lines":["d"],"id":45}],[{"start":{"row":22,"column":55},"end":{"row":22,"column":56},"action":"insert","lines":["e"],"id":46}],[{"start":{"row":22,"column":56},"end":{"row":22,"column":57},"action":"insert","lines":[" "],"id":47}],[{"start":{"row":23,"column":46},"end":{"row":23,"column":52},"action":"remove","lines":["Saison"],"id":48},{"start":{"row":23,"column":46},"end":{"row":23,"column":47},"action":"insert","lines":["H"]}],[{"start":{"row":23,"column":47},"end":{"row":23,"column":48},"action":"insert","lines":["e"],"id":49}],[{"start":{"row":23,"column":48},"end":{"row":23,"column":49},"action":"insert","lines":["u"],"id":50}],[{"start":{"row":23,"column":49},"end":{"row":23,"column":50},"action":"insert","lines":["r"],"id":51}],[{"start":{"row":23,"column":50},"end":{"row":23,"column":51},"action":"insert","lines":["e"],"id":52}],[{"start":{"row":23,"column":51},"end":{"row":23,"column":52},"action":"insert","lines":[" "],"id":53}],[{"start":{"row":23,"column":52},"end":{"row":23,"column":53},"action":"insert","lines":["d"],"id":54}],[{"start":{"row":23,"column":53},"end":{"row":23,"column":54},"action":"insert","lines":["e"],"id":55}],[{"start":{"row":23,"column":54},"end":{"row":23,"column":55},"action":"insert","lines":[" "],"id":56}],[{"start":{"row":23,"column":55},"end":{"row":23,"column":56},"action":"insert","lines":["f"],"id":57}],[{"start":{"row":23,"column":56},"end":{"row":23,"column":57},"action":"insert","lines":["i"],"id":58}],[{"start":{"row":23,"column":57},"end":{"row":23,"column":58},"action":"insert","lines":["n"],"id":59}],[{"start":{"row":24,"column":50},"end":{"row":24,"column":56},"action":"remove","lines":["Saison"],"id":60},{"start":{"row":24,"column":50},"end":{"row":24,"column":51},"action":"insert","lines":["P"]}],[{"start":{"row":24,"column":51},"end":{"row":24,"column":52},"action":"insert","lines":["r"],"id":61}],[{"start":{"row":24,"column":52},"end":{"row":24,"column":53},"action":"insert","lines":["o"],"id":62}],[{"start":{"row":24,"column":53},"end":{"row":24,"column":54},"action":"insert","lines":["f"],"id":63}],[{"start":{"row":24,"column":54},"end":{"row":24,"column":55},"action":"insert","lines":["e"],"id":64}],[{"start":{"row":24,"column":55},"end":{"row":24,"column":56},"action":"insert","lines":["s"],"id":65}],[{"start":{"row":24,"column":56},"end":{"row":24,"column":57},"action":"insert","lines":["s"],"id":66}],[{"start":{"row":24,"column":57},"end":{"row":24,"column":58},"action":"insert","lines":["e"],"id":67}],[{"start":{"row":24,"column":58},"end":{"row":24,"column":59},"action":"insert","lines":["u"],"id":68}],[{"start":{"row":24,"column":59},"end":{"row":24,"column":60},"action":"insert","lines":["r"],"id":69}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":0,"column":0},"end":{"row":28,"column":1},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1501490453316,"hash":"290ad043775fcaaebf9a7d649ad6f2a5ec5f79b7"}