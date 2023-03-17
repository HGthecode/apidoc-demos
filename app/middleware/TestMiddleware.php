<?php

namespace app\middleware;

use support\Log;
use Webman\Http\Request;
use Webman\Http\Response;
use Webman\MiddlewareInterface;

/**
 * 测试中间件
 */
class TestMiddleware implements MiddlewareInterface
{

    public function process(Request $request, callable $next): Response
    {
        Log::info("【中间件】1111");
        /** @var Response $response */
        $response = $next($request);
        return $response;
    }

}