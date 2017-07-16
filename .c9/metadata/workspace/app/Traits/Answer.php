{"changed":true,"filter":false,"title":"Answer.php","tooltip":"/app/Traits/Answer.php","value":"<?php\n\nnamespace App\\Traits;\n\nclass Answer\n{\n    const SUCCES = 'success';\n    \n    const ERROR  = 'error';\n    \n    const TYPES_ERROR = [\n        '400'   => 'La syntaxe de la requête est erronée.',\n        '401'   => 'Une authentification est nécessaire pour accéder à la ressource.',\n        '403'   => 'Le serveur a compris la requête, mais refuse de l\\'exécuter.',\n        '404'   => 'Ressource non trouvée.',\n        '405'   => 'Méthode de requête non autorisée.',\n        '422'   => 'L’entité fournie avec la requête est incompréhensible ou incomplète.',\n        '456'   => 'Erreur irrécupérable.',\n    ];\n    \n    const TYPES_SUCCESS = [\n        '200'   => 'Requête traitée avec succès.',\n        '201'   => 'Requête traitée avec succès et création d’un document.',\n        '202'   => 'Requête traitée, mais sans garantie de résultat.',\n        '206'   => 'Une partie seulement de la ressource a été transmise.',\n    ];\n    \n    p\n}","undoManager":{"mark":97,"position":100,"stack":[[{"start":{"row":15,"column":20},"end":{"row":15,"column":53},"action":"insert","lines":["Méthode de requête non autorisée."],"id":199}],[{"start":{"row":15,"column":54},"end":{"row":15,"column":55},"action":"insert","lines":[","],"id":200}],[{"start":{"row":15,"column":55},"end":{"row":16,"column":0},"action":"insert","lines":["",""],"id":201},{"start":{"row":16,"column":0},"end":{"row":16,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":16,"column":8},"end":{"row":16,"column":10},"action":"insert","lines":["''"],"id":202}],[{"start":{"row":16,"column":9},"end":{"row":16,"column":12},"action":"insert","lines":["422"],"id":203}],[{"start":{"row":16,"column":13},"end":{"row":16,"column":16},"action":"insert","lines":["   "],"id":204}],[{"start":{"row":16,"column":16},"end":{"row":16,"column":17},"action":"insert","lines":["="],"id":205}],[{"start":{"row":16,"column":17},"end":{"row":16,"column":18},"action":"insert","lines":[">"],"id":206}],[{"start":{"row":16,"column":18},"end":{"row":16,"column":19},"action":"insert","lines":[" "],"id":207}],[{"start":{"row":16,"column":19},"end":{"row":16,"column":21},"action":"insert","lines":["''"],"id":208}],[{"start":{"row":16,"column":20},"end":{"row":16,"column":88},"action":"insert","lines":["L’entité fournie avec la requête est incompréhensible ou incomplète."],"id":209}],[{"start":{"row":16,"column":89},"end":{"row":16,"column":90},"action":"insert","lines":[","],"id":210}],[{"start":{"row":16,"column":90},"end":{"row":17,"column":0},"action":"insert","lines":["",""],"id":211},{"start":{"row":17,"column":0},"end":{"row":17,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":17,"column":8},"end":{"row":17,"column":10},"action":"insert","lines":["''"],"id":212}],[{"start":{"row":17,"column":9},"end":{"row":17,"column":12},"action":"insert","lines":["456"],"id":213}],[{"start":{"row":17,"column":13},"end":{"row":17,"column":16},"action":"insert","lines":["   "],"id":214}],[{"start":{"row":17,"column":16},"end":{"row":17,"column":17},"action":"insert","lines":["="],"id":215}],[{"start":{"row":17,"column":17},"end":{"row":17,"column":18},"action":"insert","lines":[">"],"id":216}],[{"start":{"row":17,"column":18},"end":{"row":17,"column":19},"action":"insert","lines":[" "],"id":217}],[{"start":{"row":17,"column":19},"end":{"row":17,"column":21},"action":"insert","lines":["''"],"id":218}],[{"start":{"row":17,"column":20},"end":{"row":17,"column":41},"action":"insert","lines":["Erreur irrécupérable."],"id":219}],[{"start":{"row":17,"column":42},"end":{"row":17,"column":43},"action":"insert","lines":[","],"id":220}],[{"start":{"row":20,"column":4},"end":{"row":20,"column":5},"action":"insert","lines":["c"],"id":221}],[{"start":{"row":20,"column":5},"end":{"row":20,"column":6},"action":"insert","lines":["o"],"id":222}],[{"start":{"row":20,"column":6},"end":{"row":20,"column":7},"action":"insert","lines":["n"],"id":223}],[{"start":{"row":20,"column":7},"end":{"row":20,"column":8},"action":"insert","lines":["s"],"id":224}],[{"start":{"row":20,"column":8},"end":{"row":20,"column":9},"action":"insert","lines":["t"],"id":225}],[{"start":{"row":20,"column":9},"end":{"row":20,"column":10},"action":"insert","lines":[" "],"id":226}],[{"start":{"row":20,"column":10},"end":{"row":20,"column":11},"action":"insert","lines":["T"],"id":227}],[{"start":{"row":20,"column":11},"end":{"row":20,"column":12},"action":"insert","lines":["Y"],"id":228}],[{"start":{"row":20,"column":12},"end":{"row":20,"column":13},"action":"insert","lines":["P"],"id":229}],[{"start":{"row":20,"column":13},"end":{"row":20,"column":14},"action":"insert","lines":["E"],"id":230}],[{"start":{"row":20,"column":14},"end":{"row":20,"column":15},"action":"insert","lines":["S"],"id":231}],[{"start":{"row":20,"column":15},"end":{"row":20,"column":16},"action":"insert","lines":["8"],"id":232}],[{"start":{"row":20,"column":15},"end":{"row":20,"column":16},"action":"remove","lines":["8"],"id":233}],[{"start":{"row":20,"column":15},"end":{"row":20,"column":16},"action":"insert","lines":["_"],"id":234}],[{"start":{"row":20,"column":16},"end":{"row":20,"column":17},"action":"insert","lines":["S"],"id":235}],[{"start":{"row":20,"column":17},"end":{"row":20,"column":18},"action":"insert","lines":["U"],"id":236}],[{"start":{"row":20,"column":18},"end":{"row":20,"column":19},"action":"insert","lines":["C"],"id":237}],[{"start":{"row":20,"column":19},"end":{"row":20,"column":20},"action":"insert","lines":["C"],"id":238}],[{"start":{"row":20,"column":20},"end":{"row":20,"column":21},"action":"insert","lines":["E"],"id":239}],[{"start":{"row":20,"column":21},"end":{"row":20,"column":22},"action":"insert","lines":["S"],"id":240}],[{"start":{"row":20,"column":22},"end":{"row":20,"column":23},"action":"insert","lines":["S"],"id":241}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"insert","lines":[" "],"id":242}],[{"start":{"row":20,"column":24},"end":{"row":20,"column":25},"action":"insert","lines":["="],"id":243}],[{"start":{"row":20,"column":25},"end":{"row":20,"column":26},"action":"insert","lines":[" "],"id":244}],[{"start":{"row":20,"column":26},"end":{"row":20,"column":27},"action":"insert","lines":["{"],"id":245}],[{"start":{"row":20,"column":26},"end":{"row":20,"column":27},"action":"remove","lines":["{"],"id":247}],[{"start":{"row":20,"column":26},"end":{"row":20,"column":28},"action":"insert","lines":["[]"],"id":248}],[{"start":{"row":20,"column":27},"end":{"row":21,"column":0},"action":"insert","lines":["",""],"id":249},{"start":{"row":21,"column":0},"end":{"row":21,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":21,"column":4},"end":{"row":21,"column":8},"action":"remove","lines":["    "],"id":250}],[{"start":{"row":21,"column":5},"end":{"row":21,"column":6},"action":"insert","lines":[";"],"id":251}],[{"start":{"row":20,"column":27},"end":{"row":21,"column":0},"action":"insert","lines":["",""],"id":252},{"start":{"row":21,"column":0},"end":{"row":21,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":21,"column":8},"end":{"row":21,"column":10},"action":"insert","lines":["''"],"id":253}],[{"start":{"row":21,"column":9},"end":{"row":21,"column":10},"action":"insert","lines":["2"],"id":254}],[{"start":{"row":21,"column":10},"end":{"row":21,"column":11},"action":"insert","lines":["0"],"id":255}],[{"start":{"row":21,"column":11},"end":{"row":21,"column":12},"action":"insert","lines":["0"],"id":256}],[{"start":{"row":21,"column":13},"end":{"row":21,"column":16},"action":"insert","lines":["   "],"id":257}],[{"start":{"row":21,"column":16},"end":{"row":21,"column":20},"action":"insert","lines":["    "],"id":258}],[{"start":{"row":21,"column":16},"end":{"row":21,"column":20},"action":"remove","lines":["    "],"id":259}],[{"start":{"row":21,"column":15},"end":{"row":21,"column":16},"action":"remove","lines":[" "],"id":260}],[{"start":{"row":21,"column":15},"end":{"row":21,"column":16},"action":"insert","lines":[" "],"id":261}],[{"start":{"row":21,"column":16},"end":{"row":21,"column":17},"action":"insert","lines":["="],"id":262}],[{"start":{"row":21,"column":17},"end":{"row":21,"column":18},"action":"insert","lines":[">"],"id":263}],[{"start":{"row":21,"column":18},"end":{"row":21,"column":19},"action":"insert","lines":[" "],"id":264}],[{"start":{"row":21,"column":19},"end":{"row":21,"column":21},"action":"insert","lines":["''"],"id":265}],[{"start":{"row":21,"column":20},"end":{"row":21,"column":48},"action":"insert","lines":["Requête traitée avec succès."],"id":266}],[{"start":{"row":21,"column":49},"end":{"row":21,"column":50},"action":"insert","lines":[","],"id":267}],[{"start":{"row":21,"column":50},"end":{"row":22,"column":0},"action":"insert","lines":["",""],"id":268},{"start":{"row":22,"column":0},"end":{"row":22,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":22,"column":8},"end":{"row":22,"column":10},"action":"insert","lines":["''"],"id":269}],[{"start":{"row":22,"column":9},"end":{"row":22,"column":12},"action":"insert","lines":["201"],"id":270}],[{"start":{"row":22,"column":13},"end":{"row":22,"column":16},"action":"insert","lines":["   "],"id":271}],[{"start":{"row":22,"column":16},"end":{"row":22,"column":17},"action":"insert","lines":["="],"id":272}],[{"start":{"row":22,"column":17},"end":{"row":22,"column":18},"action":"insert","lines":[">"],"id":273}],[{"start":{"row":22,"column":18},"end":{"row":22,"column":19},"action":"insert","lines":[" "],"id":274}],[{"start":{"row":22,"column":19},"end":{"row":22,"column":21},"action":"insert","lines":["''"],"id":275}],[{"start":{"row":22,"column":20},"end":{"row":22,"column":74},"action":"insert","lines":["Requête traitée avec succès et création d’un document."],"id":276}],[{"start":{"row":22,"column":75},"end":{"row":22,"column":76},"action":"insert","lines":[","],"id":277}],[{"start":{"row":22,"column":76},"end":{"row":23,"column":0},"action":"insert","lines":["",""],"id":278},{"start":{"row":23,"column":0},"end":{"row":23,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":23,"column":8},"end":{"row":23,"column":10},"action":"insert","lines":["''"],"id":279}],[{"start":{"row":23,"column":9},"end":{"row":23,"column":12},"action":"insert","lines":["202"],"id":280}],[{"start":{"row":23,"column":13},"end":{"row":23,"column":16},"action":"insert","lines":["   "],"id":281}],[{"start":{"row":23,"column":16},"end":{"row":23,"column":17},"action":"insert","lines":["="],"id":282}],[{"start":{"row":23,"column":17},"end":{"row":23,"column":18},"action":"insert","lines":[">"],"id":283}],[{"start":{"row":23,"column":18},"end":{"row":23,"column":19},"action":"insert","lines":[" "],"id":284}],[{"start":{"row":23,"column":19},"end":{"row":23,"column":21},"action":"insert","lines":["''"],"id":285}],[{"start":{"row":23,"column":20},"end":{"row":23,"column":68},"action":"insert","lines":["Requête traitée, mais sans garantie de résultat."],"id":286}],[{"start":{"row":23,"column":69},"end":{"row":23,"column":70},"action":"insert","lines":[","],"id":287}],[{"start":{"row":23,"column":70},"end":{"row":24,"column":0},"action":"insert","lines":["",""],"id":288},{"start":{"row":24,"column":0},"end":{"row":24,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":24,"column":8},"end":{"row":24,"column":10},"action":"insert","lines":["''"],"id":289}],[{"start":{"row":24,"column":9},"end":{"row":24,"column":12},"action":"insert","lines":["206"],"id":290}],[{"start":{"row":24,"column":13},"end":{"row":24,"column":16},"action":"insert","lines":["   "],"id":291}],[{"start":{"row":24,"column":16},"end":{"row":24,"column":17},"action":"insert","lines":["="],"id":292}],[{"start":{"row":24,"column":17},"end":{"row":24,"column":18},"action":"insert","lines":[">"],"id":293}],[{"start":{"row":24,"column":18},"end":{"row":24,"column":19},"action":"insert","lines":[" "],"id":294}],[{"start":{"row":24,"column":19},"end":{"row":24,"column":21},"action":"insert","lines":["''"],"id":295}],[{"start":{"row":24,"column":20},"end":{"row":24,"column":73},"action":"insert","lines":["Une partie seulement de la ressource a été transmise."],"id":297}],[{"start":{"row":24,"column":74},"end":{"row":24,"column":75},"action":"insert","lines":[","],"id":298}],[{"start":{"row":25,"column":6},"end":{"row":26,"column":0},"action":"insert","lines":["",""],"id":299},{"start":{"row":26,"column":0},"end":{"row":26,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":26,"column":4},"end":{"row":27,"column":0},"action":"insert","lines":["",""],"id":300},{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":27,"column":4},"end":{"row":27,"column":5},"action":"insert","lines":["p"],"id":301}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":27,"column":5},"end":{"row":27,"column":5},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1500113244730}