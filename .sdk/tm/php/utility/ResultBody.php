<?php
declare(strict_types=1);

// SearchNotice SDK utility: result_body

class SearchNoticeResultBody
{
    public static function call(SearchNoticeContext $ctx): ?SearchNoticeResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result && $response && $response->json_func && $response->body) {
            $result->body = ($response->json_func)();
        }
        return $result;
    }
}
