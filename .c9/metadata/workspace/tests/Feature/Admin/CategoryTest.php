{"filter":false,"title":"CategoryTest.php","tooltip":"/tests/Feature/Admin/CategoryTest.php","undoManager":{"mark":74,"position":74,"stack":[[{"start":{"row":0,"column":0},"end":{"row":12,"column":34},"action":"insert","lines":["<?php","","namespace Tests\\Feature;","","use Tests\\TestCase;","use Illuminate\\Foundation\\Testing\\WithoutMiddleware;","use Illuminate\\Foundation\\Testing\\DatabaseMigrations;","use Illuminate\\Foundation\\Testing\\DatabaseTransactions;","use Illuminate\\Database\\Eloquent\\Collection;","use App\\Models\\User;","use App\\Models\\AgeCategory;","use Tymon\\JWTAuth\\Facades\\JWTAuth;","use Tests\\Feature\\Admin\\UserTrait;"],"id":1}],[{"start":{"row":12,"column":34},"end":{"row":13,"column":0},"action":"insert","lines":["",""],"id":2}],[{"start":{"row":13,"column":0},"end":{"row":15,"column":1},"action":"insert","lines":["","class AgeCategoryTest extends TestCase","{"],"id":3}],[{"start":{"row":15,"column":1},"end":{"row":16,"column":0},"action":"insert","lines":["",""],"id":4},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":16,"column":4},"end":{"row":16,"column":5},"action":"insert","lines":["}"],"id":5},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":10,"column":15},"end":{"row":10,"column":26},"action":"remove","lines":["AgeCategory"],"id":6},{"start":{"row":10,"column":15},"end":{"row":10,"column":16},"action":"insert","lines":["C"]}],[{"start":{"row":10,"column":16},"end":{"row":10,"column":17},"action":"insert","lines":["a"],"id":7}],[{"start":{"row":10,"column":17},"end":{"row":10,"column":18},"action":"insert","lines":["t"],"id":8}],[{"start":{"row":10,"column":18},"end":{"row":10,"column":19},"action":"insert","lines":["e"],"id":9}],[{"start":{"row":10,"column":19},"end":{"row":10,"column":20},"action":"insert","lines":["g"],"id":10}],[{"start":{"row":10,"column":20},"end":{"row":10,"column":21},"action":"insert","lines":["o"],"id":11}],[{"start":{"row":10,"column":21},"end":{"row":10,"column":22},"action":"insert","lines":["r"],"id":12}],[{"start":{"row":10,"column":22},"end":{"row":10,"column":23},"action":"insert","lines":["y"],"id":13}],[{"start":{"row":15,"column":1},"end":{"row":16,"column":0},"action":"insert","lines":["",""],"id":14},{"start":{"row":16,"column":0},"end":{"row":16,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":16,"column":4},"end":{"row":20,"column":18},"action":"insert","lines":["","    /**","     * User Trait","     */","    use UserTrait;"],"id":15}],[{"start":{"row":20,"column":18},"end":{"row":21,"column":0},"action":"insert","lines":["",""],"id":16},{"start":{"row":21,"column":0},"end":{"row":21,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":21,"column":4},"end":{"row":22,"column":0},"action":"insert","lines":["",""],"id":17},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":22,"column":4},"end":{"row":25,"column":34},"action":"insert","lines":["/**","     * Age categories for testing","     */","    private $ageCategories = null;"],"id":18}],[{"start":{"row":14,"column":8},"end":{"row":14,"column":9},"action":"remove","lines":["e"],"id":19}],[{"start":{"row":14,"column":7},"end":{"row":14,"column":8},"action":"remove","lines":["g"],"id":20}],[{"start":{"row":14,"column":6},"end":{"row":14,"column":7},"action":"remove","lines":["A"],"id":21}],[{"start":{"row":25,"column":13},"end":{"row":25,"column":17},"action":"remove","lines":["ageC"],"id":22},{"start":{"row":25,"column":13},"end":{"row":25,"column":14},"action":"insert","lines":["c"]}],[{"start":{"row":23,"column":7},"end":{"row":23,"column":12},"action":"remove","lines":["Age c"],"id":23},{"start":{"row":23,"column":7},"end":{"row":23,"column":8},"action":"insert","lines":["C"]}],[{"start":{"row":23,"column":8},"end":{"row":23,"column":9},"action":"insert","lines":["S"],"id":24}],[{"start":{"row":23,"column":8},"end":{"row":23,"column":9},"action":"remove","lines":["S"],"id":25}],[{"start":{"row":25,"column":31},"end":{"row":26,"column":0},"action":"insert","lines":["",""],"id":26},{"start":{"row":26,"column":0},"end":{"row":26,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":26,"column":4},"end":{"row":27,"column":0},"action":"insert","lines":["",""],"id":27},{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":27,"column":4},"end":{"row":27,"column":5},"action":"insert","lines":["p"],"id":28}],[{"start":{"row":27,"column":5},"end":{"row":27,"column":6},"action":"insert","lines":["u"],"id":29}],[{"start":{"row":27,"column":6},"end":{"row":27,"column":7},"action":"insert","lines":["b"],"id":30}],[{"start":{"row":27,"column":7},"end":{"row":27,"column":8},"action":"insert","lines":["l"],"id":31}],[{"start":{"row":27,"column":8},"end":{"row":27,"column":9},"action":"insert","lines":["i"],"id":32}],[{"start":{"row":27,"column":9},"end":{"row":27,"column":10},"action":"insert","lines":["c"],"id":33}],[{"start":{"row":27,"column":10},"end":{"row":27,"column":11},"action":"insert","lines":[" "],"id":34}],[{"start":{"row":27,"column":11},"end":{"row":27,"column":12},"action":"insert","lines":["f"],"id":35}],[{"start":{"row":27,"column":12},"end":{"row":27,"column":13},"action":"insert","lines":["u"],"id":36}],[{"start":{"row":27,"column":13},"end":{"row":27,"column":14},"action":"insert","lines":["n"],"id":37}],[{"start":{"row":27,"column":14},"end":{"row":27,"column":15},"action":"insert","lines":["c"],"id":38}],[{"start":{"row":27,"column":15},"end":{"row":27,"column":16},"action":"insert","lines":["t"],"id":39}],[{"start":{"row":27,"column":16},"end":{"row":27,"column":17},"action":"insert","lines":["i"],"id":40}],[{"start":{"row":27,"column":17},"end":{"row":27,"column":18},"action":"insert","lines":["o"],"id":41}],[{"start":{"row":27,"column":18},"end":{"row":27,"column":19},"action":"insert","lines":["n"],"id":42}],[{"start":{"row":27,"column":19},"end":{"row":27,"column":20},"action":"insert","lines":[" "],"id":43}],[{"start":{"row":27,"column":20},"end":{"row":27,"column":21},"action":"insert","lines":["t"],"id":44}],[{"start":{"row":27,"column":21},"end":{"row":27,"column":22},"action":"insert","lines":["e"],"id":45}],[{"start":{"row":27,"column":22},"end":{"row":27,"column":23},"action":"insert","lines":["s"],"id":46}],[{"start":{"row":27,"column":23},"end":{"row":27,"column":24},"action":"insert","lines":["t"],"id":47}],[{"start":{"row":27,"column":24},"end":{"row":27,"column":25},"action":"insert","lines":["I"],"id":48}],[{"start":{"row":27,"column":25},"end":{"row":27,"column":26},"action":"insert","lines":["n"],"id":49}],[{"start":{"row":27,"column":20},"end":{"row":27,"column":26},"action":"remove","lines":["testIn"],"id":50},{"start":{"row":27,"column":20},"end":{"row":27,"column":35},"action":"insert","lines":["testIndexStatus"]}],[{"start":{"row":27,"column":34},"end":{"row":27,"column":35},"action":"remove","lines":["s"],"id":51}],[{"start":{"row":27,"column":33},"end":{"row":27,"column":34},"action":"remove","lines":["u"],"id":52}],[{"start":{"row":27,"column":32},"end":{"row":27,"column":33},"action":"remove","lines":["t"],"id":53}],[{"start":{"row":27,"column":31},"end":{"row":27,"column":32},"action":"remove","lines":["a"],"id":54}],[{"start":{"row":27,"column":30},"end":{"row":27,"column":31},"action":"remove","lines":["t"],"id":55}],[{"start":{"row":27,"column":29},"end":{"row":27,"column":30},"action":"remove","lines":["S"],"id":56}],[{"start":{"row":27,"column":29},"end":{"row":27,"column":30},"action":"insert","lines":["A"],"id":57}],[{"start":{"row":27,"column":30},"end":{"row":27,"column":31},"action":"insert","lines":["c"],"id":58}],[{"start":{"row":27,"column":31},"end":{"row":27,"column":32},"action":"insert","lines":["t"],"id":59}],[{"start":{"row":27,"column":32},"end":{"row":27,"column":33},"action":"insert","lines":["i"],"id":60}],[{"start":{"row":27,"column":33},"end":{"row":27,"column":34},"action":"insert","lines":["o"],"id":61}],[{"start":{"row":27,"column":34},"end":{"row":27,"column":35},"action":"insert","lines":["n"],"id":62}],[{"start":{"row":27,"column":35},"end":{"row":27,"column":37},"action":"insert","lines":["()"],"id":63}],[{"start":{"row":27,"column":37},"end":{"row":28,"column":0},"action":"insert","lines":["",""],"id":64},{"start":{"row":28,"column":0},"end":{"row":28,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":28,"column":4},"end":{"row":28,"column":5},"action":"insert","lines":["{"],"id":65}],[{"start":{"row":28,"column":5},"end":{"row":30,"column":5},"action":"insert","lines":["","        ","    }"],"id":66}],[{"start":{"row":29,"column":8},"end":{"row":31,"column":37},"action":"insert","lines":["$this->setupTests();","        $response = $this->get('/api/course', [ 'Authorization' => \"Bearer \".(string)($this->token) ]);","        $response->assertStatus(200);"],"id":68}],[{"start":{"row":30,"column":37},"end":{"row":30,"column":43},"action":"remove","lines":["course"],"id":69},{"start":{"row":30,"column":37},"end":{"row":30,"column":38},"action":"insert","lines":["c"]}],[{"start":{"row":30,"column":38},"end":{"row":30,"column":39},"action":"insert","lines":["a"],"id":70}],[{"start":{"row":30,"column":39},"end":{"row":30,"column":40},"action":"insert","lines":["t"],"id":71}],[{"start":{"row":30,"column":40},"end":{"row":30,"column":41},"action":"insert","lines":["e"],"id":72}],[{"start":{"row":30,"column":41},"end":{"row":30,"column":42},"action":"insert","lines":["g"],"id":73}],[{"start":{"row":30,"column":42},"end":{"row":30,"column":43},"action":"insert","lines":["o"],"id":74}],[{"start":{"row":30,"column":43},"end":{"row":30,"column":44},"action":"insert","lines":["r"],"id":75}],[{"start":{"row":30,"column":44},"end":{"row":30,"column":45},"action":"insert","lines":["y"],"id":76}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":30,"column":45},"end":{"row":30,"column":45},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":123,"mode":"ace/mode/php"}},"timestamp":1506156998777,"hash":"2cdf4ee815856a501e000bd00f36df74aabaabe2"}