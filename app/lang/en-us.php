<?php
return [
    'apidoc'    =>    [
        'app.title'=>'Apidoc Demo',
        'app.demo' => "Base Demo",
        'groups.demo' => "Base",
        'groups.apiDemo' => "Api Demo",
        'groups.subMenu' => "Multi Level Group",
        'groups.sub1' => "Sub1",
        'groups.sub2' => "Sub2",
        'app.test' => "Test",
        'groups.user' => "User Manage",
        'groups.order' => "Order Manage",
        'param.shopid' => "ShopId",
        'responses.code' => "Code",
        'responses.message' => "Message",
        'responses.data' => "Data",

        'md.use'=>'Md Use',
        'md.http'=>'HTTP Status',
        'md.code'=>'Code Error',
        'md.status'=>'Status Error',

        'generator.crud.title'=>'Create Crud',
        'generator.crud.controller'=>'Controller Name',
        'generator.relation.title'=>'Create One to many Crud',
        'param.Authorization'=>'Authorization'
    ],
    'api'=>[


        'field.name'=>'Name',
        'field.username'=>'Username',
        'field.password'=>'Password',
        'field.phone'=>'Phone',
        'field.sex'=>'Sex',
        'field.data'=>'Data',
        'field.dataType'=>'Data Type',
        'field.info'=>'Info',
        'field.tree'=>'Tree',
        'field.treeChildren'=>'Tree Children',
        'field.refTree'=>'Ref Tree',
        'field.object'=>'Object',
        'field.array'=>'Array',
        'field.objectArray'=>'Object Array Type',
        'field.depthObject'=>'Depth Object',
        'field.depthArray'=>'Depth Array',
        'field.depthChildren'=>'Depth Object Children',
        'field.groupName'=>'Group Name',
        'field.list'=>'List',
        'field.token'=>'Token',

        'base.index.controller'=>'Base Annotation',
        'base.index.title'=>'Base Demo',
        'base.index.desc'=>'Some basic Param Annotation',
        'base.index.tag'=>'base,demo',
        'base.index.name'=>'Name',
        'base.index.phone'=>'Phone',
        'base.index.sex'=>'Sex',

        'base.routeParam.title'=>'Route Param',
        'base.routeParam.upload'=>'File Upload',
        'base.routeParam.uploads'=>'MultipleFile Upload',
        'base.routeParam.file'=>'File',
        'base.routeParam.fileUrl'=>'File Url',

        'base.contentType.title'=>'Set ContentType',
        'base.multipleMethod.title'=>'Multiple Method',
        'base.customResponses.title'=>'custom responses',

        'params.controller.title'=>'Api Params Annotation',
        'params.index.title'=>'Base Params',
        'params.getParams.title'=>'GET Method Params By Object/Array',
        'params.formdata.title'=>'Formdata Params',
        'params.formdata.desc'=>'The key point is that the ParamType is formdata',
        'params.depth.title'=>'Depth Data Annotation',
        'params.depth.desc'=>'Define the parameters of the depth data structure in a method annotation',
        'params.complex.title'=>'Complex Data Structures',
        'params.tree.title'=>'Tree Data',
        'params.depth.refDesc'=>'Depth Use Ref',

        'refs.controller.title'=>'Ref Demo',
        'refs.definitions.title'=>'Ref Definitions Annotation',
        'refs.definitions.desc'=>'Directly set the value to apidoc.php config definitions Class for functioname',
        'refs.model.title'=>'Ref Model',
        'refs.model.desc'=>'The import model, table field and model annotation of this method can be specified by method name and @ method name',
        'refs.service.title'=>'Ref Service',
        'refs.service.desc'=>'Ref business logic or other file of annotation',

        'mock.controller.title'=>'Mock Request Params',
        'mock.index.title'=>'Mock Params',

        'debugEvent.controller.title'=>'Debug Event',
        'debugEvent.index.title'=>'Base Event',
        'debugEvent.index.scrfToken'=>'Set this value as the request header parameter when requesting',
        'debugEvent.login.title'=>'Login Event',
        'debugEvent.login.desc'=>'Through the debugging event, the password is automatically converted to md5, and the global request header parameters are set after the request response',
        'debugEvent.formToken.title'=>'Token Validation Event',
        'debugEvent.formToken.desc'=>'Send a request through an event before the interface request, and use the request response parameter as the request header/parameter of the interfac',
        'debugEvent.eventRef.title'=>'Ref Event',

        'mdDesc.controller.title'=>'Markdown',
        'mdDesc.mdDesc.title'=>'Use md grammar edit api explain',
        'mdDesc.mdRefDesc.title'=>'Ref Md',
        'mdDesc.mdRefDesc.desc'=>'It is inconvenient to write md syntax in annotations. You can use the md document to import. Add # xxx after the md address to retrieve only the contents of the specified h2 (# #) tag',
        'mdDesc.mdDoc.title'=>'Customize Document Content',
        'mdDesc.mdDoc.desc'=>'Use Md Customize Document Content',
        'mdDesc.mdApiFieldDesc.title'=>'Field Use Md',
        'mdDesc.refMdApiFieldDesc.title'=>'Field Use MdRef',
        'mdDesc.mdResponseSuccess.title'=>'ResponseSuccess Use Md',
    ]
];