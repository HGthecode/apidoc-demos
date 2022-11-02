<?php

// 表字段可选的字段类型
$tableFieldTypes = ["int", "tinyint", "integer", "float", "decimal", "char", "varchar", "blob", "text", "point"];
// 表字段可选的验证规则
$tableFieldCheckOptions = [
    ['label' => '必填', 'value' => 'require', 'message' => '缺少必要参数{$item.field}'],
    ['label' => '数字', 'value' => 'number', 'message' => '{$item.field}字段类型为数字'],
    ['label' => '整数', 'value' => 'integer', 'message' => '{$item.field}为整数'],
    ['label' => '布尔', 'value' => 'boolean', 'message' => '{$item.field}为布尔值'],
];
// 主表默认字段
$tableDefaultRows = [
    [
        'field' => 'id',
        'desc' => '唯一id',
        'type' => 'int',
        'length' => 11,
        'default' => '',
        'not_null' => true,
        'main_key' => true,
        'incremental' => true,
        'query' => false,
        'list' => true,
        'detail' => true,
        'add' => false,
        'edit' => true
    ],
    [
        'field' => 'create_time',
        'desc' => '创建时间',
        'type' => 'int',
        'length' => 10,
        'default' => '',
        'not_null' => false,
        'main_key' => false,
        'incremental' => false,
    ],
    [
        'field' => 'update_time',
        'desc' => '更新时间',
        'type' => 'int',
        'length' => 10,
        'default' => '',
        'not_null' => false,
        'main_key' => false,
        'incremental' => false,
    ],
    [
        'field' => 'delete_time',
        'desc' => '删除时间',
        'type' => 'int',
        'length' => 10,
        'default' => '',
        'not_null' => false,
        'main_key' => false,
        'incremental' => false,
    ]
];

// crud的表配置自定义列
$crudTableColumns = [
    [
        'title' => '验证',
        'field' => 'check',
        'type' => 'select',
        'width' => 180,
        'props' => [
            'placeholder' => '请输入',
            'mode' => 'multiple',
            'maxTagCount' => 1,
            'options' => $tableFieldCheckOptions
        ],
    ],
    [
        'title' => '查询',
        'field' => 'query',
        'type' => 'checkbox',
        'width' => 60
    ],
    [
        'title' => '列表',
        'field' => 'list',
        'type' => 'checkbox',
        'width' => 60
    ],
    [
        'title' => '明细',
        'field' => 'detail',
        'type' => 'checkbox',
        'width' => 60
    ],
    [
        'title' => '新增',
        'field' => 'add',
        'type' => 'checkbox',
        'width' => 60
    ],
    [
        'title' => '编辑',
        'field' => 'edit',
        'type' => 'checkbox',
        'width' => 60
    ]
];
// 模型名规则
$modelNameRules = [
    ['pattern' => '^[A-Z]{1}([a-zA-Z0-9]|[._]){2,19}$', 'message' => '模型文件名错误，请输入大写字母开头的字母+数字，长度2-19的组合']
];
// 表名规则
$tableNameRules = [
    ['pattern' => '^[a-z]{1}([a-z0-9]|[_]){2,19}$', 'message' => '表名错误，请输入小写字母开头的字母+数字/下划线，长度2-19的组合']
];


