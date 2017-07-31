{"filter":false,"title":"common.js","tooltip":"/resources/assets/js/components/admin/common.js","undoManager":{"mark":44,"position":44,"stack":[[{"start":{"row":0,"column":0},"end":{"row":25,"column":1},"action":"insert","lines":["export default {","    data() {","        return {","            name:       '',","            files:      [],","            files_id:   Array,","            allPictures:[],","            pictures:   [],","            upload:     {},","            active:     false,","            uploadName: 'Télécharger',","            filesIds:   '',","            formErrors: [","                { 'name': 'name', 'human': 'Nom'}, ","                { 'name': 'pictures', 'human': \"Images\"}","            ]","        }","    },","    computed: {","        getFilesIds: function() {","            const _self = this;","            let str = _self.filesIds.replace(/(^[,\\s]+)|([,\\s]+$)/g, '')","            return str.split(',')","        }","    },","}"],"id":1}],[{"start":{"row":1,"column":4},"end":{"row":17,"column":6},"action":"remove","lines":["data() {","        return {","            name:       '',","            files:      [],","            files_id:   Array,","            allPictures:[],","            pictures:   [],","            upload:     {},","            active:     false,","            uploadName: 'Télécharger',","            filesIds:   '',","            formErrors: [","                { 'name': 'name', 'human': 'Nom'}, ","                { 'name': 'pictures', 'human': \"Images\"}","            ]","        }","    },"],"id":2}],[{"start":{"row":2,"column":4},"end":{"row":2,"column":12},"action":"remove","lines":["computed"],"id":3},{"start":{"row":2,"column":4},"end":{"row":2,"column":5},"action":"insert","lines":["m"]}],[{"start":{"row":2,"column":5},"end":{"row":2,"column":6},"action":"insert","lines":["e"],"id":4}],[{"start":{"row":2,"column":6},"end":{"row":2,"column":7},"action":"insert","lines":["t"],"id":5}],[{"start":{"row":2,"column":7},"end":{"row":2,"column":8},"action":"insert","lines":["h"],"id":6}],[{"start":{"row":2,"column":8},"end":{"row":2,"column":9},"action":"insert","lines":["o"],"id":7}],[{"start":{"row":2,"column":9},"end":{"row":2,"column":10},"action":"insert","lines":["d"],"id":8}],[{"start":{"row":2,"column":10},"end":{"row":2,"column":11},"action":"insert","lines":["s"],"id":9}],[{"start":{"row":1,"column":0},"end":{"row":2,"column":0},"action":"remove","lines":["    ",""],"id":10}],[{"start":{"row":2,"column":8},"end":{"row":2,"column":19},"action":"remove","lines":["getFilesIds"],"id":11},{"start":{"row":2,"column":8},"end":{"row":2,"column":9},"action":"insert","lines":["d"]}],[{"start":{"row":2,"column":9},"end":{"row":2,"column":10},"action":"insert","lines":["e"],"id":12}],[{"start":{"row":2,"column":10},"end":{"row":2,"column":11},"action":"insert","lines":["l"],"id":13}],[{"start":{"row":2,"column":11},"end":{"row":2,"column":12},"action":"insert","lines":["e"],"id":14}],[{"start":{"row":2,"column":12},"end":{"row":2,"column":13},"action":"insert","lines":["t"],"id":15}],[{"start":{"row":2,"column":13},"end":{"row":2,"column":14},"action":"insert","lines":["e"],"id":16}],[{"start":{"row":2,"column":8},"end":{"row":2,"column":14},"action":"remove","lines":["delete"],"id":17},{"start":{"row":2,"column":8},"end":{"row":2,"column":23},"action":"insert","lines":["deleteConfirmed"]}],[{"start":{"row":2,"column":33},"end":{"row":2,"column":34},"action":"insert","lines":["u"],"id":18}],[{"start":{"row":2,"column":34},"end":{"row":2,"column":35},"action":"insert","lines":["r"],"id":19}],[{"start":{"row":2,"column":34},"end":{"row":2,"column":35},"action":"remove","lines":["r"],"id":20}],[{"start":{"row":2,"column":33},"end":{"row":2,"column":34},"action":"remove","lines":["u"],"id":21}],[{"start":{"row":2,"column":34},"end":{"row":2,"column":35},"action":"insert","lines":["u"],"id":22}],[{"start":{"row":2,"column":35},"end":{"row":2,"column":36},"action":"insert","lines":["r"],"id":23}],[{"start":{"row":2,"column":36},"end":{"row":2,"column":37},"action":"insert","lines":["l"],"id":24}],[{"start":{"row":2,"column":37},"end":{"row":2,"column":38},"action":"insert","lines":[","],"id":25}],[{"start":{"row":2,"column":38},"end":{"row":2,"column":39},"action":"insert","lines":[" "],"id":26}],[{"start":{"row":2,"column":39},"end":{"row":2,"column":40},"action":"insert","lines":["m"],"id":27}],[{"start":{"row":2,"column":40},"end":{"row":2,"column":41},"action":"insert","lines":["e"],"id":28}],[{"start":{"row":2,"column":41},"end":{"row":2,"column":42},"action":"insert","lines":["s"],"id":29}],[{"start":{"row":2,"column":42},"end":{"row":2,"column":43},"action":"insert","lines":["s"],"id":30}],[{"start":{"row":2,"column":43},"end":{"row":2,"column":44},"action":"insert","lines":["a"],"id":31}],[{"start":{"row":2,"column":44},"end":{"row":2,"column":45},"action":"insert","lines":["g"],"id":32}],[{"start":{"row":2,"column":45},"end":{"row":2,"column":46},"action":"insert","lines":["e"],"id":33}],[{"start":{"row":3,"column":12},"end":{"row":5,"column":33},"action":"remove","lines":["const _self = this;","            let str = _self.filesIds.replace(/(^[,\\s]+)|([,\\s]+$)/g, '')","            return str.split(',')"],"id":34},{"start":{"row":3,"column":12},"end":{"row":13,"column":18},"action":"insert","lines":["const _self = this;","                _self.$http.delete('api/album/' + _self.deleteId)","                .then(","                    () => {","                    _self.$emit('sas-snackbar', 'Album supprimé');","                    _self.index();","                }).catch(","                    error   => {","                        _self.$emit('sas-errors', auth.showError(error.response, _self.formErrors));","                    }","                );"]}],[{"start":{"row":4,"column":0},"end":{"row":4,"column":4},"action":"remove","lines":["    "],"id":35},{"start":{"row":5,"column":0},"end":{"row":5,"column":4},"action":"remove","lines":["    "]},{"start":{"row":6,"column":0},"end":{"row":6,"column":4},"action":"remove","lines":["    "]},{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"remove","lines":["    "]},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"remove","lines":["    "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"remove","lines":["    "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"remove","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"remove","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"remove","lines":["    "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":4,"column":31},"end":{"row":4,"column":60},"action":"remove","lines":["'api/album/' + _self.deleteId"],"id":36},{"start":{"row":4,"column":31},"end":{"row":4,"column":32},"action":"insert","lines":["u"]}],[{"start":{"row":4,"column":32},"end":{"row":4,"column":33},"action":"insert","lines":["r"],"id":37}],[{"start":{"row":4,"column":33},"end":{"row":4,"column":34},"action":"insert","lines":["l"],"id":38}],[{"start":{"row":7,"column":44},"end":{"row":7,"column":60},"action":"remove","lines":["'Album supprimé'"],"id":39},{"start":{"row":7,"column":44},"end":{"row":7,"column":51},"action":"insert","lines":["message"]}],[{"start":{"row":2,"column":14},"end":{"row":2,"column":23},"action":"remove","lines":["Confirmed"],"id":40},{"start":{"row":2,"column":14},"end":{"row":2,"column":15},"action":"insert","lines":["O"]}],[{"start":{"row":2,"column":15},"end":{"row":2,"column":16},"action":"insert","lines":["b"],"id":41}],[{"start":{"row":2,"column":16},"end":{"row":2,"column":17},"action":"insert","lines":["j"],"id":42}],[{"start":{"row":2,"column":17},"end":{"row":2,"column":18},"action":"insert","lines":["e"],"id":43}],[{"start":{"row":2,"column":18},"end":{"row":2,"column":19},"action":"insert","lines":["c"],"id":44}],[{"start":{"row":2,"column":19},"end":{"row":2,"column":20},"action":"insert","lines":["t"],"id":45}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":2,"column":8},"end":{"row":2,"column":20},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1501485950197,"hash":"ad20f629c9b9ad54154b4a77e7b8942d2a761b72"}