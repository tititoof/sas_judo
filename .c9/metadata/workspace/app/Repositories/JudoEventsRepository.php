{"changed":true,"filter":false,"title":"JudoEventsRepository.php","tooltip":"/app/Repositories/JudoEventsRepository.php","value":"<?php\n/**\n * Created by PhpStorm.\n * User: tititoof\n * Date: 23/02/17\n * Time: 08:39\n */\n\nnamespace App\\Repositories;\n\nuse App\\Models\\Judoevent;\nuse App\\Helpers\\Answer;\nuse Illuminate\\Http\\Request;\n\n/**\n * Class JudoEventsRepository\n * @package App\\Repositories\n */\nclass JudoEventsRepository\n{\n    /**\n     * @param Request $request\n     * @return array\n     */\n    public function save(Request $request)\n    {\n        return $this->update($request, new Judoevent);\n    }\n\n    /**\n     * @param Request $request\n     * @param Judoevent $judoevent\n     * @return array\n     */\n    public function update(Request $request, Judoevent $judoevent)\n    {\n        try {\n            $judoevent->type        = $request->input('type');\n            $judoevent->name        = $request->input('name');\n            $judoevent->description = $request->input('description');\n            $judoevent->start_at    = $this->setDateTime(\n                new \\DateTime($request->input('start_at')), $request->input('start_time_at'));\n            $judoevent->end_at      = $this->setDateTime(\n                new \\DateTime($request->input('end_at')), $request->input('end_time_at'));\n            $judoevent->save();\n            return Answer::success(200, $judoevent);\n        } catch (\\Exception $exception) {\n            return Answer::error($exception);\n        }\n    }\n\n    /**\n     * @param Judoevent $judoevent\n     * @return array\n     */\n    public function delete(Judoevent $judoevent)\n    {\n        try {\n            $judoevent->delete();\n            return Answer::success(200);\n        } catch(\\Exception $exception) {\n            return Answer::error($exception);\n        }\n    }\n\n    /**\n     * @return array\n     */\n    public function getCalendar()\n    {\n        $events = Judoevent::All();\n        $list   = $events->map(function($event, $key) {\n            $cal = new \\stdClass;\n            $cal->id    = $event->id;\n            $cal->title = $event->name;\n            $cal->start = $event->start_at;\n            $cal->end   = $event->end_at;\n            return $cal;\n        });\n        return $list->all();\n    }\n\n    /**\n     * @param $event\n     * @return \\stdClass\n     */\n    private function setCalendarEvent($event)\n    {\n        $cal = new \\stdClass;\n        $cal->title = $event->name;\n        $cal->start = $event->start_at;\n        $cal->end   = $event->end_at;\n        return $cal;\n    }\n\n    /**\n     * @param \\DateTime $inDate\n     * @param array $inTime\n     * @return \\DateTime\n     */\n    private function setDateTime(\\DateTime $inDate, Array $inTime)\n    {\n        $inDate->setTime($inTime['HH'], $inTime['mm']);\n        return $inDate;\n    }\n}","undoManager":{"mark":79,"position":100,"stack":[[{"start":{"row":44,"column":15},"end":{"row":44,"column":16},"action":"insert","lines":["u"],"id":6}],[{"start":{"row":44,"column":16},"end":{"row":44,"column":17},"action":"insert","lines":["r"],"id":7}],[{"start":{"row":44,"column":17},"end":{"row":44,"column":18},"action":"insert","lines":["n"],"id":8}],[{"start":{"row":44,"column":18},"end":{"row":44,"column":19},"action":"insert","lines":[" "],"id":9}],[{"start":{"row":10,"column":25},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":10}],[{"start":{"row":11,"column":0},"end":{"row":11,"column":1},"action":"insert","lines":["u"],"id":11}],[{"start":{"row":11,"column":1},"end":{"row":11,"column":2},"action":"insert","lines":["s"],"id":12}],[{"start":{"row":11,"column":2},"end":{"row":11,"column":3},"action":"insert","lines":["e"],"id":13}],[{"start":{"row":11,"column":3},"end":{"row":11,"column":4},"action":"insert","lines":[" "],"id":14}],[{"start":{"row":11,"column":4},"end":{"row":11,"column":5},"action":"insert","lines":["A"],"id":15}],[{"start":{"row":11,"column":5},"end":{"row":11,"column":6},"action":"insert","lines":["P"],"id":16}],[{"start":{"row":11,"column":6},"end":{"row":11,"column":7},"action":"insert","lines":["p"],"id":17}],[{"start":{"row":11,"column":6},"end":{"row":11,"column":7},"action":"remove","lines":["p"],"id":18}],[{"start":{"row":11,"column":5},"end":{"row":11,"column":6},"action":"remove","lines":["P"],"id":19}],[{"start":{"row":11,"column":5},"end":{"row":11,"column":6},"action":"insert","lines":["p"],"id":20}],[{"start":{"row":11,"column":6},"end":{"row":11,"column":7},"action":"insert","lines":["p"],"id":21}],[{"start":{"row":11,"column":7},"end":{"row":11,"column":8},"action":"insert","lines":["\\"],"id":22}],[{"start":{"row":11,"column":8},"end":{"row":11,"column":9},"action":"insert","lines":["H"],"id":23}],[{"start":{"row":11,"column":9},"end":{"row":11,"column":10},"action":"insert","lines":["e"],"id":24}],[{"start":{"row":11,"column":10},"end":{"row":11,"column":11},"action":"insert","lines":["l"],"id":25}],[{"start":{"row":11,"column":11},"end":{"row":11,"column":12},"action":"insert","lines":["p"],"id":26}],[{"start":{"row":11,"column":8},"end":{"row":11,"column":12},"action":"remove","lines":["Help"],"id":27},{"start":{"row":11,"column":8},"end":{"row":11,"column":15},"action":"insert","lines":["Helpers"]}],[{"start":{"row":11,"column":15},"end":{"row":11,"column":16},"action":"insert","lines":["\\"],"id":28}],[{"start":{"row":11,"column":16},"end":{"row":11,"column":17},"action":"insert","lines":["A"],"id":29}],[{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"insert","lines":["N"],"id":30}],[{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"remove","lines":["N"],"id":31}],[{"start":{"row":11,"column":17},"end":{"row":11,"column":18},"action":"insert","lines":["n"],"id":32}],[{"start":{"row":11,"column":16},"end":{"row":11,"column":18},"action":"remove","lines":["An"],"id":33},{"start":{"row":11,"column":16},"end":{"row":11,"column":22},"action":"insert","lines":["Answer"]}],[{"start":{"row":11,"column":22},"end":{"row":11,"column":23},"action":"insert","lines":[";"],"id":34}],[{"start":{"row":45,"column":19},"end":{"row":45,"column":20},"action":"insert","lines":["A"],"id":35}],[{"start":{"row":45,"column":20},"end":{"row":45,"column":21},"action":"insert","lines":["n"],"id":36}],[{"start":{"row":45,"column":19},"end":{"row":45,"column":21},"action":"remove","lines":["An"],"id":37},{"start":{"row":45,"column":19},"end":{"row":45,"column":25},"action":"insert","lines":["Answer"]}],[{"start":{"row":45,"column":25},"end":{"row":45,"column":26},"action":"insert","lines":[":"],"id":38}],[{"start":{"row":45,"column":26},"end":{"row":45,"column":27},"action":"insert","lines":[":"],"id":39}],[{"start":{"row":45,"column":27},"end":{"row":45,"column":28},"action":"insert","lines":["s"],"id":40}],[{"start":{"row":45,"column":28},"end":{"row":45,"column":29},"action":"insert","lines":["u"],"id":41}],[{"start":{"row":45,"column":29},"end":{"row":45,"column":30},"action":"insert","lines":["c"],"id":42}],[{"start":{"row":45,"column":30},"end":{"row":45,"column":31},"action":"insert","lines":["c"],"id":43}],[{"start":{"row":45,"column":31},"end":{"row":45,"column":32},"action":"insert","lines":["e"],"id":44}],[{"start":{"row":45,"column":27},"end":{"row":45,"column":32},"action":"remove","lines":["succe"],"id":45},{"start":{"row":45,"column":27},"end":{"row":45,"column":34},"action":"insert","lines":["success"]}],[{"start":{"row":45,"column":34},"end":{"row":45,"column":36},"action":"insert","lines":["()"],"id":46}],[{"start":{"row":45,"column":35},"end":{"row":45,"column":36},"action":"insert","lines":["2"],"id":47}],[{"start":{"row":45,"column":36},"end":{"row":45,"column":37},"action":"insert","lines":["0"],"id":48}],[{"start":{"row":45,"column":37},"end":{"row":45,"column":38},"action":"insert","lines":["0"],"id":49}],[{"start":{"row":45,"column":38},"end":{"row":45,"column":39},"action":"insert","lines":[","],"id":50}],[{"start":{"row":45,"column":39},"end":{"row":45,"column":40},"action":"insert","lines":[" "],"id":51}],[{"start":{"row":45,"column":40},"end":{"row":45,"column":41},"action":"insert","lines":["$"],"id":52}],[{"start":{"row":45,"column":41},"end":{"row":45,"column":42},"action":"insert","lines":["j"],"id":53}],[{"start":{"row":45,"column":42},"end":{"row":45,"column":43},"action":"insert","lines":["u"],"id":54}],[{"start":{"row":45,"column":40},"end":{"row":45,"column":43},"action":"remove","lines":["$ju"],"id":55},{"start":{"row":45,"column":40},"end":{"row":45,"column":50},"action":"insert","lines":["$judoevent"]}],[{"start":{"row":45,"column":51},"end":{"row":45,"column":52},"action":"insert","lines":[";"],"id":56}],[{"start":{"row":46,"column":0},"end":{"row":47,"column":0},"action":"remove","lines":["            return ['success' => true, 'errors' => [], 'event' => $judoevent];",""],"id":57}],[{"start":{"row":46,"column":41},"end":{"row":47,"column":0},"action":"insert","lines":["",""],"id":58},{"start":{"row":47,"column":0},"end":{"row":47,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":47,"column":12},"end":{"row":47,"column":13},"action":"insert","lines":["r"],"id":59}],[{"start":{"row":47,"column":13},"end":{"row":47,"column":14},"action":"insert","lines":["e"],"id":60}],[{"start":{"row":47,"column":14},"end":{"row":47,"column":15},"action":"insert","lines":["t"],"id":61}],[{"start":{"row":47,"column":15},"end":{"row":47,"column":16},"action":"insert","lines":["u"],"id":62}],[{"start":{"row":47,"column":16},"end":{"row":47,"column":17},"action":"insert","lines":["r"],"id":63}],[{"start":{"row":47,"column":17},"end":{"row":47,"column":18},"action":"insert","lines":["n"],"id":64}],[{"start":{"row":47,"column":18},"end":{"row":47,"column":19},"action":"insert","lines":[" "],"id":65}],[{"start":{"row":47,"column":19},"end":{"row":47,"column":20},"action":"insert","lines":["A"],"id":66}],[{"start":{"row":47,"column":20},"end":{"row":47,"column":21},"action":"insert","lines":["n"],"id":67}],[{"start":{"row":47,"column":21},"end":{"row":47,"column":22},"action":"insert","lines":["s"],"id":68}],[{"start":{"row":47,"column":19},"end":{"row":47,"column":22},"action":"remove","lines":["Ans"],"id":69},{"start":{"row":47,"column":19},"end":{"row":47,"column":25},"action":"insert","lines":["Answer"]}],[{"start":{"row":47,"column":25},"end":{"row":47,"column":26},"action":"insert","lines":[":"],"id":70}],[{"start":{"row":47,"column":26},"end":{"row":47,"column":27},"action":"insert","lines":[":"],"id":71}],[{"start":{"row":47,"column":27},"end":{"row":47,"column":28},"action":"insert","lines":["e"],"id":72}],[{"start":{"row":47,"column":28},"end":{"row":47,"column":29},"action":"insert","lines":["r"],"id":73}],[{"start":{"row":47,"column":29},"end":{"row":47,"column":30},"action":"insert","lines":["o"],"id":74}],[{"start":{"row":47,"column":29},"end":{"row":47,"column":30},"action":"remove","lines":["o"],"id":75}],[{"start":{"row":47,"column":29},"end":{"row":47,"column":30},"action":"insert","lines":["r"],"id":76}],[{"start":{"row":47,"column":30},"end":{"row":47,"column":31},"action":"insert","lines":["o"],"id":77}],[{"start":{"row":47,"column":31},"end":{"row":47,"column":32},"action":"insert","lines":["r"],"id":78}],[{"start":{"row":47,"column":32},"end":{"row":47,"column":34},"action":"insert","lines":["()"],"id":79}],[{"start":{"row":47,"column":33},"end":{"row":47,"column":34},"action":"insert","lines":["$"],"id":80}],[{"start":{"row":47,"column":34},"end":{"row":47,"column":35},"action":"insert","lines":["e"],"id":81}],[{"start":{"row":47,"column":35},"end":{"row":47,"column":36},"action":"insert","lines":["x"],"id":82}],[{"start":{"row":47,"column":33},"end":{"row":47,"column":36},"action":"remove","lines":["$ex"],"id":83},{"start":{"row":47,"column":33},"end":{"row":47,"column":43},"action":"insert","lines":["$exception"]}],[{"start":{"row":47,"column":44},"end":{"row":47,"column":45},"action":"insert","lines":[";"],"id":84}],[{"start":{"row":48,"column":0},"end":{"row":49,"column":0},"action":"remove","lines":["            return ['success' => false, 'errors' => $exception->getMessage()];",""],"id":85}],[{"start":{"row":58,"column":33},"end":{"row":59,"column":0},"action":"insert","lines":["",""],"id":86},{"start":{"row":59,"column":0},"end":{"row":59,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":59,"column":12},"end":{"row":59,"column":52},"action":"insert","lines":["return Answer::success(200, $judoevent);"],"id":87}],[{"start":{"row":60,"column":0},"end":{"row":61,"column":0},"action":"remove","lines":["            return ['success' => true, 'errors' => []];",""],"id":88}],[{"start":{"row":59,"column":38},"end":{"row":59,"column":50},"action":"remove","lines":[", $judoevent"],"id":89}],[{"start":{"row":47,"column":0},"end":{"row":48,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":91},{"start":{"row":48,"column":0},"end":{"row":49,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":48,"column":0},"end":{"row":49,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":92},{"start":{"row":47,"column":0},"end":{"row":48,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":48,"column":0},"end":{"row":49,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""],"id":93}],[{"start":{"row":48,"column":0},"end":{"row":49,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":94},{"start":{"row":49,"column":0},"end":{"row":50,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":49,"column":0},"end":{"row":50,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":95},{"start":{"row":50,"column":0},"end":{"row":51,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":50,"column":0},"end":{"row":51,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":96},{"start":{"row":51,"column":0},"end":{"row":52,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":51,"column":0},"end":{"row":52,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":97},{"start":{"row":52,"column":0},"end":{"row":53,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":52,"column":0},"end":{"row":53,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":98},{"start":{"row":53,"column":0},"end":{"row":54,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":53,"column":0},"end":{"row":54,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":99},{"start":{"row":54,"column":0},"end":{"row":55,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":54,"column":0},"end":{"row":55,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":100},{"start":{"row":55,"column":0},"end":{"row":56,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":55,"column":0},"end":{"row":56,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":101},{"start":{"row":56,"column":0},"end":{"row":57,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":56,"column":0},"end":{"row":57,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":102},{"start":{"row":57,"column":0},"end":{"row":58,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":57,"column":0},"end":{"row":58,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":103},{"start":{"row":58,"column":0},"end":{"row":59,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":58,"column":0},"end":{"row":59,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":104},{"start":{"row":59,"column":0},"end":{"row":60,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":59,"column":0},"end":{"row":60,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":105},{"start":{"row":60,"column":0},"end":{"row":61,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":60,"column":0},"end":{"row":61,"column":0},"action":"remove","lines":["            return Answer::error($exception);",""],"id":106},{"start":{"row":61,"column":0},"end":{"row":62,"column":0},"action":"insert","lines":["            return Answer::error($exception);",""]}],[{"start":{"row":62,"column":0},"end":{"row":63,"column":0},"action":"remove","lines":["            return ['success' => false, 'errors' => $exception->getMessage()];",""],"id":107}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":61,"column":0},"end":{"row":61,"column":0},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1500406592201}