return [
    // 文档标题，显示在左上角与首页
    'title'              => 'lang(apidoc.app.title)',
    // 文档描述，显示在首页
    'desc'               => '',
    // （必须）设置文档的应用/版本
    'apps'           => [
        [
            'title' => 'lang(apidoc.app.demo)',
            'path' => 'app\demo\controller',
            'folder' => 'demo',
            'key' => 'demo',
            'groups' => [
                ['title' => 'lang(apidoc.groups.demo)', 'name' => 'base'],
                ['title' => 'lang(apidoc.groups.apiDemo)', 'name' => 'apiDemo'],
                ['title' => 'lang(apidoc.groups.subMenu)', 'name' => 'subMenu',
                    'children' => [
                        ['title' => 'lang(apidoc.groups.sub1)', 'name' => 'sub1',],
                        ['title' => 'lang(apidoc.groups.sub2)', 'name' => 'sub2'],
                    ]
                ],
            ],
        ],
        [
            'title' => 'lang(apidoc.app.test)',
            'key' => 'test',
            'items' => [
                [
                    'title' => 'V1.0',
                    'path' => 'app\test\controller\v1',
                    'key' => 'v1',
                    'groups' => [
                        ['title' => 'lang(apidoc.groups.user)', 'name' => 'user'],
                        ['title' => 'lang(apidoc.groups.order)', 'name' => 'order'],
                    ],
                    'params'=>[
                        'header' => [
                            ['name' => 'shopid', 'type' => 'string', 'require' => true, 'desc' => 'lang(apidoc.param.shopid)'],
                        ],
                    ],
                ],
                ['title' => 'V2.0', 'path' => 'app\test\controller\v2', 'key' => 'v2', 'password' => '123']
            ]
        ]
    ],
    // （必须）指定通用注释定义的文件地址
    'definitions'        => "app\common\controller\Definitions",
    // （必须）自动生成url规则，当接口不添加@Apidoc\Url ("xxx")注解时，使用以下规则自动生成
    'auto_url' => [
        // 字母规则
        'letter_rule' => "lcfirst",
        // url前缀
        'prefix'=>"",
        // 过滤的目录
//        'filter_keys'=>['app','controller','demo'],
        // 自定义url生成方法
//        'custom' =>function($path,$method){
//            return "/".str_replace('\\','/',$$path).$method;
//        },
    ],
    // （必须）缓存配置
    'cache'              => [
        // 是否开启缓存
        'enable' => false,
    ],
    // （必须）权限认证配置
    'auth'               => [
        // 是否启用密码验证
        'enable'     => true,
        // 全局访问密码
        'password'   => "123456",
        // 密码加密盐
        'secret_key' => "apidoc#hg_code",
        // 授权访问后的有效期
        'expire' => 24*60*60
    ],
//    // （选配）全局的请求Header
//    'headers'=>[
//        // name=字段名，type=字段类型，require=是否必填，default=默认值，desc=字段描述
//        ['name'=>'Authorization','type'=>'string','require'=>true,'default'=>'test','desc'=>'身份令牌Token'],
//    ],
    // 全局参数
    'params'=>[
        'header'=>[
            // name=字段名，type=字段类型，require=是否必填，default=默认值，desc=字段描述
            ['name'=>'Authorization','type'=>'string','require'=>true,'desc'=>'lang(apidoc.param.Authorization)'],
        ],

    ],
    // 全局响应体
    'responses'=>[
        // 参数同上 headers；main=true来指定接口Returned参数挂载节点
        'success'=>[
            ['name'=>'code','desc'=>'lang(apidoc.responses.code)','type'=>'int','require'=>1],
            ['name'=>'message','desc'=>'lang(apidoc.responses.message)','type'=>'string','require'=>1],
            ['name'=>'data','desc'=>'lang(apidoc.responses.data)','main'=>true,'type'=>'object','require'=>1],
        ],
        'error'=>[
            ['name'=>'code','desc'=>'lang(apidoc.responses.code)','type'=>'int','require'=>1,'md'=>'/docs/HttpError.md'],
            ['name'=>'message','desc'=>'lang(apidoc.responses.message)','type'=>'string','require'=>1],
        ]
    ],
    //（选配）默认作者
    'default_author'=>'',
    //（选配）默认请求类型
    'default_method'=>'GET',
    // （选配）允许跨域访问
    'allowCrossDomain'=>true,
    /**
     * （选配）解析时忽略带@注解的关键词，当注解中存在带@字符并且非Apidoc注解，如 @key test，此时Apidoc页面报类似以下错误时:
     * [Semantical Error] The annotation "@key" in method app\demo\controller\Base::index() was never imported. Did you maybe forget to add a "use" statement for this annotation?
     */
    'ignored_annitation'=>['key'],

    // （选配）数据库配置
    'database'=>[
        // 数据库表前缀
        'prefix'          => '',
        // 数据库编码，默认为utf8
        'charset'         =>  'utf8',
        // 数据库引擎，默认为 InnoDB
        'engine'          => 'InnoDB',
    ],
    // （选配）Markdown文档
    'docs'              => [
        // title=文档标题，path=.md文件地址，多级分组使用children嵌套
        ['title' => 'lang(apidoc.md.use)', 'path' => 'docs/Use'],
        [
            'title' => 'lang(apidoc.md.http)',
            'children' => [
                ['title' => 'lang(apidoc.md.code)', 'path' => 'docs/HttpCode_${app[0].key}'],
                ['title' => 'lang(apidoc.md.status)', 'path' => 'docs/HttpStatus'],
            ],
        ]
    ],
    // （选配）代码生成器配置 注意：是一个二维数组
    'generator' => [
        [
            'title' => 'lang(apidoc.generator.crud.title)',
            'enable' => true,
            'middleware' => [
                \app\common\middleware\CreateCrudMiddleware::class
            ],
            'form' => [
                'colspan' => 3,
                'items' => [
                    [
                        'title' => 'lang(apidoc.generator.crud.controller)',
                        'field' => 'controller_title',
                        'type' => 'input'
                    ],
                ]
            ],
            'files' => [
                [
                    'path' => 'app\${app[0].key}\controller',
                    'namespace' => 'app\${app[0].key}\controller',
                    'template' => 'template\crud\controller.tpl',
                    'name' => 'controller',
                    'rules' => [
                        ['required' => true, 'message' => '请输入控制器文件名'],
                        ['pattern' => '^[A-Z]{1}([a-zA-Z0-9]|[._]){2,19}$', 'message' => '请输入正确的目录名'],
                    ]
                ],
                [
                    'name' => 'service',
                    'path' => 'app\${app[0].key}\services',
                    'template' => 'template\crud\service.tpl',
                ],
                [
                    'name' => 'validate',
                    'path' => 'app\${app[0].key}\validate',
                    'template' => 'template\crud\validate.tpl',
                ],
                [
                    'name' => 'route',
                    'path' => 'app\${app[0].key}\route\${app[0].key}.php',
                    'template' => 'template\crud\route.tpl',
                ],
            ],
            'table' => [
                'field_types' => $tableFieldTypes,
                'items' => [
                    [
                        'title' => '数据表',
                        'namespace' => 'app\model',
                        'path' => "app\model",
                        'template' => "template\crud\model.tpl",
                        'model_rules' => $modelNameRules,
                        'table_rules' => $tableNameRules,
                        'columns' => $crudTableColumns,
                        'default_fields' => $tableDefaultRows,
                        'default_values' => [
                            'type' => 'varchar',
                            'length' => 255,
                            'list' => true,
                            'detail' => true,
                            'add' => true,
                            'edit' => true,
                        ],
                    ],
                ]
            ]
        ],
        [
            'title' => 'lang(apidoc.generator.relation.title)',
            'middleware' => [
                \app\common\middleware\CreateRelationMiddleware::class
            ],
            'form' => [
                'colspan' => 4,
                'items' => [
                    [
                        'title' => '控制器标题',
                        'field' => 'controller_title',
                        'type' => 'input',
                    ],
                    [
                        'title' => '关联字段',
                        'field' => 'relation_field',
                        'type' => 'input',
                        'props' => [
                            'placeholder' => '副表关联主表的字段，如:info_id'
                        ],
                        'rules' => [
                            // 必填的验证
                            ['required' => true, 'message' => '请输入控制器文件名'],
                        ]
                    ],
                ]
            ],
            'files' => [
                [
                    'path' => 'app\${app[0].folder}\controller',
                    'namespace' => 'app\${app[0].folder}\controller',
                    'template' => 'template\relation\controller.tpl',
                    'name' => 'controller',
                    'rules' => [
                        ['required' => true, 'message' => '请输入控制器文件名'],
                        ['pattern' => '^[A-Z]{1}([a-zA-Z0-9]|[._]){2,19}$', 'message' => '请输入正确的目录名'],
                    ]
                ],
                [
                    'name' => 'service',
                    'path' => 'app\${app[0].folder}\services',
                    'template' => 'template\relation\service.tpl',
                ],
                [
                    'name' => 'validate',
                    'path' => 'app\${app[0].folder}\validate',
                    'template' => 'template\relation\validate.tpl',
                ],
                [
                    'name' => 'route',
                    'path' => 'app\${app[0].folder}\route\${app[0].folder}.php',
                    'template' => 'template\relation\route.tpl',
                ],
            ],
            'table' => [
                'field_types' => $tableFieldTypes,
                'items' => [
                    [
                        'title' => '主表',
                        'desc' => '表注释必填，以便生成关联接口的名称，如：文章',
                        'namespace' => 'app\model',
                        'path' => "app\model",
                        'template' => "template\\relation\model.tpl",
                        'model_rules' => $modelNameRules,
                        'table_rules' => $tableNameRules,
                        'columns' => $crudTableColumns,
                        'default_fields' => $tableDefaultRows,
                        'default_values' => [
                            'type' => 'varchar',
                            'length' => 255,
                            'list' => true,
                            'detail' => true,
                            'add' => true,
                            'edit' => true,
                        ],
                    ],
                    [
                        'title' => '副表',
                        'desc' => '表注释必填，以便生成关联接口的名称，如：评论。必须存在与上方所填关联字段相同的字段，如:info_id',
                        'namespace' => 'app\model',
                        'path' => "app\model",
                        'template' => "template\\relation\model_sub.tpl",
                        'model_rules' => $modelNameRules,
                        'table_rules' => $tableNameRules,
                        'columns' => [
                            [
                                'title' => '新增',
                                'field' => 'add',
                                'type' => 'checkbox',
                                'width' => 60
                            ],
                            [
                                'title' => '编辑',
                                'field' => 'edit',
                                'type' => 'checkbox',
                                'width' => 60
                            ]
                        ],
                        'default_fields' => [
                            [
                                'field' => 'id',
                                'desc' => '唯一id',
                                'type' => 'int',
                                'length' => 11,
                                'default' => '',
                                'not_null' => true,
                                'main_key' => true,
                                'incremental' => true,
                                'query' => false,
                                'list' => true,
                                'detail' => true,
                                'add' => false,
                                'edit' => true
                            ],
                        ],
                        'default_values' => [
                            'type' => 'varchar',
                            'length' => 255,
                            'list' => true,
                            'detail' => true,
                            'add' => true,
                            'edit' => true,
                        ],
                    ]

                ]
            ]
        ]
    ]

